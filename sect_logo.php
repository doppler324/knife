<?if(MAIN_PAGE === TRUE):?>


	<span><img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt=""></span>
<?else:?>
	<a href="<?=SITE_DIR?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt=""></a>
<span class="logospan"><?=($_SESSION["SOTBIT_REGIONS"]["NAME"] != "Россия" ? $_SESSION["SOTBIT_REGIONS"]["NAME"] : "")?></span>


<?endif;?>