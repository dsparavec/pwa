<?php
	include 'povezi.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>administrator.php</title>
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
		
		<main class = "admin">
			<section>
				<?php
					if(isset($_SESSION['prijava'])){
						$query = "SELECT * FROM vijesti";
						$result = mysqli_query($dbc, $query);
						
						echo '<a href = "unos.php"><button>Unesi novu vijest</button></a>';
						
						echo '<form  method = "POST" action = ""><button type = "submit" name = "gumb">Odjava</button></form>';
						
						if(isset($_POST['gumb'])){
							session_destroy();
							header("Refresh:0");
						}
						
						while($row = mysqli_fetch_array($result)){
							echo '<form enctype = "multipart/form-data" action = "" method = "POST">
										<div class = "odabir_naslova">
											<label for = "naslov">Naslov vijesti:</label>									 
											<input type = "text" name = "naslov" id = "naslov" value = "'.$row['naslov'].'">
										</div>
										
										
										<div class = "odabir_sazetka">
											<label for = "sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
											<textarea name = "sazetak" id = "sazetak" cols = "30" rows = "10" maxlength = "50">'.$row['sazetak'].'</textarea>
										</div>
										
										
										<div class = "odabir_sadrzaja">
											<label for = "sadrzaj">Sadržaj vijesti:</label>
											<textarea name = "sadrzaj" id = "sadrzaj" cols = "30" rows = "10">'.$row['sadrzaj'].'</textarea>
										</div>
										
										
										<div class = "odabir_kategorije">
											<label for = "kategorija">Odaberite vrstu sadrzaja:</label>
											<select name = "kategorija" id = "kategorija" value = "'.$row['kategorija'].'">
												<option value = "sport">Sport</option>
												<option value = "kultura">Kultura</option>
											</select>
										</div>
										
										
										<div class = "odabir_slike">
											<label for = "slika">Odaberite sliku:</label>
											<input type = "file" name = "slika" id = "slika" value = "'.$row['slika'].'"><br>
											<figure><img src = "img/'.$row['slika'].'"></figure>
										</div>
										
										
										<div class = "arhiva_vijesti">
											<label for = "arhiva">Želite li arhivirati vijest?</label>';
											if($row['arhiva'] == 0){
												echo '<input type = "checkbox" name = "arhiva" id = "arhiva">';
											}
											else{
												echo '<input type = "checkbox" name = "arhiva" id = "arhiva" checked>';
											}
											
											
										echo '</div>
										<div class = "slanje">
											<input type = "hidden" name="id" class="id_vijesti" value="'.$row['id'].'">
											
											<input type = "reset" value = "Poništi">
											<input type = "submit" name = "izmjeni" value = "Prihvati">
											<input type = "submit" name = "izbrisi" value = "Izbriši">
										</div>
									</form>';
						}
						
					}
					
					
					
					else{
						echo '<form action = "" method = "POST">
								<div class = "kime">
									<label for = "kime">Korisničko ime:</label>
									<input type = "text" name = "kime" id = "kime">
								</div>
								
								<div class = "lozinka">
									<label for = "lozinka">Lozinka:</label>
									<input type = "password" name = "lozinka" id = "lozinka">
								</div>
								<input type = "submit" value = "Prijavi me"/>
								
							</form>
							<a href="registracija.php"><button>Registriraj se</button></a>';
							
							if(isset($_POST['kime']) && isset($_POST['lozinka'])){
								$kime = $_POST['kime'];
								$lozinka = $_POST['lozinka'];
								
								$query = "SELECT * FROM korisnik
										  WHERE korisnicko_ime = '$kime'";
										  
								$result = mysqli_query($dbc, $query);
								
								$row = mysqli_fetch_array($result);
								
								
								if($row['korisnicko_ime'] == $kime && password_verify($lozinka,$row['lozinka'])){
									
									if($row['razina'] == 0){
										echo 'Nemate dovoljna prava za pristup ovoj stranici';
										$_SESSION['prijava'] = false;
									}
									
									else{
										$_SESSION['prijava'] = true;
										header("Refresh:0");
									}
								}
								
								else{
									echo '<p>Ne postoji traženi korisnik, potrebna je registracija.</p>';
								}
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
<?php
	if(isset($_POST['izbrisi'])){
		$id = $_POST['id'];
		$query = "DELETE FROM vijesti WHERE id = $id";
		$result = mysqli_query($dbc, $query);
	}
	
	if(isset($_POST['izmjeni'])){
		$id = $_POST['id'];
		$naslov = $_POST['naslov'];
		$sazetak = $_POST['sazetak'];
		$sadrzaj = $_POST['sadrzaj'];
		$kategorija = $_POST['kategorija'];
		$datum = date('d.m.Y');
		$slika = $_FILES['slika']['name'];
		
		if(isset($_POST['arhiva'])){
			$arhiva = 1;
		}
		
		else{
			$arhiva = 0;
		}
		
		$query = "UPDATE vijesti 
				  SET datum = '$datum',
				  sazetak = '$sazetak',
				  sadrzaj = '$sadrzaj',
				  slika = '$slika',
				  kategorija = '$kategorija',
				  arhiva = $arhiva
				  WHERE id = $id";
		$result = mysqli_query($dbc, $query);
	}
?>