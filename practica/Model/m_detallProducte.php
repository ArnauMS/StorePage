<?php
/*model on es fa una consulta a la base de dades per agafar tots els detalls d'un producte en concret 
i después poder-los mostrar.*/
    function consultaDetallsProducte($connexio, $id){
        try{
            $consulta = $connexio->prepare("SELECT * FROM productes WHERE Id =".$id);
            $consulta->execute();
            $detalls = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        return($detalls);
    }
?>