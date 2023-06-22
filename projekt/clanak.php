<?php
	include 'povezi.php';
	$query = "SELECT * FROM vijesti WHERE id = $_GET[id]";
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>clanak.php</title>
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
					<li><a href="kategorija.php?id=sport">SPORT</a></li>
					<li><a href="kategorija.php?id=kultura">KULTURA</a></li>
					<li><a href="administrator.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</header>
		
		<main>
			<section>
				<article>
					<h2><?php echo $row['kategorija'];?></h2>
					<h1><?php echo $row['naslov'];?></h1>
					<figure><img src="img/<?php echo $row['slika'];?>">
						<figcaption><?php echo $row['sazetak'];?></figcaption>
					</figure>
					<p><?php echo $row['sadrzaj'];?></p>
				</article>
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