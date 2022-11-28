<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(\Bitrix\Main\Loader::IncludeModule("profistudio.seofilter"))
{
        \Profistudio\SeoFilter\ToolsPageFilter::includeComponent($this, $arParams, $arResult, "bitrix");
}
?>