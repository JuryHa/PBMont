<!DOCTYPE html>
<html lang="sk-SK">
    <head>
        <title>Kontakt | PBMont</title>
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
                        <li><a href="/kalkulacka">Kalkulačka</a></li>
                        <li><a class="active" href="/kontakt">Kontakt</a></li>
                    </ul>
                    <span>MENU</span>
                </nav>
            </div>
        </header>
        <main>
            <section id="breadcrumbs" class="colorful">
                <div class="container grid__columns">
                    <h1>Kontakt</h1>
                    <span>Domov <img src="/images/icon_arrow_right_orange.svg" alt="" /><b>Kontakt</b></span>
                </div>
            </section>
            <section>
                <div class="container container__contact">
                    <div class="image__contact"><div class="container__image"></div></div>
                    <form class="form__contact" method="POST" action="/contact-mail.php">
                        <div class="row">
                            <h2>Kontaktujte nás</h2>
                        </div>
                        <div class="row mobile__column">
                            <div class="wrapper">
                                <label for="name">Vaše meno</label>
                                <input type="text" name="name" id="name" required />
                            </div>
                            <div class="wrapper">
                                <label for="email">Váš email</label>
                                <input type="email" name="email" id="email" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="wrapper">
                                <label for="message">Vaša správa</label>
                                <textarea name="message" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <input type="checkbox" name="policy" id="policy" required />
                            <label for="policy">Súhlasím so <a href="#">spracovaním osobných údajov</a></label>
                        </div>
                        <button class="button__classic" type="submit">Odoslať</button>
                        <div class="submit__message"></div>
                    </form>
                </div>
            </section>
        </main>
        <footer>
            <div class="container container__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10616.851931711046!2d18.514092157832764!3d48.29875506450886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476ad88d8b5cb1e3%3A0x540f5a55632571c9!2zUnXFvm92w6EsIDkzNSAyMSBUbG1hxI1lLUxpcG7DrWs!5e0!3m2!1ssk!2ssk!4v1657116427989!5m2!1ssk!2ssk" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
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
