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
	<h1 style="color:gold">Pretraga:</h1> <br>
	<table style="color:gold" cellpadding="5px" cellspacing="5px">
	<form action="pregled.php" method="POST">
	<tr>
		<th>Marka:</th>
		<td><select name="marka">
				<option value="%">Odaberi</option>	
		<?php
		$upit = "Select * from auta group by marka";
		$podaci = mysqli_query($konekcija,$upit);
		foreach($podaci as $podatak){
				echo "<option value='" . $podatak['marka'] . "'>" . $podatak['marka'] . "</option>";
		}
		?>
		</select>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<th>Godište: </th>
		<td>od &nbsp;&nbsp; <input type="text" name="odGod"></td>
		<td>do &nbsp;&nbsp;<input type="text" name="doGod"></td>
	</tr>
	<tr>
		<th>Gorivo:</th>
		<td><select name="gorivo">
				<option value="%">Odaberi</option>
				
		<?php
		$upit = "Select * from auta group by gorivo";
		$podaci = mysqli_query($konekcija,$upit);
		foreach($podaci as $podatak){
				echo "<option value='" . $podatak['gorivo'] . "'>" . $podatak['gorivo'] . "</option>";
		}
		?>
		</select>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<th>Cijena: </th>
		<td>od &nbsp;&nbsp; <input type="text" name="odCijena"></td>
		<td>do &nbsp;&nbsp;<input type="text" name="doCijena"></td>
	</tr>
	<tr>
	<th></th>
	<td></td>
	<td><input type="submit" value="Pretraži" name="potvrdi"></td>
	</tr>
	</form>
	</table>
	<br><br><br>
	<?php
	if(isset($_POST['potvrdi'])){	
		$marka = $_POST['marka'];
		$gorivo = $_POST['gorivo'];
		if($_POST['odGod']!=NULL){
			$odGod = $_POST['odGod'];
		}else{
			$odGod = 0;
		}
		if($_POST['doGod']!=NULL){
			$doGod = $_POST['doGod'];
		}else{
			$doGod = 3000;
		}
		if($_POST['odCijena']!=NULL){
			$odCijena = $_POST['odCijena'];
		}else{
			$odCijena = 0;
		}
		if($_POST['doCijena']!=NULL){
			$doCijena = $_POST['doCijena'];
		}else{
			$doCijena = 1000000;
		}
		$upit = "SELECT * FROM auta where marka like '$marka' and gorivo like '$gorivo' and godProiz > '$odGod' and godProiz < '$doGod' and cijena > '$odCijena' and cijena < '$doCijena'";
		}else{
		$upit = "SELECT * FROM auta";
		}		
		
		$podaci = mysqli_query($konekcija,$upit);
		$red = mysqli_fetch_array($podaci);
		echo "<table align='center';  border='3' cellspacing='0' style='postion:center; left:150px; border-style: bold; border-color:gold; background:black; color:gold; cellpadding:0px; font-size:20px'>";
		if(sizeOf($red)==0){
			echo "<tr><td>Automobil sa zadanom pretragom ne postoji u bazi</td></tr>";
		}else{
		echo "<tr><td width='90px' align='center'>Marka</td>
				  <td width='50px' align='center'>Model</td>
				  <td width='50px' align='center'>Godište</td>
				  <td width='40px' align='center'>kW</td>
				  <td width='100px' align='center'>Kilometraža</td>
				  <td width='60px' align='center'>Boja</td>
				  <td width='60px' align='center'>Vrsta goriva</td>
				  <td width='60px' align='center'>Cijena</td>
				  <td align='center'>Slika</td>
			 </tr>";
		foreach($podaci as $podatak){
			echo "<tr align='center'>";
			echo "<td>" . $podatak['marka'] . "</td>";
			echo "<td>" . $podatak['model'] . "</td>";
			echo "<td>" . $podatak['godProiz'] . "</td>";
			echo "<td>" . $podatak['kw'] . "</td>";
			echo "<td>" . $podatak['km'] . "</td>";
			echo "<td>" . $podatak['boja'] . "</td>";
			echo "<td>" . $podatak['gorivo'] . "</td>";
			echo "<td>" . $podatak['cijena'] . "</td>";
			echo "<td><a href='../images/" . $podatak['link'] . "'><img src='../images/" . $podatak['link'] . "' width='100px' height='80px'></a></td></tr>";
		}
		}
	?>
  </header>
</div>
</body>
</html>