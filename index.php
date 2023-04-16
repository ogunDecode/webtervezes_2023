<?php
session_start();
?>


<!doctype html>
<html lang="hu">

<head>
    <title>Utazási iroda</title>
    <meta charset="utf-8">
    <meta name="description" content="2023 Webtervezés projektmunka">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fafafa">
    <link rel="icon" href="img/icon.png">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/urlap.css">
</head>

<body>
<header>
    <div id="fejlec">
        <div class="header-area">
            <div class="container" id="row">
                <div class="col-2">
                    <a id="navbar-brand" href="index.php"><!-- Logo Image -->
                        <img alt="" id="logox" src="img/logo.png">
                    </a>
                </div>
                <div class="col-10">
                    <div class="short_contact_list">
                        <ul>
                            <li>
                                <a href="https://goo.gl/maps/M8xDcztKdcNz54cy6" target="_blank">6725
                                    Szeged, Tisza Lajos krt. 103.</a>
                            </li>
                            <li>
                                <a href="tel:+3612345678">+36-12 345 678</a>
                            </li>
                            <li>
                                <a href="mailto:email@email.hu">email@email.hu</a>
                            </li>
                            <li id="text-right">
                                <a href="https://www.facebook.com/zuck/" target="_blank">Kövessen
                                    a Facebookon</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NAVBAR-->
    <nav id="navbar">
        <div class="container">
            <ul id="navbar-ul">
                <li>
                    <a id="active" class="nav-link" href="index.php">
                        Főoldal</a>
                </li>
                <li>
                    <a class="nav-link" href="szallasok.php">
                        Szállások</a>
                </li>
                <?php if ($_SESSION["user"]["perm"] !== 1) { ?>
                    <li>
                        <a class="nav-link" href="videok.php">
                            Videók</a>
                    </li>
                <?php } ?>
                <li>
                    <a class="nav-link" href="kapcsolat.php">
                        Kapcsolat</a>
                </li>
                <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["perm"] == 0) { ?>
                    <li>
                        <a class="nav-link" href="foglalas.php">
                            Foglalás</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["perm"] == 1) { ?>
                <li>
                    <a class="nav-link" href="foglalasok.php">
                        Foglalások</a>
                </li>
                <?php } ?>
                <div style="margin-left: auto; display: flex">
                    <?php if (isset($_SESSION["user"])) { ?>
                        <li>
                            <a class="nav-link" href="profile.php">Profilom</a>
                        </li>
                        <li>
                            <a class="nav-link" href="logout.php">Kijelentkezés</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a class="nav-link" href="login.php">Bejelentkezés</a>
                        </li>
                        <li>
                            <a class="nav-link" href="signup.php">Regisztráció</a>
                        </li>
                    <?php } ?>
                </div>
            </ul>
        </div>
    </nav>
</header>

<div class="wrapwallpap">
    <div id="wallpap">
        <h1>Egzotikus nyaralások</h1>
        <a id="kepgomb" href="foglalas.php"><span>Foglaljon most!</span></a>
    </div>
</div>
<main>
    <div id="fobub" class="bubbles">
        <p>Üdvözöljük a Magyarország egyik legizgalmasabb utazási cégének weboldalán! Ha vágyik arra, hogy felfedezze a
            világot, vagy szeretne egy izgalmas kalandra indulni, akkor jó helyen jár. Cégünk számos fantasztikus
            utazási ajánlatot kínál, amelyek közül garantáltan megtalálja az Ön számára legmegfelelőbbet. Legyen szó
            akár romantikus nyaralásról a tengerparton, akár kalandos expedícióról a dzsungel mélyén, mi segítünk Önnek
            a tervezésben és a szervezésben. Fedezze fel velünk a világ csodáit, és hozza ki az utazásból a
            legtöbbet!</p>
        <p>Az utazások során biztosak lehetünk abban, hogy minden részletre odafigyelünk, hogy az Ön élménye
            felejthetetlen legyen. Cégünk magasan képzett szakemberekkel dolgozik együtt, akik az utazási iparban több
            éves tapasztalattal rendelkeznek. Számunkra az utazás nem csak egy hobbi, hanem szenvedély és életstílus is.
            Ezért minden utazásunkat olyan élménnyé varázsoljuk, amelyre még évek múltán is örömmel gondol vissza.
            Nálunk az utazás nem csak egy utazás, hanem egy életre szóló élmény, amely örökre megváltoztathatja az
            életünket.</p>
    </div>
    <div id="anglia" class="bubbles hover">
        <div id="anglia_zoom" class="back_img"></div>
        <div class="overlay">
            <a class="vgomb" href="szallasok.php#UK"><span>Szállások</span></a>
            <a class="vgomb" href="videok.php#UK"><span>Videók</span></a>
        </div>
        <div class="tartalom">
            <h2>Anglia</h2>
        </div>
    </div>
    <div id="horvat" class="bubbles hover" style="margin-top: 120px">
        <div id="horvat_zoom" class="back_img"></div>
        <div class="overlay">
            <a class="vgomb" href="szallasok.php#HORVAT"><span>Szállások</span></a>
            <a class="vgomb" href="videok.php#HORVAT"><span>Videók</span></a>
        </div>
        <div class="tartalom">
            <h2>Horváthország</h2>
        </div>
    </div>
    <div id="olasz" class="bubbles hover">
        <div id="olasz_zoom" class="back_img"></div>
        <div class="overlay">
            <a class="vgomb" href="szallasok.php#OLASZ"><span>Szállások</span></a>
            <a class="vgomb" href="videok.php#OLASZ"><span>Videók</span></a>
        </div>
        <div class="tartalom">
            <h2>Olaszország</h2>
        </div>
    </div>
    <div id="nyc" class="bubbles hover">
        <div id="nyc_zoom" class="back_img"></div>
        <div class="overlay">
            <a class="vgomb" href="szallasok.php#NY"><span>Szállások</span></a>
            <a class="vgomb" href="videok.php#NY"><span>Videók</span></a>
        </div>
        <div class="tartalom">
            <h2>New York</h2>
        </div>
    </div>
    <div id="francia" class="bubbles hover">
        <div id="francia_zoom" class="back_img"></div>
        <div class="overlay">
            <a class="vgomb" href="szallasok.php#FRANCIA"><span>Szállások</span></a>
            <a class="vgomb" href="videok.php#FRANCIA"><span>Videók</span></a>
        </div>
        <div class="tartalom">
            <h2>Franciaország</h2>
        </div>
    </div>
</main>
<footer id="long">
    <div>
        <p>
            <small>Copyright © 2023 Sóki Krisztián és Ogunde Edwin. Minden jog fenntartva. | Design: Webterv Gy.</small>
        </p>
    </div>
</footer>
</body>

</html>
