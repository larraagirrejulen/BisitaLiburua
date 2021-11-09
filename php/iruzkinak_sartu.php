<html>
	<head>
		<title>Bisita-Liburua</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../stylesheet/iruzkinak_sartu_php.css"/>
		<link rel="stylesheet" type="text/css" href="../stylesheet/navigation.css"/>
		<script src='../scripts/formularioa_balioztatu.js'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
      function formularioa_balioztatu($izena, $iruzkina, $posta) {
        if(strlen($izena) > 0 && strlen($iruzkina) > 0){
          if($posta != null){
            if(preg_match("/^[A-Za-z]+\.?[A-Za-z]*@[a-z]+\.[a-z]+$/", $posta)){
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
	</head>
	<body>
		<header class="home">
			<nav class="navBar">
				<a class="active" href="../html/main.html">BISITA-LIBURUA</a>
				<a href="../html/iruzkinak_sartu.html">Iruzkinak Sartu</a>
				<a href="../html/iruzkinak_ikusi.html">Iruzkinak Ikusi</a>
				<div class="navRight">
					<a href="../html/about_us.html">ABOUT US</a>
				</div>
			</nav>
		</header>
		<section class="section" id="section">
      <div class="content_container">
        <?php
           $baliozkoak = 0;
           if (isset($_POST["izena"]) && isset($_POST["iruzkina"])) {
             $izena = $_POST["izena"];
             $iruzkina = $_POST["iruzkina"];
             if(isset($_POST["posta"])){
               $posta = $_POST["posta"];
             }else {
               $posta = null;
             }
             $baliozkoak = formularioa_balioztatu($izena, $iruzkina, $posta);
           }

           if($baliozkoak){
             echo "<p>parametroak ondo</p>";
						 try {
                $bisitak = simplexml_load_file('../xml/bisita_liburua.xml');
								$bisitak->attributes()->azkenid = ((int) $bisitak->attributes()->azkenid) + 1;
                $bisita = $bisitak->addChild('bisita');
								$bisita -> addAttribute('id', $bisitak->attributes()->azkenid);
                $bisita -> addChild('data', date("m-d-Y h:i:s"));
                $bisita -> addChild('izena', $izena);
								$bisita -> addChild('iruzkina', $iruzkina);
								if($posta != null){
									$posta = $bisita -> addChild('posta', $posta);
									if(isset($_POST["publikoa"])){
										$erakutsi = "bai";
									}else {
										$erakutsi = "ez";
									}
									$posta -> addAttribute('erakutsi', $erakutsi);
								}

                $domxml = new DOMDocument('1.0');
                $domxml->preserveWhiteSpace = false;
                $domxml->formatOutput = true;
                $domxml->loadXML($bisitak->asXML());
                $domxml->save('../xml/bisita_liburua.xml');

								echo "<p>Datuak ondo gorde dira XML fitxategian</p>";

              } catch (Exception $e){
                echo "<p>Errorea izan da datuak XML fitxategian gordetzean!</p>";
              }

           }else{
						 echo "<p>parametroak gaizki!</p>";
					 }
         ?>
      </div>
		</section>
	</body>
</html>
