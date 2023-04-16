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
                <a id="OLASZ" href='foglalas.php'>
                    <table class="tabble">
                        <caption><h3 class="country">Olaszország-Róma</h3></caption>
                        <tr>
                            <th>
                                <div><img src="./img/Rome1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hotel Villa Pamphili Roma</div>
                                <div class='offerlistprice'><b>269 000 Ft-tól/fő</b></div></th>
                                <td> <p>A Hotel Villa Pamphilini Róma külvárosában helyezkedik el egy órára Róma
                                közepétől</p>
                                </td>
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Rome2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Just Chilling Suite</div>
                                <div class='offerlistprice'><b>419 000 Ft-tól/fő</b></div></th>
                               <td> <p>A Just Chilling Suite diákok által let alapitva abban a reményben hogy mindenkinek
                                olcso
                                és kényelmes szállást tudjon szolgáltatni</p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Rome3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Al Viminale Hill Inn & Hotel</div>
                                <div class='offerlistprice'><b>299 000 Ft-tól/fő</b></div></th>
                            <td><p>Az Al Viminale Róma egy neves bórvidéke közelében helyezkedik el igy naponta frissen
                                csürt borokat szolgálnak fell a látogatoknak</p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Rome4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: San Pietro Grand Suite</div>
                                <div class='offerlistprice'><b>299 000 Ft-tól/fő</b></div></th>
                            <td><p>San Pietro Grand Suite Róma jelentös történelmi és vallási épületei között
                                helyezkedik
                                el igy Róma nevezetességei 30 percen belül elérhetők innen</p></td>
                            
                        </tr>
                    </table>
                </a>
                <a id="HORVAT" href='foglalas.php'>
                    <table class="tabble">
                        <caption><h3 class="country">Horvátország - Zágráb</h3></caption>
                        <tr>
                            <th>
                                <div><img src="./img/Zagreb1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Timeout Heritage Hotel Zagreb</div>
                                <div class='offerlistprice'><b>329 000 Ft-tól/fő</b></div></th>
                            <td><p>
                                A Timeout Heritage Hotel Zagreb kertre néző szálláshelye bárral és terasszal várja
                                vendégeit
                                Zágrábban, a Horvát Naiv Művészetek Múzeumától 300 méterre.</p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Zagreb2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Downtown</div>
                                <div class='offerlistprice'><b>359 000 Ft-tól/fő</b></div> </th>
                            <td><p>Ideally set right in the centre of Zagreb, Downtown offers city views and free bikes,
                                as well
                                as a bar. The 4-star apartment has mountain views and is 400 metres from
                                Archaeological
                                Museum
                                Zagreb.
                            </p></td>
                           
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Zagreb3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Secret Garden</div>
                                <div class='offerlistprice'><b>459 000 Ft-tól/fő</b></div></th>
                            <td><p> In a prime location in a central area of Zagreb, Secret Garden offers city views and
                                free
                                bikes, as well as a garden.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Zagreb4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hotel Magdalena</div>
                                <div class='offerlistprice'><b>739 000 Ft-tól/fő</b></div></th>
                            <td><p> A Zágráb délnyugati bejáratánál fekvő E65-ös főút mentén elhelyezkedő Hotel
                                Magdalena
                                légkondicionált szobákat kínál ingyenes Wi-Fi-vel, mintegy 2,5 km-re a zágrábi
                                Arénától.
                            </p></td>
                            
                        </tr>
                    </table>
                </a>
                <a id="FRANCIA" href='foglalas.php'>
                    <table class="tabble">
                        <caption><h3 class="country">Franciaország - Páris</h3></caption>
                        <tr>
                            <th>
                                <div><img src="./img/Parizs1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Grand Hotel Dore</div>
                                <div class='offerlistprice'><b>259 000 Ft-tól/fő</b></div></th>
                            <td><p> A Grand Hotel Dore éjjel-nappali recepcióval várja vendégeit a 12. kerületben, az
                                AccorHotels Arena épületétől 1,4 km-re és a Gare de Lyon vasúti pályaudvartól 2 km-re.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Parizs2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hôtel Korner Etoile</div>
                                <div class='offerlistprice'><b>559 000 Ft-tól/fő</b></div></th>
                            <td><p> Located 1.5 km from the Palais des Congrès, this hotel offers soundproofed and
                                air-conditioned rooms with free Wi-Fi.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Parizs3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Austin's Saint Lazare Hotel</div>
                                <div class='offerlistprice'><b>575 000 Ft-tól/fő</b></div></th>
                            <td><p> Ez az Austins szálloda Párizs városközpontjában, a Paris Gare Saint-Lazare
                                fejpályaudvar
                                mellett, az Opéra Garnier operaháztól 800 méterre található.
                            </p>/td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Parizs4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Grand Hôtel Amelot</div>
                                <div class='offerlistprice'><b>619 000 Ft-tól/fő</b></div></th>
                            <td><p> A Grand Hôtel Amelot egy 5 perces sétára fekszik a Marais negyedtől és a Place des
                                Vosges
                                parktól, Párizs 11. kerületében.
                            </p></td>
                            
                        </tr>
                    </table>
                </a>
                <a id="NY" href='foglalas.php'>
                    <table class="tabble">
                        <caption><h3 class="country">USA - New York</h3></caption>
                        <tr>
                            <th>
                                <div><img src="./img/Newyork1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: 33 Seaport Hotel New York</div>
                                <div class='offerlistprice'><b>658 000 Ft-tól/fő</b></div></th>
                            <td><p>This hotel is located in Manhattan next to the Wall Street Financial District and is
                                a
                                13-minute walk to Ground Zero.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Newyork2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Hyatt Grand Central New York</div>
                                <div class='offerlistprice'><b>669 000 Ft-tól/fő</b></div></th>
                            <td><p> A Manhattanben, a Grand Central Station pályaudvar szomszédságában található
                                szálloda
                                helyszíni étteremmel és az éjjel-nappal nyitva tartó StayFit fitneszközponttal várja
                                vendégeit.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Newyork3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Park Terrace hotel</div>
                                <div class='offerlistprice'><b>719 000 Ft-tól/fő</b></div></th>
                            <td><p> Az 1 GB ingyenes wifit kínáló Park Terrace Hotel szállása Manhattan belvárosában
                                található.
                                A szálláshelytől pár lépésre helyezkedik el a Bryant Park és a New York-i Közkönyvtár.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/Newyork4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Omni Berkshire Place</div>
                                <div class='offerlistprice'><b>879 000 Ft-tól/fő</b></div></th>
                            <td><p> Ez a családbarát manhattani szálloda a Rockefeller Center és a Radio City Music Hall
                                épületétől 644 méterre, a Central Parktól pedig 805 méterre helyezkedik el.
                            </p></td>
                            
                        </tr>
                    </table>
                </a>
                <a id="UK" href='foglalas.php'>
                    <table class="tabble">
                        <caption><h3 class="country">UK- London</h3></caption>
                        <tr>
                            <th>
                                <div><img src="./img/London1.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Leonardo Royal London St Pauls</div>
                                <div class='offerlistprice'><b>1 119 000 Ft-tól/fő</b></div></th>
                            <td><p> A 4 csillagos szálloda fantasztikus medencével és fényűző szobákkal várja vendégeit
                                London
                                üzleti negyedében, a Szent Pál-székesegyház szomszédságában.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/London2.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Montcalm Royal London House-City of London</div>
                                <div class='offerlistprice'><b>1 299 000 Ft-tól/fő</b></div></th>
                            <td><p> A Montcalm Royal London House-City of London szálláshelye központi helyen, London
                                szívében,
                                a Finsbury Square Garden park mellett, a Liverpool Street metróállomástól mindössze egy
                                rövid
                                sétára...
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/London3.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: Royal Lancaster London</div>
                                <div class='offerlistprice'><b>1 319 000 Ft-tól/fő</b></div></th>
                            <td><p> Ez az 5 csillagos londoni szálloda a Hyde Park, a Marble Arch és a Lancaster Gate
                                metróállomás mellett található egy csendes környéken. Lélegzetelállító kilátást nyújt a
                                híres
                                londoni városképre.
                            </p></td>
                            
                        </tr>
                        <tr>
                            <th>
                                <div><img src="./img/London4.jpg" alt="a" title="first"></div>
                                <div class="name">Szálloda: 5 Doughty Street</div>
                                <div class='offerlistprice'><b>1 499 000 Ft/fő</b></div></th>
                            <td><p>
                                A 5 Doughty Street kerttel valamint ingyenes wifivel várja vendégeit London központjában, a
                                British
                                Museum, a Theatre Royal Drury Lane és a Dominion Theatre közelében.</p></td>
                            
                        </tr>
                    </table>
                </a>

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