<link rel="stylesheet" type="text/css" href="../stylesheet/erabiltzaile_taula.css"/>
<table class="erabiltzaile_taula">
  <thead>
    <tr>
      <th>Data</th><th>Posta</th><th>Iruzkina</th>
    </tr>
  </thead>
  <tbody>
<?php
  if(isset($_POST['izena'])){
    $bisitak = simplexml_load_file('../xml/bisita_liburua.xml');
    $aurkitua = 0;
    foreach ($bisitak-> children() as $bisita){
      $izena = $bisita[0]->izena[0];
      if($izena == $_POST['izena']){
        $aurkitua = 1;
        echo "<tr>";

        $data = $bisita[0]->data[0];
        echo "<td>$data</td>";
        if(isset($bisita[0]->posta[0]) && $bisita->posta->attributes()->erakutsi=="bai"){
          $posta = $bisita[0]->posta[0];
        }else{
          $posta = "-";
        }
        echo "<td>$posta</td>";
        $iruzkina = $bisita[0]->iruzkina[0];
        echo "<td>$iruzkina</td>";

        echo "</tr>";
      }
    }
    if (!$aurkitua) {
      echo "<tr><td>-</td><td>-</td><td>-</td></tr>";
    }
  }else{
    echo "<tr><td>-</td><td>-</td><td>-</td></tr>";
  }
 ?>
 </tbody>
</table>
