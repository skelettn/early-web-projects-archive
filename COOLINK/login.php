<?php
require('lg/id/profilbd.php');

@ $msg = $_GET['msg'];

if(isset($_SESSION['id'])) {
    header('location: dashboard/');
}

if(isset($_POST['firelink_login'])) {
    $mail_firelink = htmlspecialchars($_POST['mail_firelink']);
    $pass_firelink = sha1($_POST['pass_firelink']);
    if(!empty($mail_firelink) AND !empty($pass_firelink)) {
       $requser = $bdd->prepare("SELECT * FROM firelink WHERE mail = ? AND motdepasse = ?");
       $requser->execute(array($mail_firelink, $pass_firelink));
       $userexist = $requser->rowCount();
       if($userexist == 1) {
          $userinfo = $requser->fetch();
          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['pseudo'] = $userinfo['pseudo'];
          $_SESSION['mail'] = $userinfo['mail'];
          header('Location: lg/confirm'); 
       } else {
          $erreur = "L'adresse email et le mot de passe ne correspondent pas à ceux présents dans nos fichiers.";
       }
    } else {
         $erreur = "Merci de remplir tous les champs";
    }
}
?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Connexion | Coolink</title>
      <link rel="icon" href="content/Homepage-Images/favicon.png" sizes="32x32" type="image/png">
      <link rel="stylesheet" href="content/css/bootstrap.min.css">
      <link rel="stylesheet" href="content/css/8938584-Modern-Coolink.css" />
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container">
            <a class="navbar-brand" href="index"><img src="content/img/newCoolink/small/coolink_bsmall.png" alt="Coolink"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link l1" href="login">Connexion</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link l2" href="join">Commencer</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container login" id="login">
         <h1>Connexion</h1>
         <form method="POST" action="">
            <?php
                if(!empty($msg) && $msg == "success") {
                    echo '<div class="erreur">Votre compte à été crée</div>';
                }
            ?>
            <?php
                if(isset($erreur)) {
                    echo '<div class="erreur">'.$erreur.'</div>';
                }
            ?>
            <div class="form-group">
               <input type="email" name="mail_firelink" class="form-control input-form mb-3" placeholder="Email">
               <input type="password" name="pass_firelink" class="form-control input-form mb-4" placeholder="Mot de passe">
               <input type="submit" name="firelink_login" class="btn btn-submit" value="Me connecter">
               <p>Vous n'avez pas de compte ? <u><a href="join" class="media-link" >Inscrivez-vous</a></u></p>
             </div>
         </form>
      </div>
      <div class="end-section"></div>
      <section id="footer">
         <div class="container footer">
            <ul class="links">
               <li><a href="index">Accueil</a></li>
               <li><a href="join">Commencer</a></li>
               <li><a href="login">Connexion</a></li>
               <li><a href="about">A-propos</a></li>
               <li><a href="hc/">Besoin d'aide</a></li>
            </ul>
         </div>
      </section>
    <script src="content/js/bootstrap.min.js"></script>
   </body>
</html>