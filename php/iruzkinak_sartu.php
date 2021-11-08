<?php
  function formularioa_balioztatu($izena, $iruzkina, $posta) {
    if(strlen($izena) > 0 && strlen($iruzkina) > 0){
      if($posta != null){
        if(preg_match("/^[A-Za-z]+\.?[A-Za-z]*@[a-z]{3}\.{2,3}$/", $posta)){
          return 1;
        }else {
          return 0;
        }
      }else {
        return 1;
      }
    }else {
      return 0;
    }
  }
 ?>
 <?php
    $baliozkoak = 0;
    if (isset($_POST["izena"]) && isset($_POST["iruzkina"])) {
      $izena = $_POST["izena"];
      $iruzkina = $_POST["iruzkina"];
      if(isset($_POST["posta"])){
        $posta = $_POST["eokerra1"];
      }else {
        $posta = null;
      }
      $baliozkoak = formularioa_balioztatu($izena, $iruzkina, $posta);
    }else{
      echo "naitaezko parametroak definitu gabe";
    }
  ?>
