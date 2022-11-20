<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\Template;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Config\Option;
use Sotbit\Seometa\Helper\OGraphTWCard;
use Sotbit\Seometa\OpengraphTable;
use Sotbit\Seometa\SeometaNotConfiguredPagesTable;
use Sotbit\Seometa\SeometaUrlTable;
use Sotbit\Seometa\SeoMetaMorphy;
use Sotbit\Seometa\SeometaStatisticsTable;
use Sotbit\Seometa\TwitterCardTable;

if(!Loader::includeModule('sotbit.seometa') || !Loader::includeModule('iblock'))
{
    return false;
}

global $USER;
global $APPLICATION;
global $SeoMetaWorkingConditions;
global $sotbitSeoMetaTitle; //Meta title
global $sotbitSeoMetaKeywords; //Meta keywords
global $sotbitSeoMetaDescription; //Meta description
global $sotbitFilterResult; //Filter result
global $sotbitSeoMetaH1; //for set h1
global $sotbitSeoMetaBottomDesc; //for set bottom description
global $sotbitSeoMetaTopDesc; //for set top description
global $sotbitSeoMetaAddDesc; //for set additional description
global $sotbitSeoMetaFile;
global $sotbitSeoMetaBreadcrumbLink;
global $sotbitSeoMetaBreadcrumbTitle;
global ${$arParams['FILTER_NAME']};
global $issetCondition;

// стоковые настройки фильтра
if (isset($arParams["TEMPLATE_THEME"]) && !empty($arParams["TEMPLATE_THEME"]))
{
	$arAvailableThemes = array();
	$dir = trim(preg_replace("'[\\\\/]+'", "/", dirname(__FILE__)."/themes/"));
	if (is_dir($dir) && $directory = opendir($dir))
	{
		while (($file = readdir($directory)) !== false)
		{
			if ($file != "." && $file != ".." && is_dir($dir.$file))
				$arAvailableThemes[] = $file;
		}
		closedir($directory);
	}

	if ($arParams["TEMPLATE_THEME"] == "site")
	{
		$solution = COption::GetOptionString("main", "wizard_solution", "", SITE_ID);
		if ($solution == "eshop")
		{
			$theme = COption::GetOptionString("main", "wizard_eshop_adapt_theme_id", "blue", SITE_ID);
			$arParams["TEMPLATE_THEME"] = (in_array($theme, $arAvailableThemes)) ? $theme : "blue";
		}
	}
	else
	{
		$arParams["TEMPLATE_THEME"] = (in_array($arParams["TEMPLATE_THEME"], $arAvailableThemes)) ? $arParams["TEMPLATE_THEME"] : "blue";
	}
}
else
{
	$arParams["TEMPLATE_THEME"] = "blue";
}

$arParams["FILTER_VIEW_MODE"] = (isset($arParams["FILTER_VIEW_MODE"]) && toUpper($arParams["FILTER_VIEW_MODE"]) == "HORIZONTAL") ? "HORIZONTAL" : "VERTICAL";
$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";

/* МОЙ КОД */

// формирование ссылок для вывода в фильтре
if(!IS_FILTER){	
	foreach($arResult["ITEMS"] as $key => $arItem){
		foreach($arItem["VALUES"] as $val => &$ar){
			
			if($key == 52){
				$ar['FILTER_URL'] = $APPLICATION->GetCurPage(false) . Cutil::translit($ar["VALUE"], "ru", array("max_len" => 1000, "change_case" => "L", "replace_space" => "-", "replace_other" => "-")) . '/';
				$ar['TEXT_FILTER'] = '<a style="color:#000000;" href="' . $ar['FILTER_URL'] . '">' . $arResult['SECTION_TITLE'] . " " . $ar["VALUE"] . "</a>";
			}elseif($key == 322){
				$ar['FILTER_URL'] = $APPLICATION->GetCurPage(false) . "steel-" . Cutil::translit($ar["VALUE"], "ru", array("max_len" => 1000, "change_case" => "L", "replace_space" => "-", "replace_other" => "-")) . '/';
				$ar['TEXT_FILTER'] = '<a style="color:#000000;" href="' . $ar['FILTER_URL'] . '">' . $arResult['SECTION_TITLE'] . " " . $ar["VALUE"] . "</a>";
			}else{
				$ar['TEXT_FILTER'] = $ar["VALUE"];
			}
		}
	}
}else{
	
	// получение заголовка для подстановки в фильтр

	CSeoMeta::SetFilterResult($sotbitFilterResult, $arParams['SECTION_ID']); 
	CSeoMeta::AddAdditionalFilterResults(${$arParams['FILTER_NAME']}, $arParams['KOMBOX_FILTER']);
	CSeoMeta::FilterCheck();

	$arResult1 = CSeoMeta::getRules(array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "SECTION_ID" => $arParams["SECTION_ID"]));
	
	$COND = array();
	foreach($arResult1 as $key => $condition)
	{
		$COND[$key]['RULES'] = unserialize($condition['RULE']);
		$COND[$key]['META'] = unserialize($condition['META']);
		$COND[$key]['ID'] = $condition['ID'];
		$COND[$key]['NO_INDEX'] = $condition['NO_INDEX'];
		$COND[$key]['STRONG'] = $condition['STRONG'];
	}
	
	$issetCondition = false;
	$results = array();
	foreach($COND as $rule)
	{
		if($res = CSeoMeta::SetMetaCondition($rule, $arParams['SECTION_ID'], $condition['INFOBLOCK'])) {
			$arResult['AR_TAG_META'] = $res;
		}
	}
	$sku = new \Bitrix\Iblock\Template\Entity\Section($arParams['SECTION_ID']);
	$arResult['AR_TAG_META']['KEYWORDS'] = \Bitrix\Iblock\Template\Engine::process($sku,
                SeoMetaMorphy::prepareForMorphy($arResult['AR_TAG_META']['KEYWORDS']));
				
	// подставляем тэги в фильтр
	
	foreach($arResult["ITEMS"] as $key => $arItem){
		foreach($arItem["VALUES"] as $val => &$ar){
			if(count($arResult["CHECKED"]) == 1 && array_key_first($arResult["CHECKED"]) != 52){			
				
				if(($key == 52 && array_key_first($arResult["CHECKED"]) != 320) || $key == 322 ){
					$ar['TEXT_FILTER'] = $arResult['AR_TAG_META']['KEYWORDS'] . ' ' . $ar["VALUE"];
				}elseif($key == 52 && array_key_first($arResult["CHECKED"]) == 320 && $ar["ELEMENT_COUNT"] > 0){
						$ar['TEXT_FILTER'] = $arResult['AR_TAG_META']['KEYWORDS'] . ' ' . $ar["VALUE"];
				}else{
					$ar['TEXT_FILTER'] = $ar["VALUE"];
				}
			}elseif($key == 322){
				$ar['TEXT_FILTER'] = $arResult['AR_TAG_META']['KEYWORDS'] . ' ' . $ar["VALUE"];
			}else{
				$ar['TEXT_FILTER'] = $ar["VALUE"];
			}
		}
	}
		
} 
// копирование массива фильтра для правильной работы фильтра сотбит
global $sotbitFilterResult;  
$sotbitFilterResult = $arResult;