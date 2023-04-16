<?php
session_start();
include "kozos.php";
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
} else if ($_SESSION["user"]["perm"] == 0) {
    header('Location: foglalas.php');
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
        #navutan {
            margin-bottom: 160px;
        }

        .bubbles {
            min-height: 370px;
            padding-bottom: 0;
            overflow: auto;
            width: 60%;
            margin-left: 20%;
        }

        .adatok {
            overflow: auto;
        }

        .bubbles img {
            float: left;
            margin-right: 20px;;
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
                <?php if (!isset($_SESSION["user"]) || isset($_SESSION["user"]) && $_SESSION["user"]["perm"] !== 1) { ?>
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
                        <a id="active" class="nav-link" href="foglalasok.php">
                            Foglalások</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li style="margin-left: auto; display: flex">
                        <a class="nav-link" href="profile.php">Profilom</a>
                    </li>
                    <li style="margin-left: 0; display: flex">
                        <a class="nav-link" href="logout.php">Kijelentkezés</a>
                    </li>
                <?php } else { ?>
                    <li style="margin-left: auto; display: flex">
                        <a class="nav-link" href="login.php">Bejelentkezés</a>
                    </li>
                    <li style="margin-left: 0; display: flex">
                        <a class="nav-link" href="signup.php">Regisztráció</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
<main>
    <?php
    $length = count($foglalasok) + 1;
    foreach (array_reverse($foglalasok) as $key => $foglalas) {
        $profilkep = "img/default.png";
        $utvonal = "img/" . $foglalas["felh"];
        $kiterjesztesek = ["png", "jpg", "jpeg"];
        foreach ($kiterjesztesek as $kiterjesztes) {
            if (file_exists($utvonal . "." . $kiterjesztes)) {
                $profilkep = $utvonal . "." . $kiterjesztes;
            }
        }
        $length -= 1;

        $div_id = ($key === 0) ? "navutan" : "navutan_$key";
        echo "<div id='$div_id' class='bubbles'>";
        echo "<h3>#" . $length . " foglalás</h3><hr>";
        echo "<img src=" . $profilkep . " alt='Profilkép' height='200'/>";
        echo "<div class='adatok'>";
        echo "<p>Vendég neve: ";
        if ($foglalas["sex"] == "m") {
            echo "Mr. ";
        } else {
            echo "Ms. ";
        }
        echo $foglalas["teljesnev"] . "</p>";
        echo "<p>Szállás: " . $foglalas["szallas"] . "</p>";
        echo "<p>Születési dátuma: " . $foglalas["szuletes"] . "</p>";
        echo "<p>E-mail címe: " . $foglalas["email"] . "</p>";
        echo "<p>Szobák: ";
        if ($foglalas["szobak"] !== "bérlés") {
            echo $foglalas["szobak"] . " szoba" . "</p>";
        } else {
            echo "Bérli a szállást" . "</p>";
        }
        echo "<p>Éjszaka: ";
        if ($foglalas["ejszakak"] !== "bérlés") {
            echo $foglalas["ejszakak"] . " éjszaka" . "</p>";
        } else {
            echo "Bérli a szállást" . "</p>";
        }
        echo "<p>Étkezések: ";
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
        echo "</p>";
        echo "<p>Megjegyzés: " . (!empty($foglalas["introd"]) ? $foglalas["introd"] : "-") . "</p>";
        echo "</div>";
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
