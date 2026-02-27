<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description">
  <meta content="Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="og:description"/>
  <meta content="Tous 🍿 Vos Films" name="title">
  <meta content="Tous 🍿 Vos Films" name="og:title"/>
  <meta content="#ff2b2b" name="theme-color"/>
  <meta content="streaming" name="og:type"/>
  <meta content="tous vos films, tvf, streaming, site de streaming, gratuit, film, serie, site, disney, marvel" name="keywords"/>
  <meta content="shonned" name="author">
  <meta content="https://i.ibb.co/BKgnpPD/icon.png" name="image">
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
  <title>Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!</title>
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>

<body class="comingSoon">
    <style type="text/css">
        @media screen and (max-height:  700px) {
            .comingSoon .soonHeader .text {
                margin-top: 120px;
            }
        }
        footer {
            position: absolute;
            bottom: 0px;
            left: 15px;
            display: flex;
            align-items: center;
            font-weight: 600;
        }
        footer span {
            padding-top: 7px;
        }
        footer img {
            width: 30px;
        }
        footer a {
            margin-left: 5px;
        }
    </style>
    <div id="particles-js"></div>
    <div class="container">
        <div class="soonHeader">
            <div class="text">
                <h1 class="ready-for">Prêt pour</h1>
                <h1 class="title">Tous Vos Films ?</h1>
            </div>
            <div class="counter">
                <h2 id="day">0</h2>
                <p>:</p>
                <h2 id="hour">0</h2>
                <p>:</p>
                <h2 id="minute">0</h2>
                <p>:</p>
                <h2 id="second">0</h2>
            </div>
        </div>
    <footer>
        <span>Powered by</span>
        <a href="https://www.instagram.com/comettverse/" target="_blank">
            <img src="assets/images/about_footer.png" alt="comett">
        </a>
        <sup>Network</sup>
    </footer>
    </div>
    <script src="./assets/js/moment.js"></script>
    <script>
        let dayField=document.getElementById("day"),hourField=document.getElementById("hour"),minuteField=document.getElementById("minute"),secondField=document.getElementById("second"),interval;const eventDay=moment("2022-09-10"),second=1e3,minute=60*second,hour=60*minute,day=24*hour,countDownFn=()=>{var e,n,t=moment(),o=eventDay.diff(t);o<=-t?(console.log("Unfortunately we have past the event day"),clearInterval(interval)):o<=0?(console.log("Today is the event day"),clearInterval(interval)):(e=Math.floor(o/day),n=Math.floor(o%day/hour),t=Math.floor(o%hour/minute),o=Math.floor(o%minute/second),dayField.innerHTML=e,hourField.innerHTML=n,minuteField.innerHTML=t,secondField.innerHTML=o)};interval=setInterval(countDownFn,second);
    </script>
    <script src="./assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>