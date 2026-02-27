<?php
require('../../account/id/profilbd.php');
?>
<title>Erreur</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="ban.css" type="text/css">

<p>Erreur 403:</p>
<h1>Firelink</h1>
<p>VOTRE COMPTE A ÉTÉ BANNIS DE NOS SERVEUR POUR LA/LES RAISON SUIVANTE: </p>
<p id="text"><?php echo $userinfo['ban_reason']; ?></p>
<a href="../../logout">
    <p id="text"><u>>>> Déconnexion <<< </u> </p> </a> <small>Si vous pensez que cela est une érreur, contactez un
                administrateur</small>

<script src="ban.js"></script>