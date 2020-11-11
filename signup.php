<?php
echo $_POST['email'];
echo $_POST['password'];
echo $_POST['password2'];
echo $_POST['nom'];


if ($_POST['email']   && $_POST['password'] && $_POST['password2'] && $_POST['nom'] && ($_POST['ville']))
 {
   try {
 $bdd =new pdo("mysql:host=localhost;port=3306;dbname=qair","root","");
 } catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
$email=$_POST['email'];
$id_ville=$_POST['ville'];
$mdp=$_POST['password'];
$nom=$_POST['nom'];

$req = $bdd->prepare('INSERT INTO user(ID_VILLE,NOM,EMAIL,MDP) VALUES(:ville, :nom, :email, mdp');
$result=$req->execute(array(
    'ville' => $id_ville,
    'nom' => $mdp,
    'email' => $email,
    'mdp' => $mdp));





//$sql = $connection->query("INSERT INTO user (id_ville, nom, email, mdp) 
   //         VALUES ('{$id_ville}', '{$nom}', '{$email}', '{$mdp}')");



/*$req=$bdd->prepare("insert into user(id_ville,nom,email,mdp) values (?,?,?,?)");
$para=array($id_ville,$nom,$email,$mdp);
$req->execute($para)
$result=$req->fetch()*/;
   if($result)
   {
       echo '<script>alert("Vous êtes inscrits  ! ");
        window.location.href = "HomePage.php";</script>';

   }
    else
   {
     // echo "<script>alert('Echec inscription , verifiez vos informations personnelles');</script>";
      echo '<script>alert("Echec inscription , verifiez vos informations personnelles  ! ");
      window.location.href = "HomePage.php";</script>';}
  
  }
else
{
  // echo "<script>alert('Echec inscription , verifiez vos informations personnelles');</script>";
  echo '<script>alert("Echec inscription , verifiez vos informations personnelles  ! ");
     window.location.href = "HomePage.php";</script>';}


?>
