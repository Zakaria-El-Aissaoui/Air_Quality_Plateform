<?php

if(isset($_POST['email']) && isset($_POST['mdp'])){
   
    try {
      $bdd =new pdo("mysql:host=localhost;port=3306;dbname=qair","root","");
  } catch (PDOException $e) {
     echo 'Connexion échouée : ' . $e->getMessage();
 }
 $email=$_POST['email'];
 $password=$_POST['mdp'];


 $ty1 = $bdd->query("select * from user
  where email='$email'  ");
  if($ty1->rowCount()==1)
  {
    $result = $ty1 -> fetch();
    if( password_verify($password, $result['MDP']))
    {
    
        $result = $ty1 -> fetch();
         $username=$result['NOM'];
         $id_ville=$result['ID_VILLE'];

         $ty2 = $bdd->query("select * from ville
         where id_ville='$id_ville' ");
         $result2=$ty2->fetch();
          $nom_ville=$result2['NOM_VILLE'];
          session_start();
         $_SESSION['username']=$username;
         $_SESSION['id_ville']=$id_ville;
         $_SESSION['nom_ville']=$nom_ville;
         echo  $_SESSION['username'];
         echo $username;

          //echo '<script>alert("successfully logged in ! .");
           //window.location.href = "user.php";
              //</script>';
    }else
    {
           echo '<script>alert("Echec inscription , verifiez vos informations personnelles  ! ");
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
