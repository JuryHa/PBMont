<!DOCTYPE html>
<html lang="sk-SK">
    <head>
        <title>Kalkulačka | PBMont</title>
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
    <body>
        <div id="backdrop" title="close"></div>
        <header>
            <div class="container">
                <nav>
                    <a class="logo" href="/"><img src="/images/logo.svg" alt="" /></a>
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
                    <h1>Kalkulačka</h1>
                    <span>Domov <img src="/images/icon_arrow_right_orange.svg" alt="" /><b>Kalkulačka</b></span>
                </div>
            </section>
            <section>
                <form class="container" action="/rekapitulacia">
                    <div class="calculator__step step_1">
                        <span>Krok 1</span>
                        <h2>Typ oplotenia</h2>
                        <p>Vyberte si typ a farbu oplotenia z našej ponuky:</p>
                        <div class="calculator__products">
                            <div class="calculator__product">
                                <input type="radio" name="product" id="product_1" value="1" required <?= isset($_GET["product"]) && $_GET["product"] == "1" ? "checked" : "" ?>/>
                                <label for="product_1">
                                    <div class="container__image"></div>
                                    <span>Lamelová výplň</span>
                                </label>
                            </div>
                            <div class="calculator__product">
                                <input type="radio" name="product" id="product_2" value="2" <?= isset($_GET["product"]) && $_GET["product"] == "2" ? "checked" : "" ?>/>
                                <label for="product_2">
                                    <div class="container__image"></div>
                                    <span>Joklová výplň</span>
                                </label>
                            </div>
                            <div class="calculator__product">
                                <input type="radio" name="product" id="product_3" value="3" <?= isset($_GET["product"]) && $_GET["product"] == "3" ? "checked" : "" ?>/>
                                <label for="product_3">
                                    <div class="container__image"></div>
                                    <span>Výplň tahokov</span>
                                </label>
                            </div>
                            <div class="calculator__product">
                                <input type="radio" name="product" id="product_4" value="4" <?= isset($_GET["product"]) && $_GET["product"] == "4" ? "checked" : "" ?>/>
                                <label for="product_4">
                                    <div class="container__image"></div>
                                    <span>Výplň z tvrdeného skla</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="calculator__step step_2">
                        <span>Krok 2</span>
                        <h2>Brány</h2>
                        <p>Vyberte si preferovaný typ brány a zvoľte jej rozmery:</p>
                        <div class="step__container"></div>
                        <div class="calculator__accordion addButton">
                            <div class="tile">
                                <h3>Pridať bránu</h3>
                            </div>
                        </div>
                    </div>
                    <div class="calculator__step step_3">
                        <span>Krok 3</span>
                        <h2>Bráničky</h2>
                        <p>Vyberte si preferovaný typ bráničky a zvoľte jej rozmery:</p>
                        <div class="step__container"></div>
                        <div class="calculator__accordion addButton">
                            <div class="tile">
                                <h3>Pridať bráničku</h3>
                            </div>
                        </div>
                    </div>
                    <div class="calculator__step step_4">
                        <span>Krok 3</span>
                        <h2>Plotové dielce</h2>
                        <p>Vyberte si preferovaný typ a počet plotových dielcov</p>
                        <div class="step__container"></div>
                        <div class="calculator__accordion addButton">
                            <div class="tile">
                                <h3>Pridať plotové dielce</h3>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button__classic">Vypočítať cenu</button>
                </form>
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
                                    <img src="/images/icon_phone_black.svg" alt="" />
                                    <div style="display: grid">
                                        <span>+421 918 829 958</span>
                                        <span>+421 950 498 937</span>
                                    </div>
                                </div>
                                <a class="button__classic" href="tel:+421918829958">Zavolajte nám</a>
                            </div>
                            <div class="card">
                                <div class="inner">
                                    <img src="/images/icon_mail_black.svg" alt="" />
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
                        <img src="/images/logo.svg" alt="" />
                        <div class="socials">
                            <a href="https://www.instagram.com/pbmont_ploty_brany/">
                                <img src="/images/icon_instagram_white.svg" alt="" />
                            </a>
                            <a href="https://www.facebook.com/Ploty.Brany.Zabradlia.Kovovyroba/">
                                <img src="/images/icon_facebook_white.svg" alt="" />
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