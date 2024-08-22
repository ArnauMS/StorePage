<?php
/* model on es fa una consulta a la base de dades on ens permetrá mostrar tots els productes existens 
en una determinada categoria.*/
    function consultaProductes($connexio, $categoria){
        try{
            $consulta = $connexio->prepare("SELECT * FROM productes WHERE CategoriaId =" .$categoria);
            $consulta->execute();
            $resultats = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        return($resultats);
    }
?>