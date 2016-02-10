<?
use yii\helpers\Url;
use frontend\components\Helper;
?>
<div class="row-container bg-dark" id="team">
    <div class="rc-title">
        <h3><?=Helper::t('main', 'TEAM_HEADER')?></h3>
    </div>
    <div class="team-container">
        <div class="tc-left-cell">
            <div class="tcl-item mobile-set">
                <div class="tc-icon-block tc-icon-background-1"></div>
                <div class="tc-icon-description">
                    <?=Helper::t('main', 'TEAM_PROJECTS')?>
                </div>
            </div>
            <div class="tcl-item mobile-set">
                <div class="tc-icon-block tc-icon-background-2"></div>
                <div class="tc-icon-description">
                    <?=Helper::t('main', 'TEAM_OFFICES')?>
                </div>
            </div>
            <div class="tcl-item mobile-set">
                <div class="tc-icon-block tc-icon-background-3"></div>
                <div class="tc-icon-description">
                    <?=Helper::t('main', 'TEAM_PROFESSIONALS')?>
                </div>
            </div>
            <div class="tcl-item mobile-set">
                <div class="tc-icon-block tc-icon-background-4"></div>
                <div class="tc-icon-description">
                    <?=Helper::t('main', 'TEAM_EXPERIENCE')?>
                </div>
            </div>
        </div>
        <div class="tc-right-cell">
            <?for($i=0; $i< count($team) && $i<3; $i++):
                $t = $team[$i];
                $blackImage = $t->blackImage;
                $colorImage = $t->colorImage;
                ?>
                <div class="tcr-item">
                    <div class="tcr-item-square">
                        <img src="<?=$blackImage ? $blackImage->getSrc() : ''?>" alt="" class="tc-item-photo transit-300">
                        <img src="<?=$colorImage ? $colorImage->getSrc() : ''?>" alt="" class="tc-item-photo tc-color transit-300">
                    </div>
                </div>
            <?endfor?>
            <div class="tcr-item">
                <div class="tcr-item-square transit-300">
                    <?
                    $lang = \common\models\Lang::getCurrent();
                    if($lang->url == 'ru')
                        $url = Url::toRoute(['/vacancy/index']);
                    else
                        $url = Url::toRoute(['/site/contact']);
                    ?>
                    <a href="<?=$url?>" class="tc-vacancy-link">
                        <div class="tcv-link-cell transit-300">
                            <div class="tcv-icon">
                                <img src="<?=Yii::getAlias('@web').'/style/images/i_team/add-icon.png'; ?>" alt="" class="tcv-add transit-300">
                            </div>
                            <div class="tcv-description">
                                <?=Helper::t('main', 'TEAM_WORKFORUS')?>
                                <div class="tcv-text-dotted transit-300"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>