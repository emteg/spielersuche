<?php
require_once "./config.php";
require_once "./klassen/datenbank.class.php";
require_once "./libs/smarty/Smarty.class.php";

$datenbank = new Datenbank();

$ip = $_SERVER["REMOTE_ADDR"];

var_dump($_POST);

if (isset($_POST["spiel"]) && isset($_POST["suche"]) && isset($_POST["server"]) && isset($_POST["spieler"])) {
  $spiel = $_POST["spiel"];
  $suche = $_POST["suche"];
  $server = $_POST["server"];
  $spieler = $_POST["spieler"];
} else {
  die("Nicht alle Formulardaten vorhanden :/");
}

if (strlen($spiel) > 1 && strlen($spieler) > 0 && ($suche == "ingame" || $suche == "ip" || $suche = "anderes")) {

  $sql = "
    SELECT
      COUNT(*) as count
    FROM
      spiel
    WHERE
      ip = :ip";    
  $params = Array("ip" => $ip);
  $res = $datenbank->queryDirektSingle($sql, $params);
  
  if (((int) $res["count"]) > 3) {
    $sql = "
      DELETE FROM
        spiel
      WHERE
        ip = :ip
      ORDER BY
        zeit ASC
      LIMIT 1";
    $datenbank->queryDirekt($sql, $params);
  }

  $sql = "
    INSERT INTO
      spiel (Name, Suche, Server, Ip, Spieler)
    VALUES
      (:name, :suche, :server, :ip, :spieler)";
  $params = Array("name" => $spiel, "suche" => $suche, "server" => $server,
    "ip" => $ip, "spieler" => $spieler);
    
  $datenbank->queryDirekt($sql, $params);
  
  header("Location: ./index.php");
} else {
  die("Ungültige Formulardaten vorhanden :/");
}
?>