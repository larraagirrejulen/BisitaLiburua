<?php

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $bisitak = simplexml_load_file('../xml/bisita_liburua.xml');
    $iruz = 0;
    $zenbat = $bisitak->count();
    if($id > $zenbat){
      $id = $id - $zenbat;
    }
    foreach ($bisitak-> children() as $bisita){
      $iruz += 1;

      if($iruz==$id){
        $iruzkina = $bisita[0]->iruzkina[0];
        echo "$iruzkina";
        break;
      }

    }
  }else{
    echo "Errorea";
  }

 ?>
