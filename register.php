<?php
echo $_POST['email'];
echo $_POST['password'];
echo $_POST['password2'];
echo $_POST['nom'];


if ($_POST['email']   && $_POST['password'] && $_POST['password2'] && $_POST['nom'] &&  ($_POST['ville'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qair";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$email=$_POST['email'];
$id_ville=$_POST['ville'];
$mdp=$_POST['password'];
$nom=$_POST['nom'];
$sql="SELECT `EMAIL` FROM `user` WHERE `EMAIL`='$email' ";
$result = $conn->query($sql);



if(!($result->num_rows > 0))
{
 if($mdp==$_POST['password2'])
	{	
	    $pass_hache = password_hash($mdp, PASSWORD_DEFAULT);
       $sql="INSERT INTO `user` ( `ID_VILLE`, `NOM`, `EMAIL`, `MDP`) VALUES
        ( '$id_ville', '$nom', '$email', '$pass_hache')";



	   if ($conn->query($sql) === TRUE) 
	   {
	      echo '<script>alert("Vous êtes inscrits  ! ");
	      window.location.href = "HomePage.php";</script>';
	

	
		} else
		{
	       echo '<script>alert("Echec inscription , verifiez vos informations personnelles  ! ");
	       window.location.href = "HomePage.php";</script>';

		} 
	}else
	{
	     echo '<script>alert("Echec inscription , vos mots de passe ne sont les memes ! ");
	     window.location.href = "HomePage.php";</script>';
    }
}
else
{
	echo '<script>alert("vous avez deja fait inscription  ! ");
	window.location.href = "HomePage.php";</script>';
}  }



else{
	echo '<script>
	window.location.href = "HomePage.php";
	alert("vous devez remplir tous les champs ! ");</script>';
}





?>