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
        <li><a  style="color:gold" href="pregled.php">Pregled</a></li>
        <li class="last"><a style="color:gold" href="#">Administrator</a></li>
      </ul>
    </nav>
	<br><hr>
	<table>
	<?php
	if(!isSet($_POST['login'])){	
	?>
	<form  action="administrator.php" method="POST">
		<tr style="color:gold"><th>Korisničko ime</th>
			<td><input type="text" name="korIme"></td></tr>
		<tr style="color:gold"><th>Šifra</th>
			<td><input type="password" name="sifra"></td></tr>
		<tr style="color:gold" ><th></th><td><input type="submit" name="login" value="Login"></td></tr>
	</form>
	</table>
	<?php
	}else{
		$postoji = false;
		$upit = "select * from korisnici where administrator='DA'";
		$podaci = mysqli_query($konekcija,$upit);
		foreach($podaci as $podatak){
			if($_POST['korIme']==$podatak['korIme'] and $_POST['sifra']==$podatak['sifra']){
				$postoji = true;
			}
		}
		if($postoji){
		?>
			<form action="izmjene.php" method="POST">
			<table>
				<tr><td><input style="width:200px;height:40px; font-size:20px" type="submit" name="dodaj" value="Dodaj podatke"></td></tr>
				<tr><td><input style="width:200px;height:40px; font-size:20px" type="submit" name="izbrisi" value="Izbriši podatke"></td></tr>
				<tr><td><input style="width:200px;height:40px; font-size:20px" type="submit" name="azuriraj" value="Ažuriraj podatke"></td></tr>
			
			</table>
			</form>
		<?php
		}else{
			?>
			<form action="administrator.php" method="POST">
				<tr><th>Korisničko ime</th>
					<td><input type="text" name="korIme"></td></tr>
				<tr><th>Šifra</th>
					<td><input type="password" name="sifra"></td></tr>
				<tr><th></th><td><input type="submit" name="login" value="Login"></td></tr>
				<tr><th align="center" style="color:red" colspan="2">Pogrešan unos podataka</th></tr>
			</form>
			</table>
			<?php
		}
	}
	?>
  </header>
</div>
</body>
</html>