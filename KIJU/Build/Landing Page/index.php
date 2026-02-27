<?php
include_once 'landing-config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiju</title>
    <meta name="theme-color" content="#c900ff" />
    <meta name="description" content="Create an account or log in to Kiju - A simple way to share share photos, videos with friends & family." />
    <meta name="keywords" content="kiju, social, kiju.me, Kiju, share, friends, communities, community, post, posts, kiju+" />
    <meta name="robots" content="index, follow" />

    <meta property="og:title" content="Kiju" />
    <meta property="og:description" content="Create an account or log in to Kiju - A simple way to share share photos, videos with friends & family." />
    <meta property="og:url" content="https://kiju.me/" />
    <meta property="og:type" content="website" />

    <meta name="twitter:card" content="Kiju" />
    <meta name="twitter:site" content="@KijuApp" />
    <meta name="twitter:title" content="Kiju" />
    <meta name="twitter:description" content="Connect with your friends and share about your passions." />
    <link rel="stylesheet" href="assets/css/app.css?v=<?= random_int(1000000000, 9999999999) ?>">
    <link rel="icon" href="https://assets.kiju.me/img/1123/Social_Bg.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://assets.kiju.me/img/1123/Social_Bg.jpg">

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NM6SZCFG');
    </script>
</head>

<body>
    <header>
        <nav>
            <?php if ($featureFlags['kiju_temp_launch_nav_countdown']) : ?>
                <div class="kiju_temp_launch_nav_countdown">
                    Lancement dans
                    <div class="countdown">
                        <div class="d">
                            <span>0</span> J
                        </div>
                        <div class="h">
                            <span>0</span> H
                        </div>
                        <div class="m">
                            <span>0</span> M
                        </div>
                        <div class="s">
                            <span>0</span> S
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="logo">
                <img src="assets/img/Purple.png" alt="Kiju">
            </div>
            <ul class="links">
                <li class="btn">Prochainement</li>
            </ul>
        </nav>
        <div class="filter"></div>
        <video autoplay="" loop="" muted="" playsinline="">
            <source src="assets/videos/about.mp4" type="video/mp4">
        </video>
        <h1>Découvrez vos futurs amis.</h1>
        <h4>Avec Kiju partagez vos passions et écrivez votre histoire.</h4>
    </header>
    <?php if ($featureFlags['kiju_temp_launch_section_countdown']) : ?>
        <section class="kiju_temp_launch_section_countdown" id="kiju_temp_launch_section_countdown">
            <div class="ready-for">
                <div class="gif">
                    <img src="assets/img/XVo6.gif" alt="Hourglass">
                </div>
                <div class="text">
                    <h3>Prêt pour</h3>
                    <h2>Kiju 2.0 ?</h2>
                    <div class="countdown">
                        <div class="d">
                            <span>0</span> J
                        </div>
                        <div class="h">
                            <span>0</span> H
                        </div>
                        <div class="m">
                            <span>0</span> M
                        </div>
                        <div class="s">
                            <span>0</span> S
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="groups">
        <div class="group">
            <h2>Créez</h2>
            <div class="content communities">
                <div class="text">
                    <h3>Créez votre communauté</h3>
                    <p>Utilisez les outils de gestion de Kiju pour créer et administrer votre communauté selon vos préférences.</p>
                </div>
            </div>
        </div>
        <div class="group">
            <h2>Partagez</h2>
            <div class="content posts">
                <div class="text">
                    <h3>Partagez vos souvenirs</h3>
                    <p>Partagez vos désirs et choisissez l'emplacement où vous préférez que vos publications soient affichées.</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="col">
            <ul>
                <li class="logo">
                    <img src="https://assets.kiju.me/img/new/Base-White.png" alt="Kiju">
                </li>
                <li class="slogan">Ecrivez votre histoire.</li>
                <li>&copy; 2023 Kiju</li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <span>Kiju</span>
                <a href="https://trello.com/b/ZV3fgcFo/kiju-trello" target="_blank">
                    <li>
                        Trello
                    </li>
                </a>
            </ul>
        </div>
        <div class="col">
            <ul>
                <span>Qui suis-je ?</span>
                <a href="https://kilianpeyron.kiju.me/" target="_blank">
                    <li>
                        Portfolio
                    </li>
                </a>
            </ul>
        </div>
        <div class="col">
            <ul>
                <span>Légal</span>
                <a href="" target="_blank">
                    <li>
                        Conditions générales d'utilisation
                    </li>
                </a>
                <a href="" target="_blank">
                    <li>
                        Politique de protection des données
                    </li>
                </a>
                <a href="" target="_blank">
                    <li>
                        Cookies
                    </li>
                </a>
            </ul>
        </div>
    </footer>

    <script>
        const _0x55c4d4 = _0x13ae;

        function createCountdown($, x) {
            function e() {
                let e = _0x13ae,
                    t = new Date()[e(112)](),
                    r = x - t;
                $[e(106)](".d span")[e(104)] = n(Math[e(109)](r / 864e5)), $.querySelector(e(113))[e(104)] = n(Math[e(109)](r % 864e5 / 36e5)), $.querySelector(e(115)).innerText = n(Math[e(109)](r % 36e5 / 6e4)), $[e(106)](e(103))[e(104)] = n(Math[e(109)](r % 6e4 / 1e3))
            }

            function n($) {
                return $ < 10 ? "0" + $ : $
            }
            setInterval(e, 1e3), e()
        }

        function _0x13ae($, x) {
            let e = _0x4f8d();
            return (_0x13ae = function($, x) {
                return e[$ -= 102]
            })($, x)
        }

        function _0x4f8d() {
            let $ = ["querySelectorAll", "floor", "2798210qZSgPV", ".countdown", "getTime", ".h span", "2827038bZiwrS", ".m span", "11464xrgAma", "7281JwrZhX", "1013164GYCDwE", "26599gvmOKi", "891921ZHlyUu", ".s span", "innerText", "3063235LPYnAI", "querySelector", "6KwKAVg"];
            return (_0x4f8d = function() {
                return $
            })()
        }! function($, x) {
            let e = _0x13ae,
                n = $();
            for (;;) try {
                let t = -parseInt(e(119)) / 1 * (-parseInt(e(107)) / 2) + -parseInt(e(102)) / 3 + -parseInt(e(118)) / 4 + parseInt(e(110)) / 5 + -parseInt(e(114)) / 6 + -parseInt(e(105)) / 7 + parseInt(e(116)) / 8 * (parseInt(e(117)) / 9);
                if (339360 === t) break;
                n.push(n.shift())
            } catch (r) {
                n.push(n.shift())
            }
        }(_0x4f8d, 339360);
        const countdownElements = document[_0x55c4d4(108)](_0x55c4d4(111));
        countdownElements.forEach($ => {
            let x = _0x55c4d4,
                e = new Date("December 31, 2023 23:59:59")[x(112)]();
            createCountdown($, e)
        });
    </script>
</body>

</html>