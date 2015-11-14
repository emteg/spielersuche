<?php
require_once "./config.php";
require_once "./klassen/datenbank.class.php";
require_once "./libs/smarty/Smarty.class.php";

$datenbank = new Datenbank();

// alte löschen
$sql = "
  DELETE FROM 
    spiel
  WHERE 
    zeit < DATE_SUB(CURRENT_TIME(), INTERVAL 5 hour)";
$datenbank->queryDirekt($sql);

// aktuelle Liste anzeigen
$sql = "
  SELECT 
    * 
  FROM 
    spiel 
  WHERE 
    zeit > DATE_SUB(NOW(), INTERVAL 5 HOUR) 
  ORDER BY 
    zeit DESC";

$gesuche = $datenbank->queryDirektArray($sql);

$now = new DateTime();

foreach ($gesuche as $key => $gesuch) {
  $then = new DateTime($gesuch["Zeit"]);
  $diff = $now->diff($then);
  
  if ($diff->h == 0) {
    if ($diff->i == 0) {
      $gesuche[$key]["Zeit"] = $diff->s . " sek";
    } else {
      $gesuche[$key]["Zeit"] = $diff->i . " min";
    }
  } else {
    $gesuche[$key]["Zeit"] = $diff->h . "h " . $diff->i . "m";
  }
}

$smarty = new Smarty();
$smarty->setTemplateDir("./seiten/");

$smarty->assign("gesuche", $gesuche);
$smarty->assign("now", $now);

$smarty->display("index.tpl");
?>
