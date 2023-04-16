<?php
session_start();
include "phpbeadando.php";
$fiokok = loadUsers("users.txt");

$uzenet = "";

if (isset($_POST["login"])) {
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "") {
        $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
        $felhasznalonev = $_POST["felhasznalonev"];
        $jelszo = $_POST["jelszo"];

        $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

        foreach ($fiokok as $fiok) {
            if ($fiok["felhasznalonev"] === $felhasznalonev && password_verify($jelszo, $fiok["jelszo"])) {
                $uzenet = "Sikeres belépés!";
                $_SESSION["user"] = $fiok;              // a "user" nevű munkamenet-változó a bejelentkezett felhasználót reprezentáló tömböt fogja tárolni
                header("Location: index.php");          // átirányítás
            }
        }
    }
}
?>

<!doctype html>
<html lang="hu">

<head>
    <title>Utazási iroda - Bejelentkezés</title>
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
                        <a class="nav-link" href="foglalas.php">
                            Foglalás</a>
                    </li>
                <?php } ?>
                <div style="margin-left: auto; display: flex">
                <?php if (isset($_SESSION["user"])) { ?>
                    <li><a class="nav-link" href="profile.php">Profilom</a></li>
                    <li><a class="nav-link" href="logout.php">Kijelentkezés</a></li>
                <?php } else { ?>
                    <li><a id="active" class="nav-link" href="login.php">Bejelentkezés</a></li>
                    <li><a class="nav-link" href="signup.php">Regisztráció</a></li>
                <?php } ?>
                </div>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div id="navutan" class="bubbles">
        <h3>Kérlek jelentkezz be!</h3>
        <hr/>
        
        <form action="login.php" method="POST">
            <label>Felhasználónév: <input type="text" name="felhasznalonev"/></label> <br/>
            <label>Jelszó: <input type="password" name="jelszo"/></label> <br/>
            <input class="fgomb" type="submit" name="login"/> <br/><br/>
        </form>
        <?php echo $uzenet . "<br/>"; ?>
    </div>
</main>
<footer>
    <div>
        <p>
            <small>Copyright © 2023 Sóki Krisztián és Ogunde Edwin. Minden jog fenntartva. | Design: Webterv Gy.</small>
        </p>
    </div>
</footer>
</body>
</html>