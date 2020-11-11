<?php

if(isset($_POST['email']) && isset($_POST['mdp'])){
   
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
     $password=$_POST['mdp'];
    $sql="SELECT * FROM `user`  WHERE `EMAIL`='$email' ";
    $ty1 = $conn->query($sql);
     //$ty1 = $conn->query("select * from user
    //where email='$email'  ");
  if(($ty1->num_rows > 0))
  {
    $result = $ty1->fetch_assoc();
    if( password_verify($password, $result['MDP']))
    {
        
      //$result = $ty1 -> fetch();
      $username=$result['NOM'];
      $id_ville=$result['ID_VILLE'];
      //echo $username;
      $sql="SELECT * FROM `ville` WHERE `ID_VILLE`='$id_ville' ";
      $ty2 = $conn->query($sql);
      $result = $ty2->fetch_assoc();

      // $ty2 = $bdd->query("select * from ville
      //where id_ville='$id_ville' ");
      //$result2=$ty2->fetch();
      $nom_ville=$result['NOM_VILLE'];
      session_start();
      $_SESSION['username']=$username;
      $_SESSION['id_ville']=$id_ville;
      $_SESSION['nom_ville']=$nom_ville;
      //echo  $_SESSION['username'];
      //echo $username;

       echo '<script>alert("successfully logged in ! .");
       window.location.href = "user.php";
       </script>';
    }else
    {
        echo '<script>alert("Echec inscription 11 , verifiez vos informations personnelles  ! ");
   	    window.location.href = "HomePage.php";</script>';
    }
  }
  else
  {
     echo '<script>alert("Echec inscription , verifiez vos informations personnelles  ! ");
	     window.location.href = "HomePage.php";</script>';
  }
}

?>
