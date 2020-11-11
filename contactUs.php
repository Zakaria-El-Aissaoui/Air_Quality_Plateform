<?php
session_start(); 
try {
  $bdd =new pdo("mysql:host=localhost;port=3306;dbname=qair","root","");
  } catch (PDOException $e) {
     echo 'Connexion échouée : ' . $e->getMessage();
 }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300&display=swap" rel="stylesheet">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/1f7457abdb.js"></script>

    <title>QAIR</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <!-- NAV -->
   
    
    
    

    <div class="contact-page">
    <nav  class="navbar navbar-expand-md navbar-light" style="background-color: transparent;">
           <a href="#" style="color: white"><i class="fas fa-fan fa-3x " ></i>QAIR</a>
     		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>

    <div class="collapse navbar-collapse justify-content-end" id="nav" >
         <ul class="navbar-nav">
            <li class="nav-item">
              <a
              class="nav-link text-light  px-5"
              href="#"><i class="fa fa-home" aria-hidden="true"></i>
              ACCUEIL</a>
            </li>

            <li class="nav-item">
              <a
              class="nav-link text-light px-5"
              href="VisualisationPage.php"><i class="fa fa-eye" aria-hidden="true"></i>
              VISUALISER</a>
            </li>

            <li class="nav-item">
              <a
              class="nav-link text-light px-5"
              href="aboutUs.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>
              A PROPOS</a>
            </li>
      
          
            <li class="nav-item">
               <a
              class="nav-link text-light px-5"
              href="contactUs.php"><i class="fa fa-address-book" aria-hidden="true"></i>
              CONTACT</a>
            </li>
            <?php if(!isset($_SESSION['username'])): ?>
            <li class=" nav-item">
                  <a
               class="nav-link text-light px-5"
               href="#myModal2" data-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i>
               S'INSCRIRE</a>
             </li>
             <li class=" nav-item" >
                
 <a
               class="nav-link text-light   px-5"
               href="#myModal" data-toggle="modal"><i class="fa fa-sign-in" aria-hidden="true">
            </i>SE CONNECTER</a>
             </li>
            <?php else: ?>

              <li class=" nav-item">
                  <a
               class="nav-link text-light px-4"
               href="user.php"><i class="fa fa-user" aria-hidden="true"></i>
               <?php echo $_SESSION['username']; ?></a>
             </li>
             <li class=" nav-item" >
                
              <a
               class="nav-link text-light"
               href="signout.php"><i class="fa fa-sign-out" aria-hidden="true" style="width:30px;height:20px">
            </i></a>
            <?php endif; ?>


          </ul> 

    </div>
   
      
      
    </nav>

    

    <div style="background-color: #E9EDEF" >
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                   
                  <h4 class="modal-title" id="myModalLabel">Inscription</h4>
              </div>
              <div class="modal-body">
                  <form class="pb-modalreglog-form-reg" method="POST" action="register.php">
                      <div class="form-group">
                          <div id="pb-modalreglog-progressbar"></div>
                      </div>
                      <div class="form-group">
                        <label for="email"> Nom d'utilisateur</label>
                        <div class="input-group pb-modalreglog-input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="nom" id="inputEmail" placeholder="Username">
                        </div>
                    </div>                  
  
                       
  
                      <div class="form-group">
                          <label for="email"> E-mail</label>
                          <div class="input-group pb-modalreglog-input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                              <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="password">Mot de passe</label>
                          <div class="input-group pb-modalreglog-input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                              <input type="password" class="form-control" name="password" id="inputPws" placeholder="Mot de passe">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="confirmpassword">Confirmer Mot de passe</label>
                          <div class="input-group pb-modalreglog-input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                              <input type="password" class="form-control" name="password2" id="inputConfirmPws" placeholder="Confirmer Mot de passe">
                          </div>
                      </div>
                      <div class="form-group">
                        
                          <label for="country">Ville</label>
                          <div class="input-group pb-modalreglog-input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                              <select name="ville" class="form-control">
                              <?php foreach ($result1 as $key=>$value):?>
  
  <option value="<?php echo $result1[$key]['ID_VILLE'];?>"><?php echo $result1[$key]['NOM_VILLE'];?></option>
    
    <?php endforeach;?>
                                 
                              </select>
                          </div>
                      </div>
                      
                       
                      <div class="form-group">
                          <input type="checkbox" id="ch" name="chs">
                          I agree with <a href="#">terms and conditions.</a>
                      </div>
                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary">S'inscrire</button></form>
              </div>
          </div>
      </div>
    </div>
      </div>

    
  
  <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-login">
          <div class="modal-content">
              <form action="signin1.php" method="POST">
                  <div class="modal-header">				
                      <h4 class="modal-title">Login</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">				
                      <div class="form-group">
                          <label>email</label>
                          <input type="text" name="email" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                          <div class="clearfix">
                              <label>Password</label>
                              <a href="#" class="float-right text-muted"><small>Forgot?</small></a>
                          </div>
                          
                          <input type="password" name="mdp" class="form-control" required="required">
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <label class="form-check-label"><input type="checkbox"> Remember me</label>
                      <input type="submit" class="btn btn-primary" value="Login">
                  </div>
              </form>
          </div>
      </div>
  </div>  
  
          
  

    
    <div class="contact-section">
      <h1>Contactez nous</h1>
     
    <form class="contact-form" action="mailing.php" method="post">

      <input type="text" class="contact-form-text"  placeholder="Nom" name="firstname">
      <input type="text" class="contact-form-text"  placeholder="Prenom" name="lastname">
      <input type="text" class="contact-form-text" placeholder="Email" name="email">
      <input type="text" class="contact-form-text" placeholder="Téléphone" name="objet">
      <textarea class="contact-form-text" placeholder="Votre message" name="subject"></textarea>
      <input type="submit" class="contact-form-btn" value="Send">



    </form>
  

    <div class="card middle" style="width: 250px;height:305px">
      <div class="front">
        
      </div>
      <div class="back">
        <div class="back-content middle">
          <p>Téléphone</p>
          <span>0600000000</span>
          </div>
          <div class="sm">
            <a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
          </div>
        
          
      </div> 
    </div>

<div class="card right" style="width: 250px;height:305px">
      <div class="frontR">
        
      </div>
      <div class="backR">
        <div class="back-content right">
          <p>Adresse</p>
          <span>Rabat,Maroc</span>
          </div>
          <div class="sm">
            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
</a>
          </div>
        
          
      </div> 
    </div>

      
</div>
    

  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script src="afficher.js"></script>  
    <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"
  ></script>
    <script src="https://kit.fontawesome.com/1f7457abdb.js"></script>
  </html>
