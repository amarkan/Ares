<?php

//CONNESSIONE AL DB
function connect_db(){
    $servername = "ftp.zeldabomboniere.it";
    $username = "fmrmlfhq";
    $password = "ftpzelda238#";
    $dbname = "fmrmlfhq_zelda_oc2";

    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
        die("Connessione Fallita:" . $conn->connect_error);
    }
}

//ELENCO PRODOTTI IN TABELLA

function list_product_name_order(){

    $servername = "ftp.zeldabomboniere.it";
    $username = "fmrmlfhq";
    $password = "ftpzelda238#";
    $dbname = "fmrmlfhq_zelda_oc2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $query = "SELECT product.product_id, product.model, product_description.name, product.ean, product.image, product.price, product.status FROM product INNER JOIN product_description ON product_description.product_id=product.product_id ORDER BY product_description.name LIMIT 100";
    $result = $conn->query($query);
    $sito = "http://zeldabomboniere.it/images/";

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

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $codice = $row['model'];
            $prezzo = $row['price'];
            $nome = $row['name'];
            $ean = $row['ean'];
            $disp = $row['status'];
            if ($disp == 1){
                $qnty = "http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-2/32/success-icon.png";
            }else{
                $qnty = "http://icons.iconarchive.com/icons/ampeross/qetto-2/32/no-icon.png";
            }
            echo "
<html>
<title>Prodotti</title>
<head>
</head>
<body>
<table id=\"tfhover\" class=\"tftable\" border=\"1\">
<tr>
<td width='5%' align='left'><input class='btn' type='button' onclick='' value='FOTO' </td>
<td width='5%' align='left'>".$row['model']."</td>
<td width='65%' align='left'>$nome</td>
<td width='15%' align='left'>$ean</td>
<td width='5%' align='left'><p><b>&euro; ".substr($prezzo,0,-2)."</b></p></td>
<td width='5%' align='center'><img src='$qnty'></td>
</tr>
</table>
</table>
</body>
</html>
";
        }
    }
}
?>