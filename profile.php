<?php
session_start();
include "phpbeadando.php";

if (!isset($_SESSION["user"])) {
    // ha a felhasználó nincs belépve (azaz a "user" munkamenet-változó értéke nem került korábban beállításra), akkor a login.php-ra navigálunk
    header("Location: login.php");
}
function nemet_konvertal($betujel) {		// egy segédfüggvény, amely visszaadja a betűjelnek megfelelő nemet
    switch ($betujel) {
        case "F" : return "férfi"; break;
        case "N" : return "nő"; break;
        case "E" : return "egyéb"; break;
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
                <?php }?>
                <div style="margin-left: auto; display: flex">
                    <?php if (isset($_SESSION["user"])) { ?>
                        <li><a id="active" class="nav-link" href="profile.php">Profilom</a></li>
                        <li><a class="nav-link" href="logout.php">Kijelentkezés</a></li>
                    <?php } else { ?>
                        <li><a class="nav-link" href="login.php">Bejelentkezés</a></li>
                        <li><a class="nav-link" href="signup.php">Regisztráció</a></li>
                    <?php }?>
                </div>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div id="navutan" class="bubbles">
        <h3>Profilom</h3>
        <hr/>

        <?php
        // a profilkép elérési útvonalának eltárolása egy változóban

        $profilkep = "img/default.png";      // alapértelmezett kép, amit akkor jelenítünk meg, ha valakinek nincs feltöltött profilképe
        $utvonal = "img/" . $_SESSION["user"]["felhasznalonev"]; // a kép neve a felhasználó nevével egyezik meg

        $kiterjesztesek = ["png", "jpg", "jpeg"];     // a lehetséges kiterjesztések, amivel egy profilkép rendelkezhet

        foreach ($kiterjesztesek as $kiterjesztes) {  // minden kiterjesztésre megnézzük, hogy létezik-e adott kiterjesztéssel profilképe a felhasználónak
            if (file_exists($utvonal . "." . $kiterjesztes)) {
                $profilkep = $utvonal . "." . $kiterjesztes;  // ha megtaláltuk a felhasználó profilképét, eltároljuk annak az elérési útvonalát egy változóban
            }
        }
        ?>
        <?php
        // a profilkép módosítását elvégző PHP kód

        if (isset($_POST["upload-btn"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {  // ha töltöttek fel fájlt...
            $fajlfeltoltes_hiba = "";                                       // változó a fájlfeltöltés során adódó esetleges hibaüzenet tárolására
            uploadProfilePicture($_SESSION["user"]["felhasznalonev"]);      // a kozos.php-ban definiált profilkép feltöltést végző függvény meghívása

            $kit = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));    // a feltöltött profilkép kiterjesztése
            $utvonal = "img/" . $_SESSION["user"]["felhasznalonev"] . "." . $kit;            // a feltöltött profilkép teljes elérési útvonala

            // ha nem volt hiba a fájlfeltöltés során, akkor töröljük a régi profilképet, egyébként pedig kiírjuk a fájlfeltöltés során adódó hibát

            if ($fajlfeltoltes_hiba === "") {
                if ($utvonal !== $profilkep && $profilkep !== "img/default.png") {   // az ugyanolyan névvel feltöltött képet és a default.png-t nem töröljük
                    unlink($profilkep);                         // régi profilkép törlése
                }

                header("Location: profile.php");              // weboldal újratöltése
            } else {
                echo "<p>" . $fajlfeltoltes_hiba . "</p>";
            }
        }
        ?>

        <table class="profile-data">
            <tr>
                <th colspan="2">
                    <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="200"/>
                    <?php if ($_SESSION["user"]["felhasznalonev"] !== "default") { /* a "default" nevű példa felhasználó esetén ne engedélyezzük a profilkép módosítását */ ?>
                        <form action="profile.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="profile-pic" accept="image/*"/>
                            <input type="submit" name="upload-btn" value="Profilkép módosítása"/>
                        </form>
                    <?php } ?>
                </th>
            </tr>
            <tr>
                <th>Felhasználónév:</th>
                <td><?php echo $_SESSION["user"]["felhasznalonev"]; ?></td>
            </tr>
            <tr>
                <th>Életkor:</th>
                <td><?php echo $_SESSION["user"]["eletkor"]; ?></td>
            </tr>
            <tr>
                <th>Nem:</th>
                <td><?php echo nemet_konvertal($_SESSION["user"]["nem"]); ?></td>
            </tr>
            <tr>
                <th>Hobbik:</th>
                <td><?php echo implode(", ", $_SESSION["user"]["hobbik"]); ?></td>
            </tr>
        </table>
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