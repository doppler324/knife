<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(empty($arResult))
	return "";

$strReturn = '<div id="breadcrumbs"><ul>';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++){

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if(!empty($title)){

		if(!empty($arResult[$index]["LINK"]) && $index != $itemSize-1){
			$strReturn .= '<li itemscope itemtype="https://data-vocabulary.org/Breadcrumb"><a href="https://'.$_SERVER['HTTP_HOST'].$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url"><span itemprop="title">'.$title.'</span></a></li><li><span class="arrow"> &bull; </span></li>';
		}

		else{
			$strReturn .= '<li><span class="changeName">'.$title.'</span></li>';
		}

	}

}

$strReturn .= '</ul></div>';

return $strReturn;

?>