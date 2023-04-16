<?php
session_start();
?>

<!doctype html>
<html lang="hu">

<head>
    <title>Utazási iroda - Szállásaink</title>
    <meta charset="utf-8">
    <meta name="description" content="2023 Webtervezés projektmunka">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fafafa">
    <link rel="icon" href="img/icon.png">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/urlap.css">
    <style>
        .name {
            color: brown;

        }

        .name, .offerlistprice {
            padding-left: 15px;
        }

        .offerlistprice {
            padding-bottom: 15px;
        }


        .advanced {
        }

        .offerlistprice {
            color: red;
        }

        .editor_line a {
            text-decoration: none;
            font-weight: normal;
        }


        .tabble, .tabble th, .tabble td {
            text-align: left;
            margin: 10px;
            padding: 0;
        }

        .tabble {
            width: 100%;
            border-radius: 4px;
            border: 3px solid #04bd50;
            margin: 15px 0 30px 0;
            box-shadow: 0 0 5px #57575757;
        }

        .tabble img {
            width: 95%;
            height: auto;
            margin: 15px;
            box-shadow: 0 0 5px #57575757;
        }

        .tabble th {
            width: 25%;
            font-weight: normal;
        }

        .tabble tr {
            vertical-align: top;
            text-align: left;
        }

        .tabble td {
            vertical-align: middle;
            color: black;
            padding: 15px;
            width: 70%;
        }

        caption h3 {
            font-size: 30px;
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
                    <a id="active" class="nav-link" href="szallasok.php">
                        Szállások</a>
                </li>
                <?php if ($_SESSION["user"]["perm"] !== 1) { ?>
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
        <div class="advanced" id="advanced_1">
            <h3>Kihagyhatatlan szálloda ajánlataink:</h3>

            <p>Ön is várja már a tavaszt? Böngésszen kedvére kedvezményes útjaink között! Izgalmas programokat
                kínálatunkban,
                legyen szó hosszú hétvégéről vagy akár egy hosszabb utazásról!</p>
            <div class="editor_line" id="advanced_line">

                <table class="tabble">
                    <caption><a id="OLASZ" href='#OLASZ'><h3 class="country">Olaszország-Róma</h3></a></caption>

                    <tr>
                        <th>
                            <a href='foglalas.php?name=Hotel%20Villa%20Pamphili%20Roma'>
                                <div><img src="./img/Rome1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hotel Villa Pamphili Roma</div>
                                <div class='offerlistprice'><b>269 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Hotel%20Villa%20Pamphili%20Roma'>
                                <p>A Hotel Villa Pamphilini Róma külvárosában helyezkedik el egy órára Róma
                                    közepétől
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <a href='foglalas.php?name=Just%20Chilling%20Suite'>
                                <div><img src="./img/Rome2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Just Chilling Suite</div>
                                <div class='offerlistprice'><b>419 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Just%20Chilling%20Suite'>
                                <p>A Just Chilling Suite diákok által let alapitva abban a reményben hogy mindenkinek
                                    olcso
                                    és kényelmes szállást tudjon szolgáltatni</p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=Al%20Viminale%20Hill%20Inn%20&%20Hotel'>
                                <div><img src="./img/Rome3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Al Viminale Hill Inn & Hotel</div>
                                <div class='offerlistprice'><b>299 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Al%20Viminale%20Hill%20Inn%20&%20Hotel'>
                                <p>Az Al Viminale Róma egy neves bórvidéke közelében helyezkedik el igy naponta frissen
                                    csürt borokat szolgálnak fell a látogatoknak</p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=San%20Pietro%20Grand%20Suite'>
                                <div><img src="./img/Rome4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: San Pietro Grand Suite</div>
                                <div class='offerlistprice'><b>299 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=San%20Pietro%20Grand%20Suite'>
                                <p>San Pietro Grand Suite Róma jelentös történelmi és vallási épületei között
                                    helyezkedik
                                    el igy Róma nevezetességei 30 percen belül elérhetők innen</p>
                            </a>
                        </td>
                    </tr>
                </table>

                <table class="tabble">
                    <caption><a id="HORVAT" href='#HORVAT'><h3 class="country">Horvátország - Zágráb</h3></a></caption>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=Timeout%20Heritage%20Hotel%20Zagreb'>
                                <div><img src="./img/Zagreb1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Timeout Heritage Hotel Zagreb</div>
                                <div class='offerlistprice'><b>329 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Timeout%20Heritage%20Hotel%20Zagreb'>
                                <p>
                                    A Timeout Heritage Hotel Zagreb kertre néző szálláshelye bárral és terasszal várja
                                    vendégeit
                                    Zágrábban, a Horvát Naiv Művészetek Múzeumától 300 méterre.</p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=Downtown'>
                                <div><img src="./img/Zagreb2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Downtown</div>
                                <div class='offerlistprice'><b>359 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Downtown'>
                                <p>Ideally set right in the centre of Zagreb, Downtown offers city views and free bikes,
                                    as well
                                    as a bar. The 4-star apartment has mountain views and is 400 metres from
                                    Archaeological
                                    Museum
                                    Zagreb.
                                </p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=Secret%20Garden'>
                                <div><img src="./img/Zagreb3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Secret Garden</div>
                                <div class='offerlistprice'><b>459 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Secret%20Garden'>
                                <p> In a prime location in a central area of Zagreb, Secret Garden offers city views and
                                    free
                                    bikes, as well as a garden.
                                </p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=Hotel%20Magdalena'>
                                <div><img src="./img/Zagreb4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hotel Magdalena</div>
                                <div class='offerlistprice'><b>739 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Hotel%20Magdalena'>
                                <p> A Zágráb délnyugati bejáratánál fekvő E65-ös főút mentén elhelyezkedő Hotel
                                    Magdalena
                                    légkondicionált szobákat kínál ingyenes Wi-Fi-vel, mintegy 2,5 km-re a zágrábi
                                    Arénától.
                                </p>
                            </a>
                        </td>

                    </tr>
                </table>
                <table class="tabble">
                    <caption><a id="FRANCIA" href='#FRANCIA'><h3 class="country">Franciaország - Páris</h3></a>
                    </caption>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=Grand%20Hotel%20Dore'>
                                <div><img src="./img/Parizs1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Grand Hotel Dore</div>
                                <div class='offerlistprice'><b>259 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Grand%20Hotel%20Dore'>
                                <p> A Grand Hotel Dore éjjel-nappali recepcióval várja vendégeit a 12. kerületben, az
                                    AccorHotels Arena épületétől 1,4 km-re és a Gare de Lyon vasúti pályaudvartól 2
                                    km-re.
                                </p>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href='foglalas.php?name=Hôtel%20Korner%20Etoile'>
                                <div><img src="./img/Parizs2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hôtel Korner Etoile</div>
                                <div class='offerlistprice'><b>559 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href='foglalas.php?name=Hôtel%20Korner%20Etoile'>
                                <p> Located 1.5 km from the Palais des Congrès, this hotel offers soundproofed and
                                    air-conditioned rooms with free Wi-Fi.
                                </p>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=Austin's%20Saint%20Lazare%20Hotel">
                                <div><img src="./img/Parizs3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Austin's Saint Lazare Hotel</div>
                                <div class='offerlistprice'><b>575 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=Austin's%20Saint%20Lazare%20Hotel">
                                <p> Ez az Austins szálloda Párizs városközpontjában, a Paris Gare Saint-Lazare
                                    fejpályaudvar
                                    mellett, az Opéra Garnier operaháztól 800 méterre található.
                                </p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=Grand%20Hôtel%20Amelot">
                                <div><img src="./img/Parizs4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Grand Hôtel Amelot</div>
                                <div class='offerlistprice'><b>619 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=Grand%20Hôtel%20Amelot">
                                <p> A Grand Hôtel Amelot egy 5 perces sétára fekszik a Marais negyedtől és a Place des
                                    Vosges
                                    parktól, Párizs 11. kerületében.
                                </p>
                            </a>
                        </td>

                    </tr>
                </table>
                <table class="tabble">
                    <caption><a id="NY" href='#NY'><h3 class="country">USA - New York</h3></a></caption>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=33%20Seaport%20Hotel%20New%20York">
                                <div><img src="./img/Newyork1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: 33 Seaport Hotel New York</div>
                                <div class='offerlistprice'><b>658 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=33%20Seaport%20Hotel%20New%20York">
                                <p>This hotel is located in Manhattan next to the Wall Street Financial District and is
                                    a
                                    13-minute walk to Ground Zero.
                                </p>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=Hyatt%20Grand%20Central%20New%20York">
                                <div><img src="./img/Newyork2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hyatt Grand Central New York</div>
                                <div class='offerlistprice'><b>669 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=Hyatt%20Grand%20Central%20New%20York">
                                <p> A Manhattanben, a Grand Central Station pályaudvar szomszédságában található
                                    szálloda
                                    helyszíni étteremmel és az éjjel-nappal nyitva tartó StayFit fitneszközponttal várja
                                    vendégeit.
                                </p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=Park%20Terrace%20hotel">
                                <div><img src="./img/Newyork3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Park Terrace hotel</div>
                                <div class='offerlistprice'><b>719 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=Park%20Terrace%20hotel">
                                <p> Az 1 GB ingyenes wifit kínáló Park Terrace Hotel szállása Manhattan belvárosában
                                    található.
                                    A szálláshelytől pár lépésre helyezkedik el a Bryant Park és a New York-i
                                    Közkönyvtár.
                                </p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=Omni%20Berkshire%20Place">
                                <div><img src="./img/Newyork4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Omni Berkshire Place</div>
                                <div class='offerlistprice'><b>879 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=Omni%20Berkshire%20Place">
                                <p> Ez a családbarát manhattani szálloda a Rockefeller Center és a Radio City Music Hall
                                    épületétől 644 méterre, a Central Parktól pedig 805 méterre helyezkedik el.
                                </p>
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="tabble">
                    <caption><a id="UK" href='#UK'><h3 class="country">UK- London</h3></a></caption>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=Leonardo%20Royal%20London%20St%20Pauls">
                                <div><img src="./img/London1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Leonardo Royal London St Pauls</div>
                                <div class='offerlistprice'><b>1 119 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=Leonardo%20Royal%20London%20St%20Pauls">
                                <p> A 4 csillagos szálloda fantasztikus medencével és fényűző szobákkal várja vendégeit
                                    London
                                    üzleti negyedében, a Szent Pál-székesegyház szomszédságában.
                                </p>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=LMontcalm%20Royal%20London%20House-City%20of%20London">
                                <div><img src="./img/London2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Montcalm Royal London House-City of London</div>
                                <div class='offerlistprice'><b>1 299 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=LMontcalm%20Royal%20London%20House-City%20of%20London">
                                <p> A Montcalm Royal London House-City of London szálláshelye központi helyen, London
                                    szívében,
                                    a Finsbury Square Garden park mellett, a Liverpool Street metróállomástól mindössze
                                    egy
                                    rövid
                                    sétára...
                                </p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=Royal%20Lancaster%20London">
                                <div><img src="./img/London3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Royal Lancaster London</div>
                                <div class='offerlistprice'><b>1 319 000 Ft-tól/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=Royal%20Lancaster%20London">
                                <p> Ez az 5 csillagos londoni szálloda a Hyde Park, a Marble Arch és a Lancaster Gate
                                    metróállomás mellett található egy csendes környéken. Lélegzetelállító kilátást
                                    nyújt a
                                    híres
                                    londoni városképre.
                                </p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <a href="foglalas.php?name=5%20Doughty%20Street">
                                <div><img src="./img/London4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: 5 Doughty Street</div>
                                <div class='offerlistprice'><b>1 499 000 Ft/fő</b></div>
                            </a>
                        </th>
                        <td>
                            <a href="foglalas.php?name=5%20Doughty%20Street">
                                <p>
                                    A 5 Doughty Street kerttel valamint ingyenes wifivel várja vendégeit London
                                    központjában, a
                                    British
                                    Museum, a Theatre Royal Drury Lane és a Dominion Theatre közelében.</p>
                            </a>
                        </td>
                    </tr>
                </table>
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
