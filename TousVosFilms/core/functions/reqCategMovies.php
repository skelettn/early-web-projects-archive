<?php
function reqCategMovies($category) {
    global $db;
    $reqMovie = $db->prepare("SELECT * FROM video WHERE type = 'movie' AND category = '{$category}' ORDER BY date DESC LIMIT 7");
    $reqMovie->execute();
    $categMovies = $reqMovie->fetchAll();
    foreach ($categMovies as $cM) {
    ?>
    <a href="video/<?= $cM['name'] ?>" style="margin-bottom: 15px">
        <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/<?= $cM['cover'] ?>" alt="<?= $cM['title'] ?>" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span><?= $cM['stars'] ?></span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title"><?= $cM['title'] ?></h3>
              <div class="card-info">
                <span class="genre"><?= $cM['genre'] ?></span>
                <span class="year"><?= $cM['date'] ?></span>
              </div>
            </div>
        </div>
    </a>
    <?php
    }
}
?>