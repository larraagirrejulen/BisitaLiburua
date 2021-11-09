<html>
	<head>
		<title>SZA 3.Gaiko lehen laborategia</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../stylesheet/iruzkinak_ikusi.css"/>
		<link rel="stylesheet" type="text/css" href="../stylesheet/navigation.css"/>
		<script src='../scripts/formularioa_balioztatu.js'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
				<table class="taula">
					<thead>
						<tr>
							<th>Data</th><th>Izena</th><th>Posta</th><th>Iruzkina</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$bisitak = simplexml_load_file('../xml/bisita_liburua.xml');
							foreach ($bisitak-> children() as $bisita){

									$data = $bisita["data"];
									$izena = $bisita["izena"];
									$iruzkina = $bisita["iruzkina"];

									echo "<tr>";
									echo "<td>$data</td><td>$izena</td><td>$iruzkina</td>";
									echo "</tr>";
							}
						 ?>
						<tr>
							<td>Julen</td><td>julen@gmail.com</td><td>iruzkin1</td>
						</tr>
						<tr>
							<td>Xabier</td><td>xabier@gmail.com</td><td>iruzkin2</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
	</body>
</html>
