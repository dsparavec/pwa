<?php
	include 'povezi.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>registracija.php</title>
		<meta charset = "utf-8">
		
		<link rel = "stylesheet" type = "text/css" href = "style.css">
	</head>
	
	<body>
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
			<section class = "registracija">
				<form method = "POST" action="">
					<div class="ime">
						<label for = "ime">Ime:</label>
						<input type = "text" name = "ime" id = "ime" required />
					</div>

					<div class="prezime">
						<label for = "ime">Prezime:</label>
						<input type = "text" name = "prezime" id = "prezime" required />
					</div>
					
					<div class = "korisnicko_ime">
						<label for = "kime">Korisničko ime:</label>
						<input type = "text" name = "kime" id = "kime" required />
					</div>
					
					<div class = "korisnicko_ime">
						<label for = "lozinka">Lozinka:</label>
						<input type = "password" name = "lozinka" id = "lozinka" required />
					</div>
					
					<div class = "korisnicko_ime">
						<label for = "ponloz">Ponovljena lozinka:</label>
						<input type = "password" name = "ponloz" id = "ponloz" required />
					</div>
					<input type="submit" value = "Registriraj me">
				</form>
				
				<?php
					if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['kime']) && isset($_POST['lozinka']) && isset($_POST['ponloz'])){
						$ime = $_POST['ime'];
						$prezime = $_POST['prezime'];
						$kime = $_POST['kime'];	
						$lozinka = $_POST['lozinka'];
						$ponloz = $_POST['ponloz'];
						$razina = 0;
						
						if($lozinka == $ponloz){
							$hash_lozinka = password_hash($lozinka, CRYPT_BLOWFISH);
						
							$query = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina)
										VALUES (?, ?, ?, ?, ?)";
							
							$stmt = mysqli_stmt_init($dbc);
							if(mysqli_stmt_prepare($stmt, $query)){
								mysqli_stmt_bind_param($stmt,'ssssi', $ime, $prezime, $kime, $hash_lozinka, $razina);
								mysqli_stmt_execute($stmt);
							}
						}
						
						else{
							echo '<p>Lozinke se ne podudaraju!</p>';
						}
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