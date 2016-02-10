<?
use frontend\components\Helper;
?>

<div class="row-container bg-white" id="comment">
    <div class="rc-title">
        <h3><?=Helper::t('main', 'PARTNERS_HEADER')?></h3>
    </div>
    <div class="comment-container">
        <ul class="slides">
            <?foreach($recalls as $recall):?>
                <li>
                    <div class="ccs-item">
                        <div class="ccs-logon">
                            <div class="ccs-logon-cell">
                                <?$image = $recall->image;
                                if($image):?>
                                <img src="<? echo $image->getSrc()?>" alt="" class="cc-logon-company">
                                <?endif?>
                            </div>
                        </div>
                        <div class="cc-comment-block">
                            <div class="cc-com-desk">
                                <div class="cc-desk-cell">
                                    <div class="cc-desk-content">
                                        <?echo $recall->text?>
                                    </div>
                                    <div class="cc-desk-names">
                                        <span><?echo $recall->member?></span>
                                        <span><?echo $recall->company?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?endforeach?>
        </ul>
    </div>
</div>