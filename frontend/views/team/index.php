<?
\frontend\assets\AppAssetTeam::register($this);
?>
<div class="top-section transit-1000">
    <?foreach($team as $t):
        $blackImage = $t->blackImage;
        $colorImage = $t->colorImage;
        ?>
        <div class="item-photo">
            <img src="<?=$blackImage ? $blackImage->getSrc() : ''?>" alt="" class="photo-default transit-300">
            <img src="<?=$colorImage ? $colorImage->getSrc() : ''?>" alt="" class="photo-action transit-300">
            <div class="substrate transit-300">
                <div class="item-name">
                    <? echo $t->surname . ' ' . $t->name?>
                </div>
                <div class="item-description">
                    <? echo $t->position?>
                </div>
            </div>
            <!-- hidden for popup -->
            <div class="popup-description">
                <div class="pp-item-name pin-750">
                    <? echo $t->surname . ' ' . $t->name?>
                </div>
                <div class="pp-item-vacancy pin-750">
                    <? echo $t->position?>
                </div>
                <div class="pp-item-photo transit-500">
                    <img src="<?=$colorImage ? $colorImage->getSrc() : ''?>" alt="" class="pp-photo">
                </div>
                <div class="pp-item-content transit-500">
                    <div class="pp-item-name pin-1000">
                        <? echo $t->surname . ' ' . $t->name?>
                    </div>
                    <div class="pp-item-vacancy pin-1000">
                        <? echo $t->position?>
                    </div>
                        <? echo $t->description?>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--/hidden for popup/-->
        </div>
    <?endforeach?>
</div>

<div class="popup-container transit-500">
    <div class="popup-subscribe">
        <div class="popup-subscribe-cell">
            <div class="popup-item-window">
                <div class="close-popup">
                    <div class="close-button">
                        <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_popup/close.png'; ?>" alt="" class="c-default transit-300">
                        <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_popup/close-hover.png'; ?>" alt="" class="c-active transit-300">
                    </div>
                </div>
                <div class="popup-past-description">

                </div>
            </div>
        </div>
    </div>
</div>