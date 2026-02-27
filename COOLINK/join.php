<!-- /*COPYRIGHT Hypera.*/ -->
<?php
require('lg/id/profilbd.php');
require "lg/PHPMailer/PHPMailerAutoload.php";

if(isset($_POST['register_form'])) {
    if(!empty(trim($_POST['mail']))  AND !empty(trim($_POST['password']))) {
         $unique_id = md5(time() . mt_rand(1, 1000000));
         $email = htmlspecialchars($_POST['mail']);
         $password = sha1($_POST['password']);
         $pseudo = '';
         $prenomfamille = '';
         $avatar = '';
         $website_title = '';
         $website_description = '';
         $website_theme = '';
         date_default_timezone_set('Europe/Paris');
         $date = date('d/m/Y à H:i:s');
         $confirm_key = rand(1000000, 9000000);
         if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check_email_request = $bdd->prepare("SELECT * FROM `firelink` WHERE `mail` = ?");
            $check_email_request->execute(array($email));
            $check_email = $check_email_request->rowCount();
             if($check_email == 0) {
                 $insert_member = $bdd->prepare("INSERT INTO `firelink`(
                 `unique_id`,         
                 `mail`, 
                 `motdepasse`,
                 `pseudo`,
                 `registerdate`,
                 `confirm_key`,
                 `confirme`,
                 `prenomfamille`,
                 `avatar`, 
                 `isadmin`,
                 `ismoderateur`,
                 `isban`,
                 `ban_reason`,
                 `premium`,
                 `website_title`, 
                 `website_description`, 
                 `website_picture`, 
                 `website_theme`, 
                 `website_color`, 
                 `website_font`, 
                 `beta_access`, 
                 `website_statut`) 
                 VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $insert_member->execute(array(
                   $unique_id, 
                   $email, 
                   $password, 
                   $pseudo, 
                   $date, 
                   $confirm_key, 
                   0, 
                   $prenomfamille, 
                   $avatar, 
                   0, 
                   0, 
                   0, 
                   '', 
                   0, 
                   $website_title, 
                   $website_description, 
                   0, 
                   $website_theme, 
                   '#000000', 
                   'Montserrat',
                   0, 
                   0
               ));

                $recupUser = $bdd->prepare('SELECT * FROM firelink WHERE mail = ?');
                $recupUser->execute(array($email));
                if($recupUser->rowCount() > 0) {
                    $userInfos = $recupUser->fetch();
                    $_SESSION['id'] = $userInfos['id'];
                }

                function smtpmailer($to, $from, $from_name, $subject, $body)
                    {
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true; 
                
                        $mail->SMTPSecure = 'ssl'; 
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 465;  
                        $mail->Username = 'YOUR_GMAIL_EMAIL';
                        $mail->Password = 'YOUR_GMAIL_APP_PASSWORD';   
                
                //   $path = 'reseller.pdf';
                //   $mail->AddAttachment($path);
                
                        $mail->IsHTML(true);
                        $mail->From="noreply.coolink@gmail.com";
                        $mail->FromName=$from_name;
                        $mail->Sender=$from;
                        $mail->AddReplyTo($from, $from_name);
                        $mail->Subject = $subject;
                        $mail->Body = $body;
                        $mail->AddAddress($to);
                        if(!$mail->Send())
                        {
                            $error ="Please try Later, Error Occured while Processing...";
                            return $error; 
                        }
                        else 
                        {
                            $error = "Thanks You !! Your email is sent.";  
                            return $error;
                        }
                    }
                    
                    $to   = $email;
                    $from = 'noreply.coolink@gmail.com';
                    $name = 'COOLINK';
                    $subj = 'Confirmation de compte';
                    $msg = '
                    <div style="padding:0;margin:0;font-family:Helvetica,Arial,sans-serif;width:100%">
                        <div bgcolor="#fafafa" style="background-color:#fafafa;padding:2% 5% 2% 5%">
                            <div style="background-color:white;text-align:center;border-radius:20px">
                                <div style="padding:20px">
                                    <a href="http://localhost/COOLINK/" style="text-decoration:none;"><img src="https://i.ibb.co/DzVKDZW/coolink-bsmall.png" alt="COOLINK"></a>
                                </div>
                                <div style="padding:20px;text-align:center">
                                    <p style="font-size:18px">
                                        <b>Bonjour, identifiant '.$_SESSION['id'].'</b>
                                    </p>
                                    <br>
                                    <p style="color: black !important;">Merci d\'avoir rejoint COOLINK !</p>
                                    <p style="color: black !important;">Pour terminer la procédure d\'inscription, il vous suffit de confirmer que votre adresse mail est bien la votre.</p>
                                    <br>
                                    <p>
                                        <a href="http://localhost/COOLINK/lg/script/confirmation.php?id='.$_SESSION['id'].'&confirm_key='.$confirm_key.'" style="color:white;background:#0e71c8;border-radius:6px;padding:10px 15px 10px 15px;text-decoration:none">
                                            Confirmer
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    ';
                    
                    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
                    // Suppression des variables de session et de la session
                    $_SESSION = array();
                    session_destroy();

                    header('Location: lg/verify');
                    exit();
             } else {
                 $erreur = "Adresse email similaire existe déja";
             }
          } else {
             $erreur = "Votre adresse email n'est pas dans un format valide";
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
      <title>Rejoignez-nous | Coolink</title>
      <link rel="icon" href="content/Homepage-Images/favicon.png" sizes="32x32" type="image/png">
      <link rel="stylesheet" href="content/css/bootstrap.min.css">
      <link rel="stylesheet" href="content/css/8938584-Modern-Coolink.css" />
      <link rel="preconnect" href="https://fonts.gstatic.com">
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
      <div class="container register" id="register">
         <h1>Inscription</h1>
         <form method="POST" action="">
            <?php
               if(isset($erreur)) {
                  echo '<div class="erreur">'.$erreur.'</div>';
               }
            ?>
            <div class="form-group">
               <input type="email" name="mail" class="form-control input-form mb-3" placeholder="Email">
               <input type="password" name="password" class="form-control input-form mb-4" placeholder="Mot de passe">
               <input type="submit" name="register_form" class="btn btn-submit" value="M'inscrire">
               <p>Vous avez déja un compte ? <u><a href="login" class="media-link">Connectez-vous</a></u></p>
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