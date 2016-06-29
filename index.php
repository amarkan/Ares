<html>
<title>Prodotti</title>
<head>
    <style type="text/css">
        @import url(style.css);
    </style>
    <script type="text/javascript" src="photo_popup.js"></script>
</head>
<body>
<img src="http://zeldabomboniere.it/images/data/logo_zeldabomboniere_sito_new.PNG"><br><br>
<?php
include "function.php";

//CONNESSIONE DATABASE ZELDA
$servername = "ftp.zeldabomboniere.it";
$username = "fmrmlfhq";
$password = "ftpzelda238#";
$dbname = "fmrmlfhq_zelda_oc2";
$conn = new mysqli($servername, $username, $password,$dbname);

connect_db();

echo "<html>
<title>RICERCA</title>
<head></head>
<body>
<p style='font-family: Arial; font-weight: bold'> CERCA PER CODICE PRODOTTO: </p><form method=\"get\" action=\"search_code.php\">
    <input class='css-input' type=\"text\" value=\"\" name=\"testo\">
    <input class='btn' type=\"submit\" value=\"INVIA\" name=\"invia\">
</form>
</body>
</html>
";
echo "<html>
<title>RICERCA</title>
<head></head>
<body>
<p style='font-family: Arial; font-weight: bold'> CERCA PER CODICE EAN: </p><form method=\"get\" action=\"search_ean.php\">
    <input class='css-input' type=\"text\" value=\"\" name=\"testo\">
    <input class='btn' type=\"submit\" value=\"INVIA\" name=\"invia\">
</form>
</body>
</html>
";
echo "<html>
<title>RICERCA</title>
<head></head>
<body>
<p style='font-family: Arial; font-weight: bold'> CERCA PER NOME DEL PRODOTTO: </p><form method=\"get\" action=\"search_name.php\">
    <input class='css-input' type=\"text\" value=\"\" name=\"testo\">
    <input class='btn' type=\"submit\" value=\"INVIA\" name=\"invia\">
</form>
</body>
</html>
";


$conn->close();

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status == 0) ;
    {
        echo "<script> window.alert(\"INSERIRE TESTO PER LA RICERCA!\")</script>";
    }
}
?>

