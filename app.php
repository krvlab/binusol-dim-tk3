<?php
require_once("./class/Main.php");

// $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// var_dump($uriSegments);
// var_dump($_GET);

$page = ((isset($_GET['page']))?$_GET['page']:'home');
$isprocess = ((isset($_GET['process']))?true:false);

$main = new Main();
if ($isprocess) {
    $processName = $_GET['process'];
    $main->process($processName);
}
else {
    $main->view($page);
}
?>