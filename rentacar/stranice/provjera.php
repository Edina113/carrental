<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Rent a car</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="../styles/layout.css" type="text/css">

</head>
<body style="background:grey">

<?php include('konekcija.php'); ?>

<div class="wrapper row1">
  <header id="header" class="clear">
  <div   id="hgroup">
      <h8 style="color:gold">C</h8><BR/>
      <h8 style="color:gold">A</h8><BR/>
      <h6 style="color:gold">ROYALS</h6>
      <h8 style="color:gold">E</h8><BR/>
      <h8 style="color:gold">N</h8><BR/>
      <h8 style="color:gold">T</h8>
    </div>
    <nav>
      <ul>
        <li><a style="color:gold" href="../index.php">Početna</a></li>
        <li><a style="color:gold" href="pregled.php">Pregled</a></li>
        <li class="last"><a style="color:gold" href="administrator.php">Administrator</a></li>
      </ul>
    </nav>
	<br><hr>
	<?php
	if(isset($_POST['promijeni'])){
				if($_FILES['slika']['name']){
				$ime = strtolower($_FILES['slika']['name']);
				move_uploaded_file($_FILES['slika']['tmp_name'], '../images/' . $ime);
			}
			$marka = $_POST['marka'];
			$model = $_POST['model'];
			$god = $_POST['godProiz'];
			$kw = $_POST['kw'];
			$km = $_POST['km'];
			$boja = $_POST['boja'];
			$gorivo = $_POST['gorivo'];
			$cijena = $_POST['cijena'];
			$id = $_POST['id'];
			
			$upit = "UPDATE auta set marka='$marka', model='$model', godProiz='$god', kw=$kw,km=$km,boja='$boja',gorivo='$gorivo',cijena=$cijena,link='$ime' where ID=$id";
			
			mysqli_query($konekcija,$upit);
			?>
			
			<form action="izmjene.php" method="post">
			
			<input type="submit" name="promijeni" value="Vrati se">
			</form>
			
			<?php
			
			}
			?>
	
  </header>
</div>
</body>
</html>
