<?php
if(isset($_POST['addActor'])) {
    $name = $_POST['actorName'];
    $title = $_POST['actorTitle'];
    $pp = $_POST['actorPP'];
    insertActor($name,$title,$pp);
}
?>
<div id="addActorModal" class="modal">
    <div>
    <h1>Création</h1>
        <form method="post" action="">
            <div class="inputs">
                <input type="text" placeholder="name" name="actorName">
                <input type="text" placeholder="title" name="actorTitle">
                <input type="text" placeholder="profil pic" name="actorPP">
            </div>
            <div class="submit">
                <a href="">Annuler</a>
                <input type="submit" value="Suivant" name="addActor">
            </div>
        </form>
    </div>
</div>