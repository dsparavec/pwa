<?php
	$naslov = $_POST['naslov'];
	$sazetak = $_POST['sazetak'];
	$sadrzaj = $_POST['sadrzaj'];
	$kategorija = $_POST['kategorija'];
	
	$datum = date('d.m.Y');
	
	$slika = $_FILES['slika']['name'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>skripta.php</title>
		<meta charset = "utf-8">
		
		<link rel = "stylesheet" type = "text/css" href = "style.css">
	</head>
	<body class = "clanak">
		<header>
			<figure>
				<img src = "img/BZ_logo.png">
			</figure>
			<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="">SPORT</a></li>
					<li><a href="">KULTURA</a></li>
					<li><a href="unos.html">UNOS VIJESTI</a></li>
				</ul>
			</nav>
		</header>
		
		<main>
			<section>
				<?php
					
					include 'povezi.php';
					
					$query = "INSERT INTO vijesti (datum, naslov, sazetak, sadrzaj, slika, kategorija)
								VALUES ('$datum','$naslov','$sazetak','$sadrzaj','$slika' ,'$kategorija')";
					$result = mysqli_query($dbc, $query);
				
					if(!isset($_POST['arhiva'])){
						echo "
							<article>
							<p class = 'kategorija'>$kategorija</p>
							<h1>$naslov</h1>
							<figure>
								<img src='img/$slika'>
								<figcaption>$sazetak</figcaption>
							</figure>
							<p>$sadrzaj</p>
							</article>
						";
						$query = "UPDATE vijesti SET arhiva = 0 WHERE naslov = '$naslov'";
						$result = mysqli_query($dbc, $query);
					}
					
					else{
						echo "Podaci su arhivirani, povratak na <a href='index.php'>HOME</a>";
						$query = "UPDATE vijesti SET arhiva = 1 WHERE naslov = '$naslov'";
						$result = mysqli_query($dbc, $query);
					}
					mysqli_close($dbc);
				?>
			</section>
		</main>
		
		<footer>
			<div class = "footer">
				<p>Weitere Online-Angebote der Axel Springer SE:</p>
			</div>
		</footer>
	</body>
</html>