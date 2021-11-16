<html>
	<head>
		<title>SZA 3.Gaiko lehen laborategia</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../stylesheet/iruzkinak_ikusi.css"/>
		<link rel="stylesheet" type="text/css" href="../stylesheet/navigation.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src='../scripts/iruzkin_osoa_ajax.js'></script>
	</head>
	<body>
		<header class="home">
			<nav class="navBar">
				<a class="active" href="../html/main.html">BISITA-LIBURUA</a>
				<a href="../html/iruzkinak_sartu.html">Iruzkinak Sartu</a>
				<a href="iruzkinak_ikusi.php">Iruzkinak Ikusi</a>
				<div class="navRight">
					<a href="../html/about_us.html">ABOUT US</a>
				</div>
			</nav>
		</header>
		<section class="table_section" id="table_section">
			<div class="table_container">
				<h1 class="titulu1">IRUZKINAK</h1>
				<h4>(iruzkinetan klik egin gehiago/gutxiago ikusteko)</h4>
				<table class="taula">
					<thead>
						<tr>
							<th>Data</th><th>Izena</th><th>Posta</th><th>Iruzkina</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$bisitak = simplexml_load_file('../xml/bisita_liburua.xml');
							$iruz = 0;
							foreach ($bisitak-> children() as $bisita){
								$iruz += 1;

								echo "<tr>";
								$data = $bisita[0]->data[0];
								echo "<td>$data</td>";
								$izena = $bisita[0]->izena[0];
								echo "<td>$izena</td>";
								if(isset($bisita[0]->posta[0]) && $bisita->posta->attributes()->erakutsi=="bai"){
									$posta = $bisita[0]->posta[0];
								}else{
									$posta = "-";
								}
								echo "<td>$posta</td>";
								$iruzkina = $bisita[0]->iruzkina[0];
								if(strlen($iruzkina) > 20){
									$iruzkina = substr($iruzkina, 0, 17)."...";
									echo "<td id='$iruz' onclick='iruzkinOsoa($iruz)'>$iruzkina</td>";
								}else {
									echo "<td>$iruzkina</td>";
								}

								echo "</tr>";
							}
						 ?>
					</tbody>
				</table>
				<br><hr width="300px"><br>
				<form class="formularioa" name="formularioa" enctype="multipart/form-data" method="post" action="../php/iruzkinak_ikusi.php">
					<label for='izena'>Erabiltzailearen izena adierazi: </label>
			    <input type='text' name='izena' id='izena' value=""><br><br>

					<input type='submit' name='bidali' id='bidali' value='Erabiltzailearen iruzkinak ikusi'>
				</form>

				<?php include 'erabiltzaile_taula.php' ?>

			</div>
		</section>
	</body>
</html>
