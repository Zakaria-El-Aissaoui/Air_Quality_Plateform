<?php /*
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

$id_polluant=$_GET['id_polluant'];

$quartier=$_GET['quartier'];




$query = sprintf("SELECT nom_polluant,unite_mesure FROM polluant WHERE id_polluant=? ");

//execute query
$result = $mysqli ->prepare($query);


$result -> execute(array($id_polluant));
$donnes=$result->fetch(PDO::FETCH_ASSOC);
$data[] = $donnes;

$query = sprintf("SELECT _QUANTITE,DATE_MESURE FROM capteur WHERE id_polluant=? AND ID_QUARTIER	=? AND DATE_MESURE BETWEEN  DATE_SUB(CURDATE(),INTERVAL 7 DAY) AND CURDATE()  ORDER BY DATE_MESURE  ");

//execute query
$result = $mysqli ->prepare($query);


$result -> execute(array($id_polluant,$quartier));







while ($donnes=$result->fetch(PDO::FETCH_ASSOC)) {

	 $data[] = $donnes;


}

//now print the data
print json_encode($data);*/


header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'qair');

//get connection
     $mysqli = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');


if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table

$id_polluant=$_GET['id_polluant'];

$quartier=$_GET['quartier'];




$query = sprintf("SELECT nom_polluant,unite_mesure FROM polluant WHERE id_polluant=? ");

//execute query
$result = $mysqli ->prepare($query);


$result -> execute(array($id_polluant));
$donnes=$result->fetch(PDO::FETCH_ASSOC);
$data[] = $donnes;


$query = sprintf("SELECT _QUANTITE,DATE_MESURE FROM capteur WHERE id_polluant=? AND ID_QUARTIER	=? AND DATE_MESURE BETWEEN  DATE_SUB(CURDATE(),INTERVAL 7 DAY) AND CURDATE()  ORDER BY DATE_MESURE  ");

//execute query
print json_encode($query);

$result1 = $mysqli ->prepare($query);
print json_encode($result1);



$result1 -> execute(array($id_polluant,$quartier));
print json_encode($result1);






$donnes1=$result1->fetch(PDO::FETCH_ASSOC);
print json_encode($donnes1);


print json_encode($data);

while ($donnes1=$result1->fetch()) {

	 $data[] = $donnes1;
   print json_encode($data);


}

//now print the data
print json_encode($data);
?>

