<?php
/* model de mostrar comandes on es fa una consulta a la base de dades per agafar les dades sobre les compres
que ha realizat l'usuari*/
    function consultaCompres($connexio){
        try{
            $consulta = $connexio->prepare("SELECT l.Quantitat, l.Nom, l.Preu, l.Imatge, c.PreuTotal, c.Id FROM lineescomanda l, comanda c WHERE l.ComandaId = c.Id AND c.UsuariId =".$_SESSION['usuariId']);
            $consulta->execute();
            $resultats = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        return($resultats);
    }
?>