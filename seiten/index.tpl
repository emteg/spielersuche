<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Spielersuche</title>
    <link rel="stylesheet" type="text/css" href="../beamer/fonts/font.css">
		<link rel="stylesheet" type="text/css" href="../beamer/infobeamer.css">
  </head>
  <body>
    <h1>Spielersuche</h1>
    <p>Für die folgenden Spiele werden zur Zeit Mitspieler gesucht:</p>
    <table>
      <thead>
        <tr>
          <th>Spiel</th>
          <th>Erreichbar via</th>
          <th>Server</th>
          <th>Gesuch von</th>
          <th>Alter</th>
        </tr>
      </thead>
      <tbody>
        {foreach $gesuche as $gesuch}
          <tr>
            <td>{$gesuch["Name"]}</td>
            <td>{$gesuch["Suche"]}</td>
            <td>{$gesuch["Server"]}</td>
            <td>{$gesuch["Spieler"]}</td>
            <td>vor {$gesuch["Zeit"]}</td>
          </tr>
        {foreachelse}
        <tr>
          <td colspan="5">- Zur Zeit sind keine Gesuche vorhanden -</td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    <p><a href="./erstellen.php">Gesuch erstellen</a>. Dein Gesuch bleibt für etwa 2 Stunden sichtbar.</p>
  </body>
</html>