<?php
session_start();
include "kozos.php";
$foglalasok = loadFoglalasok("foglalasok.txt");

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<?php // a szálloda nevét még nem csináltam mivel az a link adja majd

$hibak = [];

$uzenet1 = "";
if (isset($_POST["submit-btn"])) {
    if (isset($_POST["full-name"]) && trim($_POST["full-name"]) !== "") {
        $teljesnev = $_POST["full-name"];
    } else {
        $hibak[] = "<strong>Hiba!</strong> Add meg a neved!";
    }

    if ($_POST["user-place"] !== "Válasszon a szállások oldalon") {
        $szallas = $_POST["user-place"];
    } else {
        $hibak[] = "<strong>Hiba!</strong> Vállassz szállást a szállások oldalon!";
    }

    if (isset($_POST["date-of-birth"]) && trim($_POST["date-of-birth"]) !== "") {
        $szuletes = $_POST["date-of-birth"];
    } else {
        $hibak[] = "<strong>Hiba!</strong> Add meg a születési dátumod!";
    }

    if (isset($_POST["email"]) && trim($_POST["email"]) !== "") {
        $email = $_POST["email"];
    } else {
        $hibak[] = "<strong>Hiba!</strong> Add meg az e-mail címed!";
    }

    if (isset($_POST["passwd"]) && password_verify($_POST['passwd'], $_SESSION["user"]['jelszo'])) {
    } else {
        $hibak[] = "<strong>Hiba!</strong> Helytelen jelszó!";
    }

    $sex = NULL;
    if (isset($_POST["sex"]))
        $sex = $_POST["sex"];
    $introd = NULL;
    if (isset($_POST["intro"]))
        $introd = $_POST["intro"];
    $szobak = NULL;
    if (isset($_POST["szobak"]))
        $szobak = $_POST["szobak"];
    $ejszakak = NULL;
    if (isset($_POST["ejszakak"]))
        $ejszakak = $_POST["ejszakak"];
    $op1 = NULL;
    if (isset($_POST["op-1"]))
        $op1 = $_POST["op-1"];
    $op2 = NULL;
    if (isset($_POST["op-2"]))
        $op2 = $_POST["op-2"];
    $op3 = NULL;
    if (isset($_POST["op-3"]))
        $op3 = $_POST["op-3"];


    if (count($hibak) === 0) {   // sikeres foglalas
        $foglalasok[] = ["teljesnev" => $teljesnev, "szallas" => $szallas, "szuletes" => $szuletes, "email" => $email, "sex" => $sex, "introd" => $introd, "szobak" => $szobak, "ejszakak" => $ejszakak, "op1" => $op1, "op2" => $op2, "op3" => $op3];
        saveFoglalasok("foglalasok.txt", $foglalasok);
        $siker = TRUE;
    } else {                    // sikertelen foglalas
        $siker = FALSE;
    }
}
?>
<?php // majd a szolgáltatásokat át kell írni hogy csak op-1 legyen a nevük
$kira = "";
if (isset($_POST["elkuld"])) {
    if (isset($_POST["op-1"])) {
        $kivalasztott = $_POST["op-1"];
        $kira = "A kiválasztott gyümölcsök: " . implode(", ", $kivalasztott) . "<br/>";
    }
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
                <li>
                    <a class="nav-link" href="foglalasok.php">
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
    <div id="navutan" class="bubbles">
        <h3>Kedves leendő vendégünk!</h3>

        <p>
            Arra kérjük, hogy a foglalás során adjon meg minél több információt, hogy a munkatársaink a lehető
            legjobban személyre szabott ajánlatokat tudják elküldeni Önnek és az utazótársainak!</p>
        <p>Az esetleges kívánságait (pl. erkélyes szoba, egymás melletti szobák stb.) kérjük, hogy írja meg a lent
            elhelyzett szövegdobozba!
        </p>
        <form method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Elsödleges foglalási adatok</legend>
                <label>Szálloda neve: </label><input type="text" name="user-place"
                                                     value="<?php echo isset($_GET['name']) ? $_GET['name'] : (isset($_GET['user-place']) ? $_GET['user-place'] : 'Válasszon a szállások oldalon'); ?>"
                                                     readonly> <br>

                <label>Vendég neve: </label><input type="text" name="full-name" size="25"> <br>
                <label>Születési dátuma: </label><input type="date" name="date-of-birth" min="1920-01-01">
                <br>
                <label>E-mail-e: </label><input type="email" name="email"> <br>
                <label>Jelszó: </label><input type="password" name="passwd" required> <br>
            </fieldset>
            <div id="masodl">
                <label for="place">Foglalás tipusa:</label>
                <select id="place" name="ejszakak">
                    <option value="egy">Egy éjszaka</option>
                    <option value="két">Két éjszaka</option>
                    <option value="több mint két">Több mint két északa</option>
                    <option value="bérlés" selected>Kibérlés</option>
                </select> <br>

                <label for="night">Szobák száma:</label>
                <select id="night" name="szobak">
                    <option value="egy">Egy szoba</option>
                    <option value="két">Két szoba</option>
                    <option value="több mint két">Több mint két szoba</option>
                    <option value="bérlés" selected>Kibérlés</option>
                </select> <br>

                Kért szolgáltatás:<br>
                <label for="op-1">Reggeli:</label>
                <input type="checkbox" id="op-1" name="op-1" value="Y">
                <label for="op-2">Ebéd:</label>
                <input type="checkbox" id="op-2" name="op-2" value="Y">
                <label for="op-3">Vacsora:</label>
                <input type="checkbox" id="op-3" name="op-3" value="Y"> <br>
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
        <div id="errors">
            <?php
            if (isset($siker) && $siker === TRUE) {  // ha nem volt hiba, akkor a regisztráció sikeres
                echo "<p>Sikeres Foglalas</p>";
            } else {                                // az esetleges hibákat kiírjuk egy-egy bekezdésben
                foreach ($hibak as $hiba) {
                    echo "<p>" . $hiba . "</p>";
                }
            }
            ?>
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
