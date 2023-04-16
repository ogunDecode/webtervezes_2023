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