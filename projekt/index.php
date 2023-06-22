<?php
	include 'povezi.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>index.php</title>
		<meta charset = "utf-8">
		
		<link rel = "stylesheet" type = "text/css" href = "style.css">
	</head>
	
	<body>
		<header>
			<!-- <figure>
				<img src = "img/RP_logo.png">
			</figure> -->
			<nav>
				<figure>
					<img src = "img/RP_logo.png">
				</figure>
				<ul>
					<li class="right"><a href="administrator.php">ADMINISTRACIJA</a></li>
					<li class="right"><a href="kategorija.php?id=kultura">KULTURA</a></li>
					<li class="right"><a href="kategorija.php?id=sport">SPORT</a></li>
					<li class="right"><a href="#">HOME</a></li>
				</ul>
			</nav>
		</header>
		
		<main>
			<section class = "sport" name = "sport" id = "sport">
				<h2>Sport</h2>
				<?php
					$query = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'sport'
								LIMIT 3";
					$result = mysqli_query($dbc, $query);
					
					while($row = mysqli_fetch_array($result)){
						echo "
							<article>
								<figure><img src = 'img/".$row['slika']."'></figure>
								<h3><a href = 'clanak.php?id=".$row['id']."'>".$row['naslov']."</a></h3>
								<p>".$row['sazetak']."</p>
							</article>
						";
					}
				?>
			</section>
		
			<section class = "kultura" name = "kultura" id = "kultura">
				<h2>Politika</h2>
				<?php
					$query = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'kultura'
								LIMIT 3";
					$result = mysqli_query($dbc, $query);
					
					while($row = mysqli_fetch_array($result)){
						echo "
							<article>
								<figure><img src = 'img/".$row['slika']."'></figure>
								<h3><a href = 'clanak.php?id=".$row['id']."'>".$row['naslov']."</a></h3>
								<p>".$row['sazetak']."</p>
							</article>
						";
					}
				?>
			</section>
		</main>
		
		
		<footer>
			<div class = "footer">
				<p>Weitere Online-Angebote der Axel Springer SE:</p>
				<p>Dominik Šparavec, dsparavec@tvz.hr, 2023</p>
			</div>
		</footer>
	</body>
</html>