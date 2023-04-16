<?php
session_start();
include "kozos.php";
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$foglalasok = loadFoglalasok("foglalasok.txt");
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
    <style>
        #navutan{
            margin-bottom: 160px;
        }
    </style>
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
                <li>
                    <a id="active" class="nav-link" href="foglalasok.php">
                        Foglalások</a>
                </li>
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
    <?php
    foreach (array_reverse($foglalasok) as $key => $foglalas) {
        $div_id = ($key === 0) ? "navutan" : "";
        echo "<div id='$div_id' class='bubbles'>";
        echo "Vendég neve: ";
        if ($foglalas["sex"] == "m") {
            echo "Mr. ";
        } else {
            echo "Ms. ";
        }
        echo $foglalas["teljesnev"] . "<br>";
        echo "Szállás: " . $foglalas["szallas"] . "<br>";
        echo "Születési dátuma: " . $foglalas["szuletes"] . "<br>";
        echo "E-mail címe: " . $foglalas["email"] . "<br>";
        echo "Szobák: ";
        if ($foglalas["szobak"] !== "bérlés") {
            echo $foglalas["szobak"] . " szoba" . "<br>";
        } else {
            echo "Bérli a szállást" . "<br>";
        }
        echo "Éjszaka: ";
        if ($foglalas["ejszakak"] !== "bérlés") {
            echo $foglalas["ejszakak"] . " éjszaka" . "<br>";
        } else {
            echo "Bérli a szállást" . "<br>";
        }
        echo "Étkezések: ";
        if ($foglalas["op1"] == "Y") {
            echo "reggeli ";
        }
        if ($foglalas["op2"] == "Y") {
            echo "ebéd ";
        }
        if ($foglalas["op3"] == "Y") {
            echo "vacsora";
        }
        if ($foglalas["op1"] !== "Y" && $foglalas["op2"] !== "Y" && $foglalas["op3"] !== "Y") {
            echo "X";
        }
        echo "<br>";
        echo "Megjegyzés: " . (!empty($foglalas["introd"]) ? $foglalas["introd"] : "-") . "<br>";
        echo "</div>";
    }
    ?>

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
