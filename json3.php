<?php
//setting header to json
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'qair');

//get connection
     $mysqli = new PDO("mysql:host=localhost;port=3306;dbname=qair","root","");


if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table

$id_ville=$_GET['id_ville'];
$id_polluant=2;
$req1=$mysqli->query("select _QUANTITE from capteur WHERE DATE_MESURE=DATE_FORMAT(NOW(), '%Y-%m-%d') AND ID_POLLUANT=$id_polluant AND ID_QUARTIER=$id_ville");

$result1=$req1->fetchAll();
 

print json_encode($result1);
?>