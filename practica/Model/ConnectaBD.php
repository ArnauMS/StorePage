<?php
/* model encarregat de connectar-se amb la base de dades*/
    $servidor = "localhost";
    $usuari = "root";
    $clau = "";
    $BD = "basededadesbr";

    try{
        $connexio = new PDO("mysql:host=$servidor;dbname=$BD;charset=UTF8", $usuari, $clau);
    }catch(PDOException $e){
        die('Ha fallat la connexió: '.$e->getMessage());
    }
?>