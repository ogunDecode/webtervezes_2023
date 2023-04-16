<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<!doctype html>
<html lang="hu">

<head>
    <title>Utazási iroda - Foglalás</title>
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
                <li>
                    <a class="nav-link" href="videok.php">
                        Videók</a>
                </li>
                <li>
                    <a class="nav-link" href="kapcsolat.php">
                        Kapcsolat</a>
                </li>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li>
                        <a id="active" class="nav-link" href="foglalas.php">
                            Foglalás</a>
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
        <h3>Kedves leendő vendégünk!</h3>

        <p>
            Arra kérjük, hogy a foglalás során adjon meg minél több információt, hogy a munkatársaink a lehető
            legjobban személyre szabott ajánlatokat tudják elküldeni Önnek és az utazótársainak!</p>
        <p>Az esetleges kívánságait (pl. erkélyes szoba, egymás melletti szobák stb.) kérjük, hogy írja meg a lent
            elhelyzett szövegdobozba!
        </p>
        <form method="GET" enctype="multipart/form-data">
            <fieldset>
                <legend>Elsödleges foglalási adatok</legend>
                <label>Szálloda neve: </label><input type="text" name="user-place" value="száloda neve" disabled> <br>
                <label>Teljes név: </label><input type="text" name="full-name" size="25" required> <br>
                <label>Születési dátum: </label><input type="date" name="date-of-birth" min="1920-01-01" required>
                <br>
                <label>E-mail: </label><input type="email" name="email" required> <br>
                <label>Jelszó: </label><input type="password" name="passwd" required> <br>
                <label>Jelszó ismét: </label><input type="password" name="passwd-check" required> <br>
            </fieldset>
            <div id="masodl">
                <label for="place">Foglalás tipusa:</label>
                <select id="place">
                    <option value="one">Egy északa</option>
                    <option value="two">Két északa</option>
                    <option value="more">Több mint két északa</option>
                    <option value="other" selected>Kibérlés</option>
                </select> <br>

                <label for="night">Szobák száma:</label>
                <select id="night">
                    <option value="one">Egy szoba</option>
                    <option value="two">Két szoba</option>
                    <option value="more">Több mint két szoba</option>
                    <option value="other" selected>Kibérlés</option>
                </select> <br>

                Kért szolgáltatás:<br>
                <label for="op-1">Reggeli:</label>
                <input type="checkbox" id="op-1" name="op-1" value="morn">
                <label for="op-2">Ebéd:</label>
                <input type="checkbox" id="op-2" name="op-2" value="noon">
                <label for="op-3">Vacsora:</label>
                <input type="checkbox" id="op-3" name="op-3" value="late"> <br>
            </div>
            <label for="introd">Egyéb fontosnak tartott információk (max. 200 karakter):</label> <br>
            <textarea id="introd" name="intro" maxlength="200"></textarea>
            <p class="radio-group">Nem:</p>
            <div class="radio-group">
                <label for="op1">Férfi:</label>
                <input type="radio" id="op1" name="sex" value="m">
                <label for="op2">Nő:</label>
                <input type="radio" id="op2" name="sex" value="f">
            </div>
            <br><br>
            <input type="submit" class="fgomb" name="submit-btn" value="Adatok elküldése">
            <input type="reset" class="fgomb" name="reset-btn" value="Adatok törlése">
        </form>
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
