<?
/* define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

//globals
global $USER;

$userName = $USER->GetFullName();
if (!$userName)
	$userName = $USER->GetLogin();
?>
<script>
	<?if ($userName):?>
	BX.localStorage.set("eshop_user_name", "<?=CUtil::JSEscape($userName)?>", 604800);
	<?else:?>
	BX.localStorage.remove("eshop_user_name");
	<?endif?>

	<?if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0 && preg_match('#^/\w#', $_REQUEST["backurl"])):?>
	document.location.href = "<?=CUtil::JSEscape($_REQUEST["backurl"])?>";
	<?endif?>
</script>

<?$APPLICATION->SetTitle("Вы зарегистрированы и успешно авторизовались.");?>
<h1>Авторизация</h1>
<p>Вы зарегистрированы и успешно авторизовались.</p>
<p><a href="<?=SITE_DIR?>" class="backToIndexPage">Вернуться на главную страницу</a></p>
<div id="empty">
	<?$APPLICATION->IncludeComponent("bitrix:menu", "emptyMenuAuth", Array(
		"ROOT_MENU_TYPE" => "left",
			"MENU_CACHE_TYPE" => "N",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => "",
			"MAX_LEVEL" => "1",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "Y",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N",
		),
		false
	);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); */?>
<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "404 ошибка");
$APPLICATION->SetPageProperty("description", "404 ошибка");
$APPLICATION->SetPageProperty("keywords_inner", "404 ошибка");
$APPLICATION->SetPageProperty("title", "404 ошибка");
$APPLICATION->SetPageProperty("keywords", "404 ошибка");
$APPLICATION->SetPageProperty("robots", "noindex, nofollow");
?>
<div id="error404">
	<div class="wrapper">
		<a href="<?=SITE_DIR?>" class="errorPic"><img src="<?=SITE_TEMPLATE_PATH?>/images/404.jpg"></a>
		<h1>Такой страницы не существует</h1>
		<div class="errorText">начните поиск с <a href="<?=SITE_DIR?>">главной страницы</a> или выберите нужный товар в <a href="<?=SITE_DIR?>catalog/">каталоге</a>:</div>
	</div>
	<div id="empty">
		<div class="wrapper">
			<?$APPLICATION->IncludeComponent("bitrix:menu", "emptyMenu", Array(
				"ROOT_MENU_TYPE" => "left",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => "",
					"MAX_LEVEL" => "1",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "Y",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N",
				),
				false
			);?>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>