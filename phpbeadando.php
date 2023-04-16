<?php     // süti
  $see = 1;
  if (isset($_COOKIE["visits"])) {
    $latogatasok = $_COOKIE["visits"] + 1;
  }
  setcookie("visits", $see, time() + (60*60*24*10), "/");
?>
<?php
        echo "Üdvözöllek ismét! Ez a(z) $see. látogatásod.";
    ?>


<?php  // a szálloda nevét még nem csináltam mivel az a link adja majd
  $uzenet1 = "";                   

  if (isset($_GET["submit-btn"])) {   
    if (isset($_GET["full-name"]) && trim($_GET["full-name"]) !== "") {
      $beirt_szoveg = $_GET["full-name"];
      //a foglat nevekkel (amit a feledat ir) nem igazán tudom hogy mit kezdjek arra gondoltam csak hogy irok random neveket a php-ba és azt ellenőrzöm
    } else { 
      $uzenet1 = "<strong>Hiba!</strong> Írj be valamit az űrlapmezőbe!";
    }
  }
  $uzenet2 = "";                   

  if (isset($_GET["submit-btn"])) {   
    if (isset($_GET["date-of-birth"]) && trim($_GET["date-of-birth"]) !== "") {
      $szuletes = $_GET["date-of-birth"];  
    } else { 
      $uzenet2 = "<strong>Hiba!</strong> Írj be valamit az űrlapmezőbe!";
    }
  }
  $uzenet3 = "";                   

  if (isset($_GET["submit-btn"])) {   
    if (isset($_GET["email"]) && trim($_GET["email"]) !== "") {
      $email = $_GET["email"];  
    } else { 
      $uzenet3 = "<strong>Hiba!</strong> Írj be valamit az űrlapmezőbe!";
    }
  }

  $uzenet4 = "";                   

  if (isset($_GET["submit-btn"])) {   
    if (isset($_GET["passwd"]) && trim($_GET["passwd"]) !== "") {
      $jelszo = password_hash($_GET["passwd"]);
    } else { 
      $uzenet4 = "<strong>Hiba!</strong> Írj be valamit az űrlapmezőbe!";
    }
  }

  $uzenet5 = "";                   

  if (isset($_GET["submit-btn"])) {   
    if (isset($_GET["passwd-check"]) && trim($_GET["passwd-check"]) !== "") {
      $jelszoel = password_hash($_GET["passwd-check"]);  
    } else { 
      $uzenet5 = "<strong>Hiba!</strong> Írj be valamit az űrlapmezőbe!";
    }
    var_dump(password_verify($jelszo, $jelszoel)); echo "<br/>";
  }
?>
<?php  // majd a szolgáltatásokat át kell írni hogy csak op-1 legyen a nevük
  $kira = "";                    
  if (isset($_GET["elkuld"])) {  
      if (isset($_GET["op-1"])) {
      $kivalasztott = $_GET["op-1"];  
      $kira = "A kiválasztott gyümölcsök: " . implode(", ", $kivalasztott) . "<br/>"; 
    }
  }
?>



<?php
// a regisztrált felhasználók fájlból való betöltéséért felelő függvény

function loadUsers($path) {
  $users = [];

  $file = fopen($path, "r");
  if ($file === FALSE)
    die("HIBA: A fájl megnyitása nem sikerült!");

  while (($line = fgets($file)) !== FALSE) {
    $user = unserialize($line);
    $users[] = $user;
  }

  fclose($file);
  return $users;
}

// a regisztrált felhasználók adatait fájlba író függvény

function saveUsers($path, $users) {
  $file = fopen($path, "w");
  if ($file === FALSE)
    die("HIBA: A fájl megnyitása nem sikerült!");

  foreach($users as $user) {
    $serialized_user = serialize($user);
    fwrite($file, $serialized_user . "\n");
  }

  fclose($file);
}

// a profilkép feltöltését végző függvény

function uploadProfilePicture($username) {
  global $fajlfeltoltes_hiba;    // ez a változó abban a fájlban található, amiben ezt a függvényt meghívjuk, ezért újradeklaráljuk globálisként

  if (isset($_FILES["profile-pic"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {  // ha töltöttek fel fájlt...
    $allowed_extensions = ["png", "jpg", "jpeg"];                                           // az engedélyezett kiterjesztések tömbje
    $extension = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));  // a feltöltött fájl kiterjesztése

    if (in_array($extension, $allowed_extensions)) {      // ha a fájl kiterjesztése megfelelő...
      if ($_FILES["profile-pic"]["error"] === 0) {        // ha a fájl feltöltése sikeres volt...
        if ($_FILES["profile-pic"]["size"] <= 31457280) { // ha a fájlméret nem nagyobb 30 MB-nál
          $path = "img/" . $username . "." . $extension;   // a cél útvonal összeállítása

          if (!move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $path)) { // fájl átmozgatása a cél útvonalra
            $fajlfeltoltes_hiba = "A fájl átmozgatása nem sikerült!";
          }
        } else {
          $fajlfeltoltes_hiba = "A fájl mérete túl nagy!";
        }
      } else {
        $fajlfeltoltes_hiba = "A fájlfeltöltés nem sikerült!";
      }
    } else {
      $fajlfeltoltes_hiba = "A fájl kiterjesztése nem megfelelő!";
    }
  }
}
?>