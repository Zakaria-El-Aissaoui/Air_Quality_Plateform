
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

$id_polluant=$_GET['id_polluant'];
$date_debut=$_GET['date_debut'];
$date_fin=$_GET['date_fin'];
$quartier=$_GET['quartier'];
echo $id_polluant;




//$query = sprintf("SELECT nom_polluant,unite_mesure FROM polluant WHERE id_polluant=? ");
$query = sprintf("SELECT * FROM `polluant` WHERE `ID_POLLUANT`='$id_polluant'  ");

//execute query
$result = $mysqli ->prepare($query);

$result -> execute(array($id_polluant));
$donnes=$result->fetch(PDO::FETCH_ASSOC);
$data[] = $donnes;
print json_encode($result);

?>





