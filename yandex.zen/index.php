<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Yandex.Zen RSS");
?><?$APPLICATION->IncludeComponent(
	"dev2fun:yandex.zen",
	"",
	Array(
		"ADDITIONAL_FIELD" => array(""),
		"COUNT" => "100",
		"FILTER_NAME" => "",
		"IBLOCK_ID" => array("3",""),
		"SORT_FIELD" => "created",
		"SORT_ORDER" => "ASC"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>