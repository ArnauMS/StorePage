<?php
/* model de les categories on es fa una consulta a la base de dades per agafar totes les 
categories que existeixen*/
    function consultaCategories($connexio){
        try{
            $consulta = $connexio->prepare("SELECT Nom, Id FROM categories");
            $consulta->execute();
            $resultats = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        return($resultats);
    }
?>