<?php
require_once "./config.php";
require_once "./libs/smarty/Smarty.class.php";

$smarty = new Smarty();
$smarty->setTemplateDir("./seiten/");

$smarty->display("erstellen.tpl");
?>