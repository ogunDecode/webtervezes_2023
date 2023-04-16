<?php
session_start();
include "kozos.php";
// süti
$see = 1;

if (isset($_COOKIE["visits"])) {
    $see = $_COOKIE["visits"] + 1;
}
setcookie("visits", $see, time() + (60 * 60 * 24 * 30), "/");
echo "<p style='text-align: center; margin: 0;'>Üdvözöllek ismét! Ez a(z) $see. látogatásod.</p>";


if (!isset($_SESSION["user"])) {
    // ha a felhasználó nincs belépve (azaz a "user" munkamenet-változó értéke nem került korábban beállításra), akkor a login.php-ra navigálunk
    header("Location: login.php");
}
function nemet_konvertal($betujel)
{        // egy segédfüggvény, amely visszaadja a betűjelnek megfelelő nemet
    switch ($betujel) {
        case "F" :
            return "férfi";
            break;
        case "N" :
            return "nő";
            break;
        case "E" :
            return "egyéb";
            break;
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
                        <a class="nav-link" href="foglalasok.php">
                            Foglalások</a>
                    </li>
                <?php } ?>
                <div style="margin-left: auto; display: flex">
                    <?php if (isset($_SESSION["user"])) { ?>
                        <li><a id="active" class="nav-link" href="profile.php">Profilom</a></li>
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
        <?php
        // load the users into a 2-dimensional array
        $fiokok = loadUsers("users.txt");

        // find the index of the user to remove
        foreach ($fiokok as $key => $fiok) {
            if ($fiok['felhasznalonev'] == $_SESSION["user"]["felhasznalonev"]) {
                $index = $key;
                break;
            }
        }
        // check if password was submitted and is correct
        if (isset($_POST['password']) && password_verify($_POST['password'], $fiokok[$index]['jelszo'])) {
            // remove the user from the array
            if ($index !== false) {
                array_splice($fiokok, $index, 1);
                // save the updated array to the file
                saveUsers("users.txt", $fiokok);
                session_unset();
                session_destroy();
                // redirect to a success page
                header("Location: index.php");
                exit();
            }
        } elseif (isset($_POST['password'])) {
            // password was submitted but is incorrect
            echo "Üresen hagyott vagy helytelen jelszó. Próbáld újra";
        }
        ?>
        <table class="profile-data">
            <tr>
                <th colspan="2">
                    <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="200"/>
                    <?php if ($_SESSION["user"]["felhasznalonev"] !== "default") { /* a "default" nevű példa felhasználó esetén ne engedélyezzük a profilkép módosítását */ ?>
                        <form action="profile.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="profile-pic" accept="image/*"/>
                            <input class="fgomb" type="submit" name="upload-btn" value="Profilkép módosítása"/>
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
        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <label for="password">Jelszó:</label>
            <input type="password" id="password" name="password">
            <button class="fgomb" type="submit" name="delete" value="1">Felhasználó törlése</button>
        </form>
        <p>A szállodai foglalásokon kívül oldalunk lehetőséget add a fopglalóink megismerésére, ezzel a szolgáltatási
            fungcioval akarjuk biztositani
            hogy nem csak egy kivételés utazási élményt biztositunk de lehetőséget adunk hosszutávú ismeretséget
            kialakitására.
        </p>
        <p>
            (Sajnálatal közöljük hogy zaklatási panaszok véget ez a szolgáltatás az admin kivételével csak az azonos
            nemmel rendelkező felhasználokkal működik)
        </p>


        <?php
        if (isset($_POST["elkuld"])) {
            $beirt_szoveg = $_POST["szoveg"];

            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['perm'] == 1) {
                    $uzenet = "Ezt üzened a felhasználónak: $beirt_szoveg";
                } else {
                    if ($_SESSION['user']['nem'] == "N") {
                        $uzenet = "Ezt üzened a felhasználónak: $beirt_szoveg";
                    } else if ($_SESSION['user']['nem'] == "F") {
                        $uzenet = "Ezt üzened a felhasználónak: $beirt_szoveg";
                    } else if ($_SESSION['user']['nem'] == "E") {
                        $uzenet = "Ezt üzened a felhasználónak: $beirt_szoveg";
                    } else {
                        $uzenet = "Ezt üzened a felhasználónak: $beirt_szoveg";
                    }
                }
            }

        }
        ?>
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['perm'] == 1) {
            $form_id = "admindelete";
            $message = "Adminként bárkinek küldhet üzenetet.<br> Kérem válassza ki a személyeket ha személyre szóló üzenetet akar küldeni:";
        } else if (isset($_SESSION['user']) && $_SESSION['user']['nem'] == "F") {
            $form_id = "ferdelete";
            $message = "Férfiként csak férfiaknak küldhet üzenetet.<br> Kérem válassza ki a személyeket ha személyre szóló üzenetet akar küldeni:";
        } else if (isset($_SESSION['user']) && $_SESSION['user']['nem'] == "N") {
            $form_id = "nodelete";
            $message = "Nőként csak nőknek küldhet üzenetet.<br> Kérem válassza ki a személyeket ha személyre szóló üzenetet akar küldeni:";
        } else if (isset($_SESSION['user']) && $_SESSION['user']['nem'] == "E") {
            $form_id = "egydelete";
            $message = "Egyébként csak egyebeknek küldhet üzenetet.<br> Kérem válassza ki a személyeket ha személyre szóló üzenetet akar küldeni:";
        }
        ?>
        <form action="profile.php" method="POST" id="<?php echo $form_id; ?>">
            <p><?php echo $message; ?></p>
            <input type="text" name="szoveg"/>
            <input type="submit" name="elkuld"/> <br/>
        </form>
        <?php
        if (isset($uzenet))
        echo "<p>" . $uzenet . "</p>";
        ?>
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
