<?php
    $host = "localhost";
    $name = "root";
    $sifra = "";
    $baza = "rentacar";

    $konekcija = mysqli_connect($host,$name,$sifra,$baza);

    if(!$konekcija){
        die("Problemi sa konekcijom. " . mysqli_connect_error($konekcija));
    }

?>