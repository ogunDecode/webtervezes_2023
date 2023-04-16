<?php
session_start();
?>

<!doctype html>
<html lang="hu">

<head>
    <title>Utazási iroda - Kapcsolat</title>
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
                    <a class="nav-link" href="index.php">
                        Főoldal</a>
                </li>
                <li>
                    <a class="nav-link" href="szallasok.php">
                        Szállások</a>
                </li>
                <?php if (!isset($_SESSION["user"]) || isset($_SESSION["user"]) && $_SESSION["user"]["perm"] !== 1) { ?>
                    <li>
                        <a class="nav-link" href="videok.php">
                            Videók</a>
                    </li>
                <?php } ?>
                <li>
                    <a id="active" class="nav-link" href="kapcsolat.php">
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
                    <li><a class="nav-link" href="profile.php">Profilom</a></li>
                    <li><a class="nav-link" href="logout.php">Kijelentkezés</a></li>
                <?php } else { ?>
                    <li><a class="nav-link" href="login.php">Bejelentkezés</a></li>
                    <li><a class="nav-link" href="signup.php">Regisztráció</a></li>
                <?php } ?>
                </div>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div id="navutan" class="bubbles">
        <div class="NOTcard page-card NOTshadow">
            <h3>Elérhetőségeink</h3>
            <div class="desctext">
                    <span style="font-size:20px;"><strong>Irodánk: </strong></span>
                <p>
                    <strong>Cím: </strong><a href="https://goo.gl/maps/M8xDcztKdcNz54cy6" target="_blank">6725 Szeged,
                    Tisza Lajos krt. 103.</a>
                </p>
                <p>
                    <strong>Telefon: </strong>
                    Telefon: +36 (12) 345-678<br>
                    Fax: +36 (12) 345-876<br>
                    Mobil: +36 (87) 654-3210
                </p>
                <p>
                    <strong>Email: </strong><br>
                    info@skytravel.hu
                </p>
                <p>
                    <strong>Skype: </strong><br>
                    Skype_Name
                </p>
                <p>
                    <strong>Nyitvatartás: </strong><br>
                    H-P: 8:00-17:30<br>
                    SZOMBATON: ZÁRVA<br>
                    VASÁRNAP: ZÁRVA
                </p>
                <p>
                    <iframe allowfullscreen="" loading="lazy"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11036.675400134667!2d20.1469232!3d46.246871!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4744886557ac1407%3A0x8ef6cdceb30443a2!2sUniversity%20of%20Szeged%20Irinyi%20building!5e0!3m2!1sen!2shu!4v1679237042477!5m2!1sen!2shu"
                            style="border:0; width: 100%; height: 450px;"></iframe>
                </p>

            </div>
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
