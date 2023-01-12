<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet.css">
    <title>Online-Shop</title>
</head>
<body>
    <img src="../bILDER_SRC/walkurelogo.png" alt="logo" >
    <h2>
      <table id="tb1">
       <tr id="tb1">
          <th id="tb1"><a href="../index.php">Homepage</a></th>
          <th id="tb1"><a href="impressum.html">Impressum</a></th>
          <th id="tb1"><a href="anmelden.php">Anmelden</a></th>
        </tr>
    </table>
    </h2>
    <br>

    <p>Willkommen im internen Bereich! Sie k&ouml;nnen sich hier wieder abmelden. <a href="anmelden.php?logout">[Abmelden]</a></p>

    <table width='50%'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>E-mail</th>
                <th>Ort</th>
                <th>PLZ</th>
                <th>Straße</th>
                <th>Straßennummer</th>
            </tr>
        </thead>
    </table>
    <tbody>
    <?php 

    session_start();
    if(!isset($_SESSION['user_id']))
    {
        die('Sie sind nicht angemeldet! <a href="anmelden.php">[Login]</a>');
    }
        //gucken ob die datenbank erreichbar ist
        $servername = "127.0.0.1"; //ipadresse
        $username = "simon"; //username
        $password = "himbeerkuchen"; //password
        $db = "q2_shop"; //datenbankname

        // Create connection
        $connection = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($connection->connect_error){
            echo "ich bin pos 1";
            die("Connection failed: " . $conn->connect_error);     
        }

        //daten von der datenbank lesen
        $sql = "SELECT * FROM benutzer"; 
        $result = $connection->query($sql); //suche, ausführen und speichern

        //suche überprüfen
        if (!$result) {
            die("Invalid query: " . $connection->error);
        }
        //daten von der datenbank lesen und ausgeben
        while($row = $result->fetch_assoc()){
            echo "
            <table width='54%'>
                <tr>
                    <td>$row[ID]</td>
                    <td>$row[vorname]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[ort]</td>
                    <td>$row[plz]</td>
                    <td>$row[strasse]</td>
                    <td>$row[hausnummer]</td>
                </tr>
            </table>
            ";
        }

    ?>
    </tbody>
    <br>
    <table width='50%'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produktname</th>
                <th>Preis</th>
            </tr>
        </thead>
    </table>
    <tbody>
    <?php 
        
        //prüfen ob die datenbank erreichbar ist
        $servername = "127.0.0.1"; 
        $username = "simon";
        $password = "himbeerkuchen";
        $db = "q2_shop";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($connection->connect_error){
            echo "ich bin pos 2";
            die("Connection failed: " . $conn->connect_error);
        }

        //daten von der datenbank lesen
        $sql = "SELECT * FROM produkt"; 
        $result = $connection->query($sql); //suche, ausführen und speichern

        //suche überprüfen
        if (!$result) {
            die("Invalid query: " . $connection->error);
        }
        //daten von der datenbank lesen und ausgeben
        while($row = $result->fetch_assoc()){
            echo "
            <table width='54%'>
                <tr>
                    <td>$row[ID]</td>
                    <td>$row[name]</td>
                    <td>$row[preis]</td>
                </tr>
            </table>
            ";
        }

    ?>
    </tbody>

</body>
</html>
