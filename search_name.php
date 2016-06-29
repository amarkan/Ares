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
$servername = "ftp.zeldabomboniere.it";
$username = "fmrmlfhq";
$password = "ftpzelda238#";
$dbname = "fmrmlfhq_zelda_oc2";
$sito = "http://zeldabomboniere.it/images/";

$conn = new mysqli($servername, $username, $password, $dbname);
$testo = $_GET['testo'];
$query = "SELECT product.product_id, product.model, product_description.name, product.ean, product.image, product.price, product.status FROM product INNER JOIN product_description ON product.product_id=product_description.product_id WHERE product_description.name LIKE '%$testo%' AND product_description.language_id =1 ORDER BY product.model";
//$query = "SELECT model, price FROM product WHERE model='$testo'ORDER BY model LIMIT 10";
$result = $conn->query($query);

echo "<table id=\"tfhover\" class=\"tftable\" border=\"1\">
    <tr>
        <th width='5%' align='left'>FOTO</th>
        <th width='5%' align='left'>CODICE</th>
        <th width='65%' align='left'>NOME PRODOTTO</th>
        <th width='15%' align='left'>COD. EAN</th>
        <th width='5%' align='left'>PREZZO</th>
        <th width='5%' align='left'>DISPON.</th>
    </tr>
    </tbody>
</table>";

//controllo se testo è vuoto
if (empty($testo)) {
    header('location:index.php?status=0');exit;
}else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $codice = $row['model'];
            $prezzo = $row['price'];
            $nome = $row['name'];
            $ean = $row['ean'];
            $disp = $row['status'];
            $immagine = $sito.$row['image'];
            if ($disp == 1){
                $qnty = "http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-2/32/success-icon.png";
            }else{
                $qnty = "http://icons.iconarchive.com/icons/ampeross/qetto-2/32/no-icon.png";
            }

            echo "<html>
<title>Prodotti</title>
<head>
<script type='text/javascript' src='photo_popup.js'></script>
</head>
<body>
<table id=\"tfhover\" class=\"tftable\" border=\"1\">
<tr>
<td width='5%' align='left'><img id=my-image src=$immagine height='40px' width='65px'></a>
<script src=\"http://code.jquery.com/jquery-1.12.4.min.js\"></script>
<script src=\"photo_popup.js\"></script>
<script>
$(document).ready(function () {
  $('#my-image').imageTooltip();
});
</script>
<script type=\"text/javascript\">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</td>
<td width='5%' align='left'>".$row['model']."</td>
<td width='65%' align='left'>$nome</td>
<td width='15%' align='left'>$ean</td>
<td width='5%' align='left'><p><b>&euro; ".substr($prezzo,0,-2)."</b></p></td>
<td width='5%' align='center'><img src='$qnty'></td>
</tr>
</table>
</table>
</body>
</html>";
        }
    }
}
if ($result->num_rows < 1){
    echo "<p style='color:darkred;'><B>NESSUN RISULTATO</B></p>";
}
$conn->close();

echo "<br><form>
    <input class='btn' type=\"button\" value=\"INDIETRO\" onclick=\"location.href='index.php'\">
</form><br>";

?>

</body>
</html>