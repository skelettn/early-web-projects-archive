<?php
require('id/profilbd.php');
require('../plugins/FireCaptcha.php');


?>
<!-- /*COPYRIGHT Hypera.*/ -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Un seul lien pour tout votre contenu | COOLINK</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../content/img/favicon.png">
  <link rel="stylesheet" href="css/lg.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<div class="login-form">
  <form method="post" action="../plugins/FireCaptcha/process.php">
    <div align="center">
      <div style="text-align: center"><a href=""><img src="../content/img/newCoolink/small/coolink_small.png"></a></div>
      <?php echo $first_num . " " . $operator . " " . $second_num . " = " ?>
      <input class="gUMdPB gcIDSt" type="number" name="answer">
      <input type="submit" class="continue-button" value="Continuer">
      <p></p>
      <a href="../help/" class="sign-up">Un problème ?</a>
      <p></p>
      <small class="footer-login">Propulsé par Hypera</small>
    </div>
  </form>
  </body>

</html>

<!-- /*COPYRIGHT Hypera.*/ -->