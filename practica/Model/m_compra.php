<?php
/* model encarregat de desar a la base de dades la informació sobre la compra. Primer es fa una 
comprovació per veure que existeix una petició de compra i después es mira de que al carro 
hi han productes i de que s'ha iniciat sessió. Un cop mirat aixo es desen les dades bàsiques a la
base de dades i después mirem el número de la comanda que s'acaba de fer de tal forma que 
guardem els productes a la base de dades amb aquest número de comanda.*/
function confirmacio($connexio) {
    if(isset($_GET['compra'])) {
        if($_GET['compra'] == 1) {
            if (($_SESSION['carro']['preuTotal'] != 0) && ($_SESSION['carro']['elementsTotal'] != 0) && (isset($_SESSION['usuariId']))) {
                $sql = "INSERT INTO comanda (Data, PreuTotal, ElementsTotal, UsuariId) VALUES (:data, :preuTotal, :elementsTotal, :usuariId)";
                $statment = $connexio->prepare($sql);
                $data = date("Y-n-d");
                $statment->bindParam(':data', $data);
                $statment->bindParam(':preuTotal',$_SESSION['carro']['preuTotal']);
                $statment->bindParam(':elementsTotal',$_SESSION['carro']['elementsTotal']);
                $statment->bindParam(':usuariId',$_SESSION['usuariId']);
                $statment = $statment->execute();

                $consulta = $connexio->prepare("SELECT Id FROM comanda WHERE UsuariId =".$_SESSION['usuariId']);
                $consulta->execute();
                $comandaID = $consulta->fetchAll(PDO::FETCH_ASSOC);
                $ComandaId = end($comandaID);
                $ComandaId = implode($ComandaId);

                foreach($_SESSION['carro']['productes'] as $product) {
                    $sql1 = "INSERT INTO lineescomanda (Quantitat, Nom, Preu, Imatge, ComandaId, ProducteId) VALUES (:Quantitat, :Nom, :Preu, :Imatge, :ComandaId, :ProducteId)";
                    $comprar = $connexio->prepare($sql1);
                    $comprar->bindParam(':Quantitat', $product['quantitat']);
                    $comprar->bindParam(':Nom',$product['nom']);
                    $comprar->bindParam(':Preu',$product['preu']);
                    $comprar->bindParam(':Imatge',$product['imatge']);
                    $comprar->bindParam(':ComandaId',$ComandaId);
                    $comprar->bindParam(':ProducteId',$product['id']);
                    $comprar = $comprar->execute();
                }

                if ($statment && $comprar) {
                    return true;   
                } else {
                    return false;
                }
            }
        }
    }
}
?>