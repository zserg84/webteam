<?php

namespace common\models;

use common\assets\ImageAsset;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $ext
 * @property string $comment
 * @property integer $created_at
 * @property integer $sort
 *
 * @property Recall[] $recalls
 */
class Image extends \yii\db\ActiveRecord
{
    public $_path;
    private $_url = '/web/img/';

    private $_maxWidth;

    private $_sizeArray = [100, 200, 500, 1000];

    private $types = array('jpg', 'png', 'gif');


    public function init() {
        $this->_path = Yii::getAlias('@statics').'/web/img/';
        $this->_maxWidth = max($this->_sizeArray);
        return parent::init();
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'sort'], 'integer'],
            [['ext'], 'string', 'max' => 4],
            [['comment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ext' => 'Ext',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'sort' => 'Sort',
        ];
    }

    public function behaviors(){
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecalls()
    {
        return $this->hasMany(Recall::className(), ['image_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ImageQuery(get_called_class());
    }

    public function beforeDelete() {
        $file = $this->getPath();
        if (file_exists($file) and is_file($file)) {
            @unlink($file);
        }
        foreach ($this->_sizeArray as $w) {
            $file = $this->getPath($w);
            @unlink($file);
        }

        return parent::beforeDelete();
    }


    public function saveFile($src, $width) {
        if (!$this->id) return false;
        if (in_array($width, $this->_sizeArray) === false) return false;

        $path = $this->getPathDir();

        $postfix = ($width == $this->_maxWidth) ? '' : '-'.$width;

        $destination = $path.$this->id.$postfix.'.'.$this->ext;
        if (rename($src, $destination)) {
            chmod($destination, 0755);
            return true;
        }
    }

    function get_mime($file) {
        if (function_exists("finfo_file")) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
            $mime = finfo_file($finfo, $file);
            finfo_close($finfo);
            return $mime;
        } else if (function_exists("mime_content_type")) {
            return mime_content_type($file);
        } else if (!stristr(ini_get("disable_functions"), "shell_exec")) {
            // http://stackoverflow.com/a/134930/1593459
            $file = escapeshellarg($file);
            $mime = shell_exec("file -bi " . $file);
            return $mime;
        } else {
            return false;
        }
    }

    public static function getExtByType($type) {
        $arr = array(
            'image/jpeg'=>'jpg',
            'image/png'=>'png',
            'image/gif'=>'gif',
        );
        return (array_key_exists($type, $arr)) ? $arr[$type] : null;
    }


    private function getPathDir() {
        $path = $this->_path.$this->getGroupFolder().'/';
        if (!file_exists($path) or !is_dir($path)) {
            mkdir($path, 0777, true);
        }
        return $path;
    }

    private function getGroupFolder() {
        if ($this->id) {
            $id = $this->id;
        } else {
            $maxId = Yii::$app->db->createCommand('SELECT MAX(id) FROM `image`')->queryScalar();
            $id = $maxId + 1;
        }
        return ceil($id / 1000);
    }


    public function getPath($w=null) {
        if (!$this->id) return false;
        $postfix = ($w and (in_array($w, $this->_sizeArray) !== false)) ? '-'.$w : '';
        return $this->getPathDir().$this->id.$postfix.'.'.$this->ext;
    }


    public function getSrc($w = null) {
        if (!$this->id or !$this->ext) return false;

        $groupFolder = $this->getGroupFolder();
        $s = ($w and (in_array($w, $this->_sizeArray) !== false)) ? '-'.$w : '';

        $view = Yii::$app->getView();
        $path = ImageAsset::register($view);
        $path = $path->imgSrc($this->id.$s.'.'.$this->ext, $this->_url.$groupFolder);

        return $path;
    }

    /**
     * @var string $file
     * @var string $ext
     * @return Image|false
     */
    public static function GetByFile($file, $ext) {
        $image = new Image();
        if (!in_array($ext, $image->types)) {
            return false;
        }
        $image->ext = $ext;
        $image->save();
        $path = $image->getPathDir();
        $destination = $path.$image->id.'.'.$image->ext;
        if (move_uploaded_file($file, $destination)) {
            $image->save();
            chmod($destination, 0755);
            return $image;
        }
        $image->delete();
        return false;
    }


    /**
     * @var string $url
     * @return Image|false
     */
    public static function GetByUrl($url) {
        $url = filter_var($url, FILTER_VALIDATE_URL);
        if ($url === false) return false;
        $headers = get_headers($url, 1);
        if (!$headers or !is_array($headers)) return false;
        if (!isset($headers['Content-Type'])) return false;
        $contentType = $headers['Content-Type'];
        if (is_array($contentType)) {
            $contentType = end($contentType);
        }
        unset($headers);
        if (!$ext = self::getExtByType($contentType)) {
            return false;
        }

        $content = file_get_contents($url);
        if (!$content) {
            return false;
        }

        $image = new Image();
        $image->ext = $ext;
        $image->save();
        $path = $image->getPathDir();
        $destination = $path.$image->id.'.'.$image->ext;
        if (file_put_contents($destination, $content)) {
            $image->save();
            chmod($destination, 0755);
            return $image;
        }
        $image->delete();
        return false;
    }
}
