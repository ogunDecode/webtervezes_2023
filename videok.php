<?php
session_start();
if (isset($_SESSION["user"]) && $_SESSION["user"]["perm"] == 1) {
    header('Location: index.php');
    exit();
}
?>

<!doctype html>
<html lang="hu">

<head>
    <title>Utazási iroda - Kisfilmjeink</title>
    <meta charset="utf-8">
    <meta name="description" content="2023 Webtervezés projektmunka">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fafafa">
    <link rel="icon" href="img/icon.png">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/urlap.css">
    <style>
        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .videos {
            padding: 10px;
            text-align: center;
            animation: fadeInAnimation 3s linear 0s 1 normal forwards;
        }

        .rotated {
            transform: translate(0px, 0px) rotate(180deg);
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
                        <img alt="" id="logox" class="rotated" src="img/logo.png">
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
                        <a id="active" class="nav-link" href="videok.php">
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
                        <a class="nav-link" href="signup.php">Regisztráció</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div id="navutan" class="bubbles">
        <h3 class="title videos">Városokat bemutató kisfilmjeink, azon látogatoknakakik nem ismerik az adott város
            nevezetességeit és történetét</h3>
        <div class="content videos">
            <p><strong>Tisztelt Látogatok, kedves Vendégek és érdeklődök!</strong></p>
            <p class="text">Azoknak az igényére akik nem ismertek az adott városok nevezetességevel és javaslatokat
                keresnek
                azoknak összeálitottunk egy rövid
                összefoglalot a redszerünkben szereplő szállodákat körülvevő városok nevezetességeiről(ezt bövebben egy
                angol
                videoban is megtekinthetik) valamint rövid történetéről</p>

            <div class="video">
                <p id="UK"><b>London bemutatása</b></p>
                <iframe src="https://www.youtube.com/embed/45ETZ1xvHS0"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                </iframe>
            </div>
            <p>London az Egyesült Királyság és azon belül Anglia fővárosa, a legnagyobb városi terület az Egyesült
                Királyságban;
                Európában Isztambul
                és Moszkva után a legnépesebb város. A Londoni-medencében, a Temze folyó két partján terül el. A
                története
                egészen az alapító rómaiakig nyúlik vissza,
                akik a várost Londiniumnak nevezték. A középkor emlékeit a város központjában található City of London
                őrzi, a
                mai London e köré épült ki.
            </p>

            <div class="video">
                <p id="NY"><b>New york bemutatása</b></p>
                <iframe src="https://www.youtube.com/embed/-M0RiKff3Ds"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                </iframe>
            </div>
            <p>New York az Amerikai Egyesült Államok New York államában fekvő város. Az ország legnépesebb, Amerika
                szuperkontinens harmadik legnépesebb
                települése, központja a New York-i agglomerációnak, amely a szuperkontinens legnagyobb várostömörülése,
                a
                világon pedig a nyolcadik. A Föld egyik vezető
                világvárosa, az Egyesült Államok első számú üzleti, kereskedelmi, egészségügyi, oktatási központja,
                egyik első
                számú kutatási-fejlesztési, technológiai,
                média- és szórakoztatóipari csomópontja, turizmusának elsődleges célpontja. Itt található az ENSZ és
                több,
                világszinten is jelentős multinacionális vállalat
                székhelye, valamint a világ egyik legnagyobb tőzsdéje, ezért a Föld legjelentősebb gazdasági-politikai
                centrumai
                közé tartozik.</p>

            <div class="video">
                <p ID="OLASZ"><b>Róma bemutatása</b></p>
                <iframe src="https://www.youtube.com/embed/DEJx0CYrDHk"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                </iframe>
            </div>
            <p>Róma (olaszul és latinul: Roma) Olaszország fővárosa, Lazio régió központja, a hajdani Római Birodalom
                központja.
                Az ország legnagyobb és legnépesebb városa 1285,3 km²-en mintegy 2,8 millió lakossal, az Európai Unió
                harmadik
                legnépesebb városa.
                Területébe ékelve található a Vatikán, a római katolikus egyház központja, a pápa székhelye, a világ
                legkisebb
                független állama. Nagy kiterjedésű
                történelmi központja az UNESCO Világörökség része. Múzeumai és műemlékei, mint pl. a Vatikán múzeumai és
                a
                Colosseum a világ 50 leglátogatottabb turisztikai
                célpontjai között vannak.

                Róma története 28 évszázadot ölel fel. Míg a római mitológia Kr.e. 753 körül datálta Róma alapítását, a
                hely
                sokkal régebb ideje lakott volt,
                így csaknem három évezred óta jelentős település, és Európa egyik legrégebbi, folyamatosan lakott
                városa. A
                város korai lakossága latinok,
                etruszkok és szabinok keverékéből származott. Végül a város a Római Királyság, a Római Köztársaság, majd
                a Római
                Birodalom fővárosává vált,
                melyet sokan a legelső metropolisznak tekintenek. Tibullus római költő hívta először az Örök városnak
                (latinul:
                Urbs Aeterna; olaszul: La Città Eterna)
                a Kr.e. 1. században, és ezt a kifejezést Ovidius, Vergilius és Livius is átvette. Emellett Rómát "Caput
                Mundi"
                -nak (a világ fővárosa) is nevezik.
                A birodalom nyugati bukása után, (amely a középkor kezdetét jelentette) Róma lassan a pápaság politikai
                irányítása alá került, és a 8. században
                a Pápai állam fővárosává vált, mely 1870-ig tartott. A reneszánsztól kezdve V. Miklós óta szinte minden
                pápa
                négyszáz éven keresztül koherens építészeti
                és városi programot folytatott, amelynek célja volt, hogy a várost a világ művészeti és kulturális
                központjává
                tegye. Ily módon Róma először
                a reneszánsz egyik fő központja lett, majd a barokk stílus és a neoklasszicizmus szülőhelyévé vált.
                Híres
                művészek, festők, szobrászok és építészek
                tették Rómát tevékenységük középpontjává, remekműveket alkotva az egész városban. 1871-ben Róma az Olasz
                Királyság fővárosa lett, 1946-óta
                pedig az Olasz Köztársaság fővárosa.
            </p>
            <div class="video">
                <p id="FRANCIA"><b>Párizs bemutatása</b></p>
                <iframe src="https://www.youtube.com/embed/AQ6GmpMu5L8"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                </iframe>
            </div>
            <p>Párizs (franciául: Paris, latinul: Lutetia, vagy a későbbi neolatin Lutetia Parisiorum) Franciaország
                fővárosa.
                Az ország északi részén, a Szajna folyó partján terül el, az Île-de-France régió (vagy Région
                Parisienne)
                szívében. Párizs Európa egyik legnépesebb városa.
                Becsült népessége elővárosait nem számítva 2006 januárjában 2 167 944 fő volt, ám agglomerációival a
                Párizsi
                „unité urbaine” (városi terület) populációja
                2005-ben több volt mint 9 millió fő, míg a Párizs „aire urbaine” (fővárosi terület) 12 millió lakost
                számlált.

                A két évezreden keresztül fontos szerepet játszó Párizs ma is a világ egyik vezető gazdasági és
                kulturális
                központja, befolyása a politikára, az oktatásra,
                a szórakoztatóiparra, a sajtóra, a divatra, a tudományra és a művészetekre a világ négy legjelentősebb
                városa
                közé emelte. A Région Parisienne Franciaország
                legfejlettebb területe, gazdaságának központja: 2006-ban 500,8 milliárd euróval a francia bruttó hazai
                termék
                egynegyedét adta. A világ 500 legjelentősebb
                vállalatából 38 székel Párizs számos üzleti negyedének egyikében. Jelentős nemzetközi szervezetek, mint
                az
                UNESCO, az OECD, az ESA és az ICC is párizsi központú.
            </p>
            <div class="video">
                <p id="HORVAT"><b>Zagreb bemutatása (dron felvétel)</b></p>
                <iframe src="https://www.youtube.com/embed/PRyScU9i7KU"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                </iframe>
            </div>
            <p>Zágráb (horvátul: Zagreb, németül: Agram, latinul és olaszul: Zagabria, régi magyar nevén: Gréc)
                Horvátország
                fővárosa és legnagyobb városa,
                a Zágrábi főegyházmegye székhelye, Budapest és Belgrád után pedig a Kárpát-medence harmadik legnagyobb
                városa.
                Az ország északnyugati részén,
                a Száva-folyó mentén, a Medvednica-hegy déli lejtőin fekszik, körülbelül 122 m tengerszint feletti
                magasságban.
                A város becsült lakosságszáma 2018-ban
                804 507 fő volt, a városi agglomeráció lakossága pedig 1 153 255 fő, azaz Horvátország teljes
                népességének
                körülbelül egynegyede.

                Zágráb gazdag római kori történelemmel rendelkezik. A város környékének legrégebbi települése a római
                Andautónia
                volt, a mai Ščitarjevóban.
                A "Zágráb" név első írásos említése 1134-ből származik, Kaptol település (ma Zágráb városrésze) 1094-es
                megalapításával összefüggésben.
                1242-ben szabad királyi város lett. 1851-ben volt Zágrábnak először polgármestere, Janko Kamauf.
            </p>
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
