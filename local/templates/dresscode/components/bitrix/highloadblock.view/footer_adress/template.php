<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>

<?if($_SESSION["SOTBIT_REGIONS"]["NAME"] != "Россия"):?>
<div itemscope="itemscope" itemtype="https://schema.org/PostalAddress">
	<p style="color:#ffffff;" class="hr">Наш адрес: г. <span itemprop="addressLocality"><?=$_SESSION["SOTBIT_REGIONS"]["NAME"]?></span>, <span itemprop="streetAddress"><?=$_SESSION["SOTBIT_REGIONS"]["UF_ADDRESS"]?></span></p>
	<p style="color:#ffffff;" class="hr">Наш телефон: <?=$_SESSION["SOTBIT_REGIONS"]["UF_PHONE"][0]?></p>
</div>
<?endif;?>