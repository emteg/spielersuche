<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gesuch erstellen</title>
    <link rel="stylesheet" type="text/css" href="../beamer/fonts/font.css">
		<link rel="stylesheet" type="text/css" href="../beamer/infobeamer.css">
  </head>
  <body>
    <h1>Spielersuche - Gesuch erstellen</h1>
    <form action="./speichern.php" method="post">
      <input type="text" name="spiel" placeholder="Name des Spiels"/>
      <select name="suche">
        <option value="ingame">In-Game Browser</option>
        <option value="ip">IP-Adresse</option>
        <option value="anders">Anderes</option>
      </select>
       <input type="text" name="server" placeholder="IP, Adresse o.ä."/>
      <input type="text" name="spieler" placeholder="Dein Name"/>
      <input type="submit" value="Erstellen"/>
    </form>
  <body>
</html>