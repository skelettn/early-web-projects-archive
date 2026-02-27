<?php
require('id/profilbd.php');

@ $msg = $_GET['msg'];

if(isset($_POST['sendHelp'])) {
    if(isset($_POST['help__email']) AND !empty($_POST['help__email']) && isset($_POST['help__textarea']) AND !empty($_POST['help__textarea'])) {
        $help__email = htmlspecialchars($_POST['help__email']);
        $help__textarea = htmlspecialchars($_POST['help__textarea']);
        $insertDB = $bdd->prepare("INSERT INTO `help_coolink`(`help__email`,`help__textarea`) VALUES(?, ?)");
        $insertDB->execute(array($help__email, $help__textarea));
        header("location: ../hc/?msg=success"); 
    } else {
        header("location: ../hc/?msg=error"); 
    }
}




?>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Pages d'aide de Coolink</title>
      <link rel="icon" href="../style/img/favicon.png" sizes="32x32" type="image/png">
      <link rel="stylesheet" href="../style/bootstrap.min.css">
      <link rel="stylesheet" href="help_files/css/help.css" />
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
   </head>
   <body>
       <header class="help__header">
            <div class="container">
                <nav class="navbar">
                    <a class="navbar-brand"><img src="../content/img/newCoolink/small/coolink_wsmall.png"></a>
                    <form class="form-inline">
                        <a href="../" class="btn navbar-btn">Retourner sur COOLINK</a>
                    </form>
                </nav>
                <div class="help__form">
                    <p>Comment puis-je vous aider ?</p>
                    <div class="form-group">
                        <form>
                            <input type="text" name="help__search" class="form-control" placeholder="Rechercher sur la page">
                        </form>
                        <div class="help__form_separator"></div>
                        <a href="../status" class="btn navbar-btn">Nos status de serveur</a>
                    </div>
                </div>
            </div>
       </header>
       <section>
           <div class="container">
               <h1 class="section__title"><i class="far fa-star"></i> Les meilleurs articles</h1>
            <div class="row card-1">
                <div class="col-sm">
                    <a href="categories/229592437940-Account-Settings">
                        <div class="card">
                            <div class="card-body">
                                <img src="help_files/img/s/s_account.png">
                                <p class="card-title">Paramètres de compte</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="categories/950706855656-Security">
                        <div class="card">
                            <div class="card-body">
                                <img src="help_files/img/s/s_security.png">
                                <p class="card-title">Sécurité</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="categories/689290050644-Billing">
                        <div class="card">
                            <div class="card-body">
                                <img src="help_files/img/s/s_credit-card.png">
                                <p class="card-title">Facturation</p>
                            </div>
                        </div>
                    </a>
                </div>
              </div>
              <div class="row card-2">
                <div class="col-sm">
                    <a href="categories/513851806589-My-Coolink-Does-Not-Work">
                        <div class="card">
                            <div class="card-body">
                                <img src="help_files/img/s/s_offline.png">
                                <p class="card-title">Ma page ne marche pas</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="categories/351677275644-Langages">
                        <div class="card">
                            <div class="card-body">
                                <img src="help_files/img/s/s_language.png">
                                <p class="card-title">Langue et traduction</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="categories/799040861217-F-A-Q">
                        <div class="card">
                            <div class="card-body">
                                <img src="help_files/img/s/s_faq.png">
                                <p class="card-title">F.A.Q</p>
                            </div>
                        </div>
                    </a>
                </div>
              </div>
          </div>
       </section>
       <section id="help">
           <div class="container">
               <form method="POST" action="">
                    <div class="help__separator"></div>
                    <?php
                    if(!empty($msg) && $msg == "success") {
                        echo '<div class="alert alert__danger">Votre demande à été envoyé</div>';
                    } else if(!empty($msg) && $msg == "error") {
                        echo '<div class="alert alert__danger">Une erreur est survenue</div>';
                    }
                    ?>
                    <h1 class="section__title"><i class="far fa-question-circle"></i> Encore besoin d'aide ?</h1>
                    <input type="email" class="help__email" name="help__email" placeholder="Votre adresse e-mail">
                    <textarea class="help__textarea" name="help__textarea" rows="4" cols="50" placeholder="Décrivez-nous votre problème"></textarea>
                    <button type="submit" name="sendHelp" class="btn help-btn">Envoyer</button>
                </form>
           </div>
       </section>
       <section id="footer">
         <div class="container footer">
            <ul class="links">
               <li><a href="../">Accueil</a></li>
               <li><a href="../join">Commencer</a></li>
               <li><a href="../login">Connexion</a></li>
               <li><a href="">A-propos</a></li>
               <li><a href="">Besoin d'aide</a></li>
            </ul>
         </div>
      </section>
   </body>
</html>