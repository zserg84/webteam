<?
use yii\helpers\Url;
\frontend\assets\AppAssetVacancy::register($this);
?>
<div class="top-section transit-1000">
    <div class="top-title">
        Кликните вакансию ниже, чтобы записаться на собеседование или познакомиться
    </div>
</div>

<div class="vacancy-content transit-1000">
    <?foreach($vacancies as $vacancy):
        $image = $vacancy->image;
        ?>
        <div class="item-vacancy" data-vacancy="<?=$vacancy->title?>">
            <div class="poster-container">
                <img src="<?=$image ? $image->getSrc() : ''?>" class="transit-300">
                <div class="poster-inner transit-300"></div>
            </div>
            <div class="item-name">
                <?=$vacancy->title?>
            </div>
            <!-- hidden vacancy popup -->
            <div class="hidden-vacancy-content">
                <div class="ppd-title">
                    <?=$vacancy->title?>
                </div>
                <div class="ppd-content">
                    <?=$vacancy->description?>
                </div>
            </div>
            <!--/hidden vacancy popup/-->
        </div>
    <?endforeach?>
</div>

<div class="popup-container transit-500">
    <div class="popup-subscribe">
        <div class="popup-subscribe-cell">
            <div class="popup-item-window">
                <div class="close-popup">
                    <div class="close-button">
                        <img src="<?=Yii::getAlias('@web').'/page/vacancy/style/images/i_popup/close.png'; ?>" alt="" class="c-default transit-300">
                        <img src="<?=Yii::getAlias('@web').'/page/vacancy/style/images/i_popup/close-hover.png'; ?>" alt="" class="c-active transit-300">
                    </div>
                </div>
                <div class="popup-past-description">

                </div>
                <div class="popup-content">
                    <? echo $this->render('_statement_form')?>
                </div>
            </div>
        </div>
    </div>
</div>