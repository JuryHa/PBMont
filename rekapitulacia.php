<!DOCTYPE html>
<html lang="sk-SK">
    <head>
        <title>Rekapitulácia | PBMont</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f37528">
        <meta name="msapplication-TileColor" content="#f37528">
        <meta name="theme-color" content="#000000">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <link rel="stylesheet" href="/style.css" />
    </head>
    <?php
    require "variables.php";

    $gates = [];
    $gates_params = array_filter($_GET, fn($key) => str_starts_with($key, "gate_"), ARRAY_FILTER_USE_KEY);

    if (validateGatesParams($gates_params)) {
        $gates = array_chunk($gates_params, 4);
    }
    ?>
    <body>
        <div id="backdrop" title="close"></div>
        <header>
            <div class="container">
                <nav>
                    <a class="logo" href="/"><img src="/images/logo.svg" alt=""></a>
                    <ul>
                        <li><a href="/">Domov</a></li>
                        <li><a href="/typy-bran">Typy brán</a></li>
                        <li><a href="/produkty">Produkty</a></li>
                        <li><a class="active" href="/kalkulacka">Kalkulačka</a></li>
                        <li><a href="/kontakt">Kontakt</a></li>
                    </ul>
                    <span>MENU</span>
                </nav>
            </div>
        </header>
        <main id="calculator">
            <section id="breadcrumbs" class="colorful">
                <div class="container grid__columns">
                    <h1>Predbežná kalkulácia</h1>
                    <span>Domov <img src="/images/icon_arrow_right_orange.svg" alt=""><b>Kalkulácia</b></span>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="recap">
                        <span>Rekapitulácia</span>
                        <h2>Orientačná cenová ponuka</h2>
                        <div class="wrapper">
                            <h3>Typ oplotenia:</h3>
                            <span>
                                <?php if (isset($_GET["product"]) && $_GET["product"] == "1"): ?>
                                    Lamelová výplň
                                <?php elseif (isset($_GET["product"]) && $_GET["product"] == "2"): ?>
                                    Joklová výplň
                                <?php elseif (isset($_GET["product"]) && $_GET["product"] == "3"): ?>
                                    Výplň tahokov
                                <?php elseif (isset($_GET["product"]) && $_GET["product"] == "4"): ?>
                                    Výplň z tvrdeného skla
                                <?php endif; ?>
                            </span>
                        </div>
                        <?php foreach ($gates as $gate): ?>
                            <div class="wrapper">
                            <h3>Brána:</h3>
                            <div class="grid">
                                <b>Počet kusov:</b>
                                <span><?= $gate[0] ?>ks</span>
                                <b>Výška:</b>
                                <span><?= $gate[1] ?>cm</span>
                                <b>Šírka</b>
                                <span><?= $gate[2] ?>cm</span>
                                <b>Typ brány:</b>
                                <span>
                                    <?php if ($gate[3] == "1"): ?>
                                        Samonosná
                                    <?php elseif ($gate[3] == "2"): ?>
                                        Koľajová
                                    <?php elseif ($gate[3] == "3"): ?>
                                        Krídlová
                                    <?php elseif ($gate[3] == "4"): ?>
                                        Krídlová na hliníkových stĺpoch
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="wrapper">
                            <div class="grid">
                                <h3>Cena spolu:</h3>
                                <h3>€</h3>
                            </div>
                        </div>
                        <form class="wrapper" method="post" action="/calculation-mail.php">
                            <h3>Kontaktujte ma s presnou cenovou ponukou</h3>
                            <div class="row mobile__column">
                                <div class="wrapper">
                                    <label for="name">Vaše meno</label>
                                    <input type="text" name="name" id="name" required />
                                </div>
                            </div>
                            <div class="row mobile__column">
                                <div class="wrapper">
                                    <label for="email">Váš email</label>
                                    <input type="email" name="email" id="email" required />
                                </div>
                                <div class="wrapper">
                                    <label for="place">Miesto montáže</label>
                                    <input type="text" name="place" id="place" required />
                                </div>
                            </div>
                            <button type="submit" class="button__classic">Požiadať o potvrdenie cenovej ponuky</button>
                            <div class="submit__message"></div>
                        </form>
                    </div>
            </section>
        </main>
        <footer>
            <div class="container">
                <div class="top">
                    <div class="contact">
                        <h2>Kontaktné údaje</h2>
                        <div class="wrapper">
                            <div class="card">
                                <div class="inner">
                                    <img src="/images/icon_phone_black.svg" alt="">
                                    <div style="display: grid;">
                                        <span>+421 918 829 958</span>
                                        <span>+421 950 498 937</span>
                                    </div>
                                </div>
                                <a class="button__classic" href="tel:+421918829958">Zavolajte nám</a>
                            </div>
                            <div class="card">
                                <div class="inner">
                                    <img src="/images/icon_mail_black.svg" alt="">
                                    <span>office@pb-mont.sk</span>
                                </div>
                                <a class="button__classic" href="mailto:office@pb-mont.sk">Napíšte nám</a>
                            </div>
                        </div>
                    </div>
                    <div class="company">
                        <h2>PB Mont, s.r.o.</h2>
                        <div class="wrapper">
                            <div class="inner">
                                <span>Ružová ulica 152</span>
                                <span>935 21 Tlmače</span>
                                <span>SLOVENSKO</span>
                            </div>
                            <div class="inner">
                                <span>IČO: 53213432</span>
                                <span>DIČ: 2121303580</span>
                                <span>IČ DPH: SK2121303580</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="container">
                        <img src="/images/logo.svg" alt="">
                        <div class="socials">
                            <a href="https://www.instagram.com/pbmont_ploty_brany/">
                                <img src="/images/icon_instagram_white.svg" alt="">
                            </a>
                            <a href="https://www.facebook.com/Ploty.Brany.Zabradlia.Kovovyroba/">
                                <img src="/images/icon_facebook_white.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/script.js"></script>
    </body>
</html>