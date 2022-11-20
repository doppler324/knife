<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?><?$APPLICATION->IncludeComponent(
	"elcore:tagpage",
	"template1",
	Array(
		"FILTER_NAME" => "arrFilter",
		"SEF_MODE" => "Y",
		"SEF_RULE" => "/tags/#ELEMENT_CODE#/"
	)
);?>

<div id="catalog">


	<?$APPLICATION->IncludeComponent(
		"elcore:taglist.section",
		"",
		Array(
			"IBLOCK_SECTION_ID" => $arCurSection["ID"],
			"SECTION_ID" => array("1"),
			"SHOW_PICTURE" => "N"
		)
	);?>
	<div id="catalogLine">
		<div class="column oFilter">
			<a href="#" class="oSmartFilter btn-simple btn-micro"><span class="ico"></span><?=GetMessage("CATALOG_FILTER")?></a>
		</div>
		<?if(!empty($arSortFields)):?>
			<div class="column">
				<div class="label">
					<?=GetMessage("CATALOG_SORT_LABEL");?>
				</div>
				<select name="sortFields" id="selectSortParams">
					<?foreach ($arSortFields as $arSortFieldCode => $arSortField):?>
						<option value="<?=$APPLICATION->GetCurPageParam("SORT_FIELD=".$arSortFieldCode, array("SORT_FIELD"));?>"<?if($arSortField["SELECTED"] == "Y"):?> selected<?endif;?>><?=$arSortField["NAME"]?></option>
					<?endforeach;?>
				</select>
			</div>
		<?endif;?>
		<?if(!empty($arSortProductNumber)):?>
			<div class="column">
				<div class="label">
					<?=GetMessage("CATALOG_SORT_TO_LABEL");?>
				</div>
				<select name="countElements" id="selectCountElements">
					<?foreach ($arSortProductNumber as $arSortNumberElementId => $arSortNumberElement):?>
						<option value="<?=$APPLICATION->GetCurPageParam("SORT_TO=".$arSortNumberElementId, array("SORT_TO"));?>"<?if($arSortNumberElement["SELECTED"] == "Y"):?> selected<?endif;?>><?=$arSortNumberElement["NAME"]?></option>
					<?endforeach;?>
				</select>
			</div>
		<?endif;?>
		<?if(!empty($arTemplates)):?>
			<div class="column">
				<div class="label">
					<?=GetMessage("CATALOG_VIEW_LABEL");?>
				</div>
				<div class="viewList">
					<?foreach ($arTemplates as $arTemplatesCode => $arNextTemplate):?>
						<div class="element"><a<?if($arNextTemplate["SELECTED"] != "Y"):?> href="<?=$APPLICATION->GetCurPageParam("VIEW=".$arTemplatesCode, array("VIEW"));?>"<?endif;?> class="<?=$arNextTemplate["CLASS"]?><?if($arNextTemplate["SELECTED"] == "Y"):?> selected<?endif;?>"></a></div>
					<?endforeach;?>
				</div>
			</div>
		<?endif;?>
	</div>
	<?reset($arTemplates);?>
	<?$APPLICATION->IncludeComponent(
		"dresscode:catalog.section",
		"squares",
		Array(
			"ADD_SECTIONS_CHAIN" => "N",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CONVERT_CURRENCY" => "N",
			"DETAIL_URL" => "",
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => "sort",
			"ELEMENT_SORT_FIELD2" => "id",
			"ELEMENT_SORT_ORDER" => "asc",
			"ELEMENT_SORT_ORDER2" => "desc",
			"FILTER_NAME" => "arrFilter",
			"HIDE_MEASURES" => "N",
			"HIDE_NOT_AVAILABLE" => "N",
			"IBLOCK_ID" => "15",
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_SUBSECTIONS" => "Y",
			"LINE_ELEMENT_COUNT" => "3",
			"MESSAGE_404" => "",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => "60",
			"PRICE_CODE" => array(),
			"PRICE_VAT_INCLUDE" => "Y",
			"PROPERTY_CODE" => array("", ""),
			"SECTION_CODE" => "",
			"SECTION_ID" => "",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SHOW_PRICE_COUNT" => "1",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N"
		)
	);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>