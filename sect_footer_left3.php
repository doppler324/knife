<?$APPLICATION->IncludeComponent(
	"bitrix:highloadblock.view", 
	"footer_adress", 
	array(
		"BLOCK_ID" => "2",
		"CHECK_PERMISSIONS" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"LIST_URL" => "",
		"ROW_ID" => explode(".",$_SERVER["HTTP_HOST"])[0],
		"ROW_KEY" => "UF_SUBDOMAIN",
		"COMPONENT_TEMPLATE" => "footer_adress"
	),
	false
);?>