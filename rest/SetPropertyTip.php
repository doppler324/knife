<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$ibpenum = new CIBlockPropertyEnum;
$prop_id = "";
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc") , Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$_GET['IBLOCK'], "CODE"=>$_GET['TIP']));
if($prop_fields = $properties->GetNext()){
	$prop_id = $prop_fields['ID'];
}
if($PropID = $ibpenum->Add(Array('PROPERTY_ID'=>$prop_id, 'VALUE'=>$_GET['WORD'])))
 echo json_encode($PropID);