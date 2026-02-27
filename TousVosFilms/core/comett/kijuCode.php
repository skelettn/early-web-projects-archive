<?php
/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

//Include required PHPMailer files
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['sendCode'])) {
  $email = trim($_POST['v2EU']);
  if(!empty($_POST['v2EU'])) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $code = rand(100000, 999999);
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = true;
      $mail->Username = "YOUR_GMAIL_EMAIL";
      $mail->Password = "YOUR_GMAIL_APP_PASSWORD";
      $mail->SMTPSecure = "ssl";
      $mail->Port = "465";

      $mail->setFrom('YOUR_GMAIL_EMAIL');

      $mail->addAddress($_POST['v2EU']);

      $mail->isHTML(true);
      
      $mail->FromName = "TOUS VOS FILMS";

      $mail->Subject = "Connexion TVF [".$code."]";

      $mail->Body = '
      <!DOCTYPE html>
      <html>
        <head>
          <title></title>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <style type="text/css">
              @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap");
              /* CLIENT-SPECIFIC STYLES */
              body,
              table,
              td,
              a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
                font-family: "Montserrat", sans-serif;
              }
      
              table,
              td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
              }
      
              img {
                -ms-interpolation-mode: bicubic;
              }
      
              /* RESET STYLES */
              img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
              }
      
              table {
                border-collapse: collapse !important;
              }
      
              body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
              }
      
              /* iOS BLUE LINKS */
              a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
              }
      
              /* MOBILE STYLES */
              @media screen and (max-width:600px) {
                h1 {
                  font-size: 32px !important;
                  line-height: 32px !important;
                }
              }
      
              /* ANDROID CENTER FIX */
              div[style*="margin: 16px 0;"] {
                margin: 0 !important;
              }
      
              
              .kijuHeader {
                   background: linear-gradient(45deg, #FF0000 0%, #990000 39%, rgb(255, 73, 73) 100% );
                    background-size: 600% 600%;
                    -webkit-animation: AnimationName 10s ease infinite;
                    -moz-animation: AnimationName 10s ease infinite;
                    animation: AnimationName 10s ease infinite;
                  }
      
              .kijuCode {
                  padding: 7px 4px;
                  border-radius: 5px;
                  width: 160px;
                  height: 40px;
                  display: block;
                  font-weight: 700;
                  font-size: 25px;
                  text-align: center;
                  border: 2px solid rgba(0,0,0,.1);
                  color: black;
              }
      
                  @-webkit-keyframes AnimationName {
                    0%{background-position:0% 50%}
                    50%{background-position:100% 50%}
                    100%{background-position:0% 50%}
                }
                
                @-moz-keyframes AnimationName {
                    0%{background-position:0% 50%}
                    50%{background-position:100% 50%}
                    100%{background-position:0% 50%}
                }
                
                @keyframes AnimationName {
                    0%{background-position:0% 50%}
                    50%{background-position:100% 50%}
                    100%{background-position:0% 50%}
                }
          </style>
        </head>
        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
          </head>
          <!-- HIDDEN PREHEADER TEXT -->
          <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;  max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <!-- LOGO -->
            <tr>
              <td bgcolor="#f4f4f4" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                  <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                  <tr>
                    <td class="kijuHeader" align="center" valign="top" style="padding: 20px 5px 5px 5px; border-radius: 2px 2px 0px 0px; color: #AADB1E; font-family: " Londrina Solid"Helvetica, Arial, sans-serif; font-size: 45px; font-weight: 700; letter-spacing: 2px; line-height: 48px;">
                      <h1 style="font-size: 40px; font-weight:700; margin: w-50;"><img style="width: 150px; cursor: pointer;" src="https://i.ibb.co/T296mCB/logo-white.png" alt="TOUS VOS FILMS"></h1>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                  <tr>
                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #000000; font-family:" Montserrat bold" Helvetica, Arial, sans-serif; font-size: 16px; font-weight:600; line-height: 25px;">
                      <h1>Code de connexion</h1>
                      <p style="font-weight: 500;">Utilisez le code de vérification ci-dessous pour vous connecter.</p>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="left">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 30px 30px;">
                            <table border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center" style="border-radius: 30px;">
                                  <div class="kijuCode">
                                  ' . $code . '
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #000000; font-family:" Montserrat"Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                      <p style="margin: 0; width: 250px; color: rgba(0,0,0,.4); font-weight: 500;">
                      Vous pouvez utiliser ce code pendant 10 minutes avant son expiration.
                      Si vous avez reçu ce message par erreur, veuillez l\'ignorer.</a>
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #333333; font-family:" Montserrat"Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                      <p></p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                  <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 30px 30px 30px; color: #666666; font-family: " Lato", Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;">
                      <br>
                      <p style="margin: ;">
                        <a href="#" target="_blank" style="color: #111111; font-weight: 700;" </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </body>
      </html>
      ';

      $recupUser = $db->prepare('SELECT * FROM users WHERE email = ?');
      $recupUser->execute(array($_POST['v2EU']));
      if($recupUser->rowCount() > 0) {
        $userInfos = $recupUser->fetch();
        $_SESSION['id'] = $userInfos['id'];
        $_SESSION['mail'] = $userinfos['email'];

        $del = $db->prepare("DELETE FROM code WHERE email = ?");
        $del->execute(array($userInfos['email']));

        $reqCode = $db->prepare("INSERT INTO code (email, code, logged) VALUES (?, ?, ?)");
        $reqCode->execute(array($_POST['v2EU'], $code, '0'));

        $mail->send();

        $_SESSION = array();
        session_destroy();

        header('location: auth?email='.$_POST['v2EU']);
        exit;
      } else {
        $unique_id = md5(time() . mt_rand(1, 1000000));

        $del = $db->prepare("DELETE FROM code WHERE email = ?");
        $del->execute(array($_POST['v2EU']));

        $reqCode = $db->prepare("INSERT INTO code (email, code, logged) VALUES (?, ?, ?)");
        $reqCode->execute(array($_POST['v2EU'], $code, '0'));

        $mail->send();

        $insertUser = $db->prepare("INSERT INTO users (unique_id,email,username,tvf_coins,tvf_plus,avatar,level) VALUES (?,?,?,?,?,?,?)");
        $insertUser->execute(array($unique_id, $_POST['v2EU'],'',0,0,'',0));
        header('location: auth?email='.$_POST['v2EU']);
        exit;
      }
    }
  }
}

if(isset($_GET['email'])) {
  $reqCode = $db->prepare("SELECT * FROM code WHERE email = ?");
  $reqCode->execute(array($_GET['email']));
  $codeFetch = $reqCode->fetch();
  $codeExist = $reqCode->rowCount();
  if($codeExist >= 1) {
    $codeDB = $codeFetch['code'];
    if($codeFetch['logged'] == 1) {
      $del = $db->prepare("DELETE FROM code WHERE email = ?");
      $del->execute(array($_GET['email']));
      header('location: auth');
      exit;
    }
  }
  $reqEmail = $db->prepare("SELECT * FROM users WHERE email = ?");
  $reqEmail->execute(array($_GET['email']));
  $emailExist = $reqEmail->rowCount();
  if($emailExist < 1) {
    header('location: auth?error=email');
    exit;
  }
}

if(isset($_POST['emailCode'])) {
  if(!empty($_POST['v2Code'])) {
      // Check Code
      $reqCode = $db->prepare("SELECT * FROM code WHERE email = ?");
      $reqCode->execute(array($_GET['email']));
      $codeFetch = $reqCode->fetch();
      $codeExist = $reqCode->rowCount();
      $emailCode = trim($_POST['v2Code']);
      if($codeExist >= 1) {
        $codeDB = $codeFetch['code'];
        $codeId = $codeFetch['id'];
        if($codeDB == $emailCode) {
          $upt = $db->prepare("UPDATE code SET logged = '1' WHERE id = ?");
          $upt->execute(array($codeId));
          $recupUser = $db->prepare('SELECT * FROM users WHERE email = ?');
          $recupUser->execute(array($codeFetch['email']));
          $userInfos = $recupUser->fetch();
          setcookie('id', $userInfos['id'], time() + 60 * 60 * 24 * 30);
          setcookie('username', $userInfos['username'], time() + 60 * 60 * 24 * 30);
          setcookie('mail', $userInfos['email'], time() + 60 * 60 * 24 * 30);
          header('Location: select-profile'); 
          exit;
        } else {
          header('Location: auth?email='.$codeFetch['email'].'&error=code'); 
          exit;
        }
      } else {
        header('Location: auth?email='.$codeFetch['email'].'&error=code'); 
        exit;
      }
  }
}
?>