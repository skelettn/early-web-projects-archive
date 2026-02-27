<?php

namespace KIJU\Controllers;

use KIJU\App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class EmailController
{
    private $email;
    private $code;

    /**
     * Constructeur
     *
     * @param $e Email de l'utilisateur
     */
    public function __construct($e)
    {
        $this->email = $e;
    }

    /**
     * Vérifie si l'e-mail est valide
     *
     * @return bool
     */
    public function isEmailValid(): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Génère un code alléatoire
     *
     * @return int
     */
    public function generateCode(): int
    {
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= rand(0, 9);
        }
        return $code;
    }

    /**
     * Vérifie si le code rentré correspond à celui de la db
     *
     * @return bool
     */
    public function verifyCode(): bool
    {
        $getCode = App::getDatabase()->executeQuery('SELECT Code FROM email_authentication WHERE UserID = (SELECT UserID FROM user WHERE Email = ?)', [$this->email]);
        $db_code = $getCode->fetchColumn();

        return $this->code == $db_code;
    }

    /**
     * Envoie le code de vérification par e-mail
     *
     * @return void
     */
    public function sendCode(): void
    {
        $mail = new PHPMailer(true);
        $this->setCode();
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'auth.kiju@gmail.com';                     //SMTP username
            $mail->Password   = 'eoghdwozlmucivtp';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('auth.kiju@gmail.com', 'Kiju Authentication');
            $mail->addAddress($this->email, 'Kiju Authentication');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Votre code de connexion [' . $this->code . ']';
            $mail->Body    = 'Votre code de connexion est : <b>' . $this->code . '</b>';

            $mail->send();
            $_SESSION['temp_logged'] = 1;

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /**
     * Définie le code de connexion
     *
     * @return void
     */
    public function setCode(): void
    {
        $this->code = $this->generateCode();
    }

    /**
     * Définie le second code de connexion
     *
     * @param $code Code de vérification
     * @return void
     */
    public function setCodeBis($code): void
    {
        $this->code = $code;
    }

    /**
     * Récupère le code de connexion
     *
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }
}
