<?

if(!$_GET['red']){
	return;
}
$url = $_GET['red'];
header('Location: '. $url);