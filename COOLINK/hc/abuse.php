<?php
require('id/profilbd.php');


if(isset($_SESSION['id']) && isset($_POST['report'])) {
    $requser = $bdd->prepare("SELECT * FROM report_firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
        if(isset($_POST['linkreport']) AND !empty($_POST['linkreport']) && isset($_POST['report_type']) AND !empty($_POST['report_type']) && isset($_POST['agree-term']) AND !empty($_POST['agree-term'])) {
            $linkreport = htmlspecialchars($_POST['linkreport']);
            $report_type = htmlspecialchars($_POST['report_type']);
            $insertlinkreport = $bdd->prepare("INSERT INTO `report_firelink`(`report_type`,`linkreport`) VALUES(?, ?)");
            $insertlinkreport->execute(array($linkreport, $report_type));
            header("location: ../"); 
        } else {
            $erreur = "Une erreur est survenue. Code d'érreur 001";
        }
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../content/img/favicon.png">
    <title>Bienvenue sur Firelink</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="report_files/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="report_files/css/style.css">
</head>
<body>

    <div class="main">

        <h1>Aide</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form" action="">
                    <h2 class="form-title">Signaler une page</h2>
                    <div class="form-radio">
                    <label>Type de liens</label><br>
                        <input type="radio" name="report_type" value="adult" id="adult" require/>
                        <label for="adult">Adulte</label>

                        <input type="radio" name="report_type" value="scam" id="scam" require/>
                        <label for="scam">Arnaque</label>
                        <br><br>

                        <input type="radio" name="report_type" value="terrorism" id="terrorism" require/>
                        <label for="terrorism">Terrorisme</label>

                        <input type="radio" name="report_type" value="other" id="other" require />
                        <label for="other">Autres</label>
                    </div>

                    <div class="form-textbox">
                        <label for="linkreport">URL</label>
                        <input type="text"  name="linkreport" placeholder="ex: coolink.co/Shonned"/>
                    </div>


                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>J'accepte de ne pas utiliser le système de signalement pour aucune raison valable sous peine de sanction</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="report" id="report" class="submit" value="Signaler" />
                    </div>

                    <?php
                    if(isset($erreur)){
                        ?>
                  <font color="black">
                    <?php
                      echo $erreur;
                    }	
                    ?>
                  </font>
                </form>

                <p class="loginhere">
                  <a href="../help" class="loginhere-link">Un problème ?</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="report_files/vendor/jquery/jquery.min.js"></script>
    <script src="report_files/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

 <!-- 
 /$$                       /$$   /$$           /$$ /$$          
| $$                      | $$  | $$          | $$| $$          
| $$$$$$$  /$$   /$$      | $$  | $$  /$$$$$$ | $$| $$  /$$$$$$ 
| $$__  $$| $$  | $$      | $$$$$$$$ /$$__  $$| $$| $$ |____  $$
| $$  \ $$| $$  | $$      | $$__  $$| $$$$$$$$| $$| $$  /$$$$$$$
| $$  | $$| $$  | $$      | $$  | $$| $$_____/| $$| $$ /$$__  $$
| $$$$$$$/|  $$$$$$$      | $$  | $$|  $$$$$$$| $$| $$|  $$$$$$$
|_______/  \____  $$      |__/  |__/ \_______/|__/|__/ \_______/
           /$$  | $$                                            
          |  $$$$$$/                                            
           \______/                                                                -->