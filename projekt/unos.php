<?php
	include 'povezi.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>unos.php</title>
		<meta charset = "utf-8">
		
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
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
		
		<section>
			<form enctype = "multipart/form-data" name = "nova_vijest" action = "" method = "POST">
				<div class = "odabir_naslova">
					<label for = "naslov">Naslov vijesti:</label>
					 <input type = "text" name = "naslov" id = "naslov">
					 
					 <span id = "za_naslov"></span>
				</div>
				
				<div class = "odabir_sazetka">
					<label for = "sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
					<textarea name = "sazetak" id = "sazetak" cols = "30" rows = "10"></textarea>
					
					<span id = "za_sazetak"></span>
				</div>
				
				<div class = "odabir_sadrzaja">
					<label for = "sadrzaj">Sadržaj vijesti:</label>
					<textarea name = "sadrzaj" id = "sadrzaj" cols = "30" rows = "10"></textarea>
					
					<span id = "za_sadrzaj"></span>
				</div>
				
				<div class = "odabir_kategorije">
					<label for = "kategorija">Odaberite vrstu sadrzaja:</label>
					<select name = "kategorija" id = "kategorija">
						<option value = "" disabled selected>Odabir...</option>
						<option value = "sport">Sport</option>
						<option value = "kultura">Kultura</option>
					</select>
					
					<span id = "za_kategoriju"></span>
				</div>
				
				<div class = "odabir_slike">
					<label for = "slika">Odaberite sliku:</label>
					<input type = "file" name = "slika" id = "slika" accept = "projekt/img/*">
				
					<span id = "za_sliku"></span>
				</div>
				
				<div class = "arhiva_vijesti">
					<label for = "arhiva">Želite li arhivirati vijest?</label>
					<input type = "checkbox" name = "arhiva" id = "arhiva">
				</div>
				
				<div class = "slanje">
					<input type = "reset" value = "Poništi">
					<input type = "submit" id = "posalji" name = "posalji" value = "Pošalji">
				</div>
			</form>
			
			<?php
				if(isset($_POST['naslov']) && isset($_POST['sazetak']) && isset($_POST['sadrzaj']) && isset($_POST['kategorija']) && isset($_FILES['slika']['name'])){
					$naslov = $_POST['naslov'];
					$sazetak = $_POST['sazetak'];
					$sadrzaj = $_POST['sadrzaj'];
					$kategorija = $_POST['kategorija'];
					$slika = $_FILES['slika']['name'];
					$datum = date('d.m.Y');
					
					$query = "INSERT INTO vijesti (datum, naslov, sazetak, sadrzaj, slika, kategorija)
												VALUES ('$datum','$naslov','$sazetak','$sadrzaj','$slika' ,'$kategorija')";
					$result = mysqli_query($dbc, $query);
					
					if(!isset($_POST['arhiva'])){
						$query = "UPDATE vijesti SET arhiva = 0 WHERE naslov = '$naslov'";
						$result = mysqli_query($dbc, $query);
					}
					
					else{
						echo "<p>Podaci su arhivirani!</p>";
						$query = "UPDATE vijesti SET arhiva = 1 WHERE naslov = '$naslov'";
						$result = mysqli_query($dbc, $query);
					}
					mysqli_close($dbc);
				}
			?>
		</section>
		
		
		<script	type = "text/javascript">
			document.getElementById("posalji").onclick = function(event){
				var slanje = true;
				
				//Naslov (5-30 znakova)
				var poljeNaslov = document.getElementById("naslov");
				if(poljeNaslov.value.length < 5 || poljeNaslov.value.length > 30){
					slanje = false;
					poljeNaslov.style.border = "1px dashed red";
					document.getElementById("za_naslov").innerHTML = "Naslov vijesti mora imati između 5 i 30 znakova!";
				}
				
				else{
					poljeNaslov.style.border="1px solid green";
					document.getElementById("za_naslov").innerHTML = "";
				}
				
				
				
				//Sažetak (10-100 znakova)
				var poljeSazetak = document.getElementById("sazetak");
				if(poljeSazetak.value.length < 10 || poljeSazetak.value.length > 50){
					slanje = false;
					poljeSazetak.style.border = "1px dashed red";
					document.getElementById("za_sazetak").innerHTML = "Sazetak mora imati između 10 i 50 znakova!";
				}
				
				else{
					poljeSazetak.style.border="1px solid green";
					document.getElementById("za_sazetak").innerHTML = "";
				}
				
				
				
				//Sadržaj
				var poljeSadrzaj = document.getElementById("sadrzaj");
				if(poljeSadrzaj.value.length == 0){
					slanje = false;
					poljeSadrzaj.style.border = "1px dashed red";
					document.getElementById("za_sadrzaj").innerHTML = "Sadrzaj mora biti unesen!";
				}
				
				else{
					poljeSadrzaj.style.border="1px solid green";
					document.getElementById("za_sadrzaj").innerHTML = "";
				}
				
				
				
				
				//Slika
				var poljeSlika = document.getElementById("slika");
				if(poljeSlika.value.length == 0){
					slanje = false;
					poljeSlika.style.border = "1px dashed red";
					document.getElementById("za_sliku").innerHTML = "Slika mora biti unesena!";
				}
				
				else{
					poljeSlika.style.border = "1px solid green";
					document.getElementById("za_sliku").innerHTML = "";
				}
				
				
				
				
				//Kategorija
				var poljeKategorija = document.getElementById("kategorija");
				if(poljeKategorija.selectedIndex == 0){
					slanje = false;
					poljeKategorija.style.border = "1px dashed red";
					document.getElementById("za_kategoriju").innerHTML = "Kategorija mora biti odabrana!";
				}
				
				else{
					poljeKategorija.style.border = "1px solid green";
					document.getElementById("za_kategoriju").innerHTML = "";
				}
				
				
				
				if(!slanje){
					event.preventDefault();
				}
			}
		</script>
		
		
		<footer>
			<div class = "footer">
				<p>Weitere Online-Angebote der Axel Springer SE:</p>
				<p>Dominik Šparavec, dsparavec@tvz.hr, 2023</p>
			</div>
		</footer>
	</body>
</html>