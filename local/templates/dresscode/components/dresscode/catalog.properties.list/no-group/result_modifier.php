<?foreach ($arResult["DISPLAY_PROPERTIES"] as $ip => $arProperty){
	
	$arProperty["FILTER_URL"] = str_replace("filter/", "", $arProperty["FILTER_URL"]);
	$arProperty["FILTER_URL"] = str_replace("apply/", "", $arProperty["FILTER_URL"]);
						
}