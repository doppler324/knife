<?
namespace Sotbit\Seometa;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$morphy = SeoMetaMorphy::morphyLibInit();
?>
<?
$word = $_GET['WORD'];
$temp = $morphy->lemmatize(mb_strtoupper($word));
echo count($temp) > 1 ? json_encode($temp[1]) : json_encode($temp[0]);