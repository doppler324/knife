<?
	use Bitrix\Main\Loader;
	require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
	if(!Loader::includeModule("sotbit.regions"))
	{
		return false;
	}
	$domain = new \Sotbit\Regions\Location\Domain();
	$domainCode = $domain->getProp("CODE");
	header('Content-Type: text/xml');
?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$domainCode?>/sitemap-iblock-1.php</loc><lastmod>2021-08-11T06:39:39+00:00</lastmod></url><url><loc><?=$domainCode?>/sitemap-iblock-3.php</loc><lastmod>2021-08-11T06:39:39+00:00</lastmod></url><url><loc><?=$domainCode?>/sitemap-iblock-15.php</loc><lastmod>2021-08-11T06:39:48+00:00</lastmod></url><url><loc><?=$domainCode?>//sitemap_seometa_1_1.php</loc><lastmod>2021-08-11T06:43:03+00:00</lastmod></url></urlset>