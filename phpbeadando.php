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

<?php echo "<p>" . $uzenet . "</p>"; 

// a lenyilo füles választó részt nem igazán van ötletem hogy hogy is kellene megvalositani szoval ha van ötleted akkor majd ird meg
?>
