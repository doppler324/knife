<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
// Возвращает значения свойства Тип
$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$_GET['IBLOCK'], "CODE"=>$_GET['TIP']));
while($enum_fields = $property_enums->GetNext())
{
	$arResult[$_GET['TIP']][] = $enum_fields['VALUE'];
}
// Возвращает все разделы сайта
$res = CIBlockSection::GetList(array(),array("IBLOCK_ID" => $_GET["IBLOCK"]), false, array("ID", "NAME", "DEPTH_LEVEL", "SECTION_ID "));
while($arRes = $res->GetNext()){
	$arResult["SECTIONS"][] = array("ID" => $arRes["ID"], "NAME" => $arRes["NAME"], "DEPTH_LEVEL" => $arRes["DEPTH_LEVEL"], "SECTION_ID" => $arRes["SECTION_ID"]);
}
echo json_encode($arResult);