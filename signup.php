<?php
include "kozos.php";
$fiokok = loadUsers("txt/users.txt");

$hibak = [];

if (isset($_POST["regiszt"])) {
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
        $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
        $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["eletkor"]) || trim($_POST["eletkor"]) === "")
        $hibak[] = "Az életkor megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
        $hibak[] = "A nem megadása kötelező!";


    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $eletkor = $_POST["eletkor"];
    $nem = NULL;

    if (isset($_POST["nem"]))
        $nem = $_POST["nem"];

    foreach ($fiokok as $fiok) {
        if ($fiok["felhasznalonev"] === $felhasznalonev)
            $hibak[] = "A felhasználónév már foglalt!";
    }

    if (strlen($jelszo) < 5)
        $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    if ($jelszo !== $jelszo2)
        $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    if ($eletkor < 18)
        $hibak[] = "Csak 18 éves kortól lehet regisztrálni!";

    $fajlfeltoltes_hiba = "";
    uploadProfilePicture($felhasznalonev);

    if ($fajlfeltoltes_hiba !== "")
        $hibak[] = $fajlfeltoltes_hiba;

    if (count($hibak) === 0) {
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
        $perm = 0; // 1 = admin; 0 = user
        $fiokok[] = ["felhasznalonev" => $felhasznalonev, "jelszo" => $jelszo, "eletkor" => $eletkor, "nem" => $nem, "perm" => $perm];
        saveUsers("txt/users.txt", $fiokok);
        $siker = TRUE;
    } else {
        $siker = FALSE;
    }
}
?>

<!doctype html>
<html lang="hu">

<head>
    <title>Utazási iroda - Regisztráció</title>
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
                        <a id="active" class="nav-link" href="signup.php">Regisztráció</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div id="navutan" class="bubbles logs">
        <h3>Regisztráció</h3>
        <hr/>

        <form class="signup" action="signup.php" method="POST" enctype="multipart/form-data">
            <div id="fields">
                <label>Felhasználónév: <input type="text" name="felhasznalonev"
                                              value="<?php if (isset($_POST['felhasznalonev'])) echo $_POST['felhasznalonev']; ?>"/></label>
                <br/>
                <label>Jelszó: <input type="password" name="jelszo"/></label> <br/>
                <label>Jelszó ismét: <input type="password" name="jelszo2"/></label> <br/>
                <label>Életkor: <input type="number" name="eletkor"
                                       value="<?php if (isset($_POST['eletkor'])) echo $_POST['eletkor']; ?>"/></label>
                <br/>
            </div>
            <div id="texts">
                <p>
                    Nem:
                    <label><input type="radio" name="nem"
                                  value="F" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'F') echo 'checked'; ?>/>
                        Férfi</label>
                    <label><input type="radio" name="nem"
                                  value="N" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'N') echo 'checked'; ?>/>
                        Nő</label>
                    <label><input type="radio" name="nem"
                                  value="E" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'E') echo 'checked'; ?>/>
                        Egyéb</label> <br/>
                </p>
                <p>
                    <label>Profilkép: <input type="file" name="profile-pic" accept="image/*"/></label> <br/>
                    <input class="fgomb" type="submit" name="regiszt"/> <br/><br/>
                </p>
            </div>
        </form>

        <?php
        if (isset($siker) && $siker === TRUE) {
            echo "<p>Sikeres regisztráció!</p>";
        } else {
            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }
        }
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