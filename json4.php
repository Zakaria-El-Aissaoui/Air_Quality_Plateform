
<?php
//setting header to json
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');

//get connection
     $mysqli = new PDO('mysql:host=localhost;dbname=qair;charset=utf8', 'root', '');


if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table

$id_polluant=$_GET['id_polluant'];
$date_debut=$_GET['date_debut'];
$date_fin=$_GET['date_fin'];
$quartier=$_GET['quartier'];



$query = sprintf("SELECT nom_polluant,unite_mesure FROM polluant WHERE id_polluant=? ");

//execute query
$result = $mysqli ->prepare($query);


$result -> execute(array($id_polluant));
$donnes=$result->fetch(PDO::FETCH_ASSOC);
$data[] = $donnes;

$query = sprintf("SELECT _QUANTITE,DATE_MESURE FROM capteur WHERE id_polluant=? AND ID_QUARTIER	=? AND DATE_MESURE BETWEEN ? AND ?  ORDER BY DATE_MESURE  ");

//execute query
$result = $mysqli ->prepare($query);


$result -> execute(array($id_polluant,$quartier,$date_debut,$date_fin));







while ($donnes=$result->fetch(PDO::FETCH_ASSOC)) {

	 $data[] = $donnes;


}

//now print the data
print json_encode($data);





