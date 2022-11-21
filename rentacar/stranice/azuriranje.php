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
		if(isset($_POST['azuriraj'])){
		$id = $_POST['id'];
		$upit = "SELECT * FROM auta where ID=$id";
		$podaci = mysqli_query($konekcija,$upit);
		$red = mysqli_fetch_array($podaci);
		foreach($podaci as $podatak){
			$marka = $podatak['marka'];
			$model = $podatak['model'];
			$godProiz = $podatak['godProiz'];
			$kw = $podatak['kw'];
			$km = $podatak['km'];
			$boja = $podatak['boja'];
			$gorivo = $podatak['gorivo'];
			$cijena = $podatak['cijena'];
		}
	?>
				<form action="provjera.php" method="POST" enctype="multipart/form-data" >
		<table >
			<tr>
			<th>Marka: </th>
			<td><input type="text" value="<?php echo $marka ?>" name="marka"></td>
			</tr>
			<tr>
			<th>Model: </th>
			<td><input type="text" value="<?php echo $model ?>" name="model"></td>
			</tr>
			<tr>
			<th>Godina proizvodnje: </th>
			<td><input type="text" value="<?php echo $godProiz ?>" name="godProiz"></td>
			</tr>
			<tr>
			<th>kW: </th>
			<td><input type="text" value="<?php echo $kw ?>" name="kw"></td>
			</tr>
			<tr>
			<th>Pređenih kilometara: </th>
			<td><input type="text" value="<?php echo $km ?>" name="km"></td>
			</tr>
			<tr>
			<th>Boja: </th>
			<td><input type="text" value="<?php echo $boja ?>" name="boja"></td>
			</tr>
			<tr>
			<th>Gorivo: </th>
			<td><input type="text" value="<?php echo $gorivo ?>" name="gorivo"></td>
			</tr>
			<tr>
			<th>Cijena: </th>
			<td><input type="text" value="<?php echo $cijena ?>" name="cijena"></td>
			</tr>
			<tr>
			<th>Slika: </th>
			<td><input type="file" name="slika"></td>
			</tr>
			<tr>
			<th><input type="hidden" name="id" value="<?php echo $id ?>"></th>
			<td><input type="submit" name="promijeni" value="Ažuriraj"></td>
			</tr>
		</table>
		</form>
	<?php		
		}else{
			header("location:javascript://history.go(-1)");
		}
	?>
  </header>
</div>
</body>
</html>
