<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
	
<? if($arResult["DISPLAY_FIELDS"]["NAME"]):?>
<h3><?=$arResult["DISPLAY_FIELDS"]["NAME"]?></h3>
<? endif;?>
<? if($arResult["DISPLAY_FIELDS"]["DETAIL_TEXT"]):?>
<p><?=$arResult["DISPLAY_FIELDS"]["DETAIL_TEXT"]?></p>
<? endif;?>