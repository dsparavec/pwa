<?php
	include 'povezi.php';
	
	$kategorija = $_GET['id'];
	$query = "SELECT * FROM vijesti 
				WHERE kategorija = '$kategorija'
				AND arhiva = 0";
	$result = mysqli_query($dbc,$query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>kategorija.php</title>
		<meta charset = "utf-8">
		
		<link rel = "stylesheet" type = "text/css" href = "style.css">
	</head>
	
	<body class = "kategorija">
		<header>
			<figure>
				<img src = "img/BZ_logo.png">
			</figure>
			<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="kategorija.php?id=sport">SPORT</a></li>
					<li><a href="kategorija.php?id=kultura">KULTURA</a></li>
					<li><a href="administrator.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</header>
		
		
		<main>
			<section>
				<?php
					while($row = mysqli_fetch_array($result)){
						echo '<article>
								<figure><img src = "img/'.$row['slika'].'"></figure>
								<div class = "section-wrapper">
									<h3><a href="clanak.php?id='.$row['id'].'">'.$row['naslov'].'</a></h3>
									<p>'.$row['sazetak'].'</p>
								</div>
							</article>';
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