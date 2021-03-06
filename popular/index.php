<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новинки");?><h1>Популярные товары</h1>
<?
	//include module
	\Bitrix\Main\Loader::includeModule("dw.deluxe");

	//vars
	$catalogIblockId = null;
	$arPriceCodes = array();

	//get template settings
	$arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
	if(!empty($arTemplateSettings)){
		$catalogIblockId = $arTemplateSettings["TEMPLATE_PRODUCT_IBLOCK_ID"];
		$arPriceCodes = explode(", ", $arTemplateSettings["TEMPLATE_PRICE_CODES"]);
	}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"personal", 
	array(
		"COMPONENT_TEMPLATE" => "personal",
		"ROOT_MENU_TYPE" => "left2",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?><?$APPLICATION->IncludeComponent(
	"dresscode:simple.offers", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "15",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"PROP_NAME" => "OFFERS",
		"PROP_VALUE" => "10",
		"CONVERT_CURRENCY" => "Y",
		"PROPERTY_CODE" => array(
			0 => "ATT_BRAND",
			1 => "USER_ID",
			2 => "BLOG_POST_ID",
			3 => "BLOG_COMMENTS_CNT",
			4 => "VOTE_COUNT",
			5 => "SHOW_MENU",
			6 => "SIMILAR_PRODUCT",
			7 => "RATING",
			8 => "RELATED_PRODUCT",
			9 => "VOTE_SUM",
			10 => "VIDEO",
			11 => "WARRANTY",
			12 => "DELIVERY",
			13 => "COLLECTION",
			14 => "OFFERS",
			15 => "PICKUP",
			16 => "REF",
			17 => "COLOR",
			18 => "ZOOM2",
			19 => "BATTERY_LIFE",
			20 => "SWITCH",
			21 => "GRAF_PROC",
			22 => "LENGTH_OF_CORD",
			23 => "DISPLAY",
			24 => "LOADING_LAUNDRY",
			25 => "FULL_HD_VIDEO_RECORD",
			26 => "INTERFACE",
			27 => "COMPRESSORS",
			28 => "Number_of_Outlets",
			29 => "MAX_RESOLUTION_VIDEO",
			30 => "MAX_BUS_FREQUENCY",
			31 => "MAX_RESOLUTION",
			32 => "FREEZER",
			33 => "POWER_SUB",
			34 => "POWER",
			35 => "HARD_DRIVE_SPACE",
			36 => "MEMORY",
			37 => "OS",
			38 => "ZOOM",
			39 => "PAPER_FEED",
			40 => "SUPPORTED_STANDARTS",
			41 => "VIDEO_FORMAT",
			42 => "SUPPORT_2SIM",
			43 => "MP3",
			44 => "ETHERNET_PORTS",
			45 => "MATRIX",
			46 => "CAMERA",
			47 => "PHOTOSENSITIVITY",
			48 => "DEFROST",
			49 => "SPEED_WIFI",
			50 => "SPIN_SPEED",
			51 => "PRINT_SPEED",
			52 => "SOCKET",
			53 => "IMAGE_STABILIZER",
			54 => "GSM",
			55 => "SIM",
			56 => "TYPE",
			57 => "MEMORY_CARD",
			58 => "TYPE_BODY",
			59 => "TYPE_MOUSE",
			60 => "TYPE_PRINT",
			61 => "CONNECTION",
			62 => "TYPE_OF_CONTROL",
			63 => "TYPE_DISPLAY",
			64 => "TYPE2",
			65 => "REFRESH_RATE",
			66 => "RANGE",
			67 => "AMOUNT_MEMORY",
			68 => "MEMORY_CAPACITY",
			69 => "VIDEO_BRAND",
			70 => "DIAGONAL",
			71 => "RESOLUTION",
			72 => "TOUCH",
			73 => "CORES",
			74 => "LINE_PROC",
			75 => "PROCESSOR",
			76 => "CLOCK_SPEED",
			77 => "TYPE_PROCESSOR",
			78 => "PROCESSOR_SPEED",
			79 => "HARD_DRIVE",
			80 => "HARD_DRIVE_TYPE",
			81 => "Number_of_memory_slots",
			82 => "MAXIMUM_MEMORY_FREQUENCY",
			83 => "TYPE_MEMORY",
			84 => "BLUETOOTH",
			85 => "FM",
			86 => "GPS",
			87 => "HDMI",
			88 => "SMART_TV",
			89 => "USB",
			90 => "WIFI",
			91 => "FLASH",
			92 => "ROTARY_DISPLAY",
			93 => "SUPPORT_3D",
			94 => "SUPPORT_3G",
			95 => "WITH_COOLER",
			96 => "FINGERPRINT",
			97 => "TOTAL_OUTPUT_POWER",
			98 => "HTML",
			99 => "VID_ZASTECHKI",
			100 => "VID_SUMKI",
			101 => "PROFILE",
			102 => "VYSOTA_RUCHEK",
			103 => "GAS_CONTROL",
			104 => "GRILL",
			105 => "MORE_PROPERTIES",
			106 => "GENRE",
			107 => "OTSEKOV",
			108 => "CONVECTION",
			109 => "INTAKE_POWER",
			110 => "NAZNAZHENIE",
			111 => "BULK",
			112 => "PODKLADKA",
			113 => "SURFACE_COATING",
			114 => "brand_tyres",
			115 => "SEASON",
			116 => "SEASONOST",
			117 => "DUST_COLLECTION",
			118 => "COUNTRY_BRAND",
			119 => "DRYING",
			120 => "REMOVABLE_TOP_COVER",
			121 => "CONTROL",
			122 => "FINE_FILTER",
			123 => "FORM_FAKTOR",
			124 => "SKU_COLOR",
			125 => "CML2_ARTICLE",
			126 => "MARKER_PHOTO",
			127 => "NEW",
			128 => "DELIVERY_DESC",
			129 => "SALE",
			130 => "MARKER",
			131 => "POPULAR",
			132 => "WEIGHT",
			133 => "HEIGHT",
			134 => "DEPTH",
			135 => "WIDTH",
			136 => "",
		),
		"CURRENCY_ID" => "RUB",
		"DISABLE_SELECT_CATEGORY" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_MEASURES" => "N",
		"FILTER_PRICE_CODE" => array(
			0 => "BASE",
		)
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>