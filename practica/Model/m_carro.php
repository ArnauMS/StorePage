<?php 
/* model del carro on el que es fa és realitzar primer una comprovació per verificar que es 
volen afegir productes al carro, después una altre per verificar que el producte que es vol afegir
existeix i finalment es mira si aquest producte que es vol afegir ja ha estat afegit o és un producte nou.
En el cas de que ja estigui al carro simplement s'augmenta la quantitat d'aquell producte, i si 
és nou s'inicialitza per possar-lo al carro.*/
    if(isset($_GET['variableAfegir'])) {
        if($_GET['variableAfegir'] == 1) {
            if(isset($producte)){
                $productes = $_SESSION['carro']['productes'];
                $trobat = false;

                foreach($productes as $prod) {
                    if($prod['id'] == $producte) {
                        $trobat = true;
                    }
                }

                if($trobat == true){
                    $_SESSION['carro']['productes'][$producte]['quantitat'] += 1;
                    $_SESSION['carro']['preuTotal'] = getPreuTotal($producte);
                } 
                else{
                    $Nom="";
                    $Preu=0;
                    $Imatge="";
                    foreach($detalls as $f) {
                        $Nom=$f['Nom'];
                        $Preu=$f['Preu'];
                        $Imatge=$f['Imatge1'];
                    }
                    $_SESSION['carro']['productes'][$producte] = array('id'=>$producte,
                                    'nom' => $Nom,
                                    'preu' => $Preu,
                                    'imatge' => $Imatge,
                                    'quantitat'=> 1);
                    $_SESSION['carro']['preuTotal'] = getPreuTotal($producte);
                }
            $_SESSION['carro']['elementsTotal'] += 1;
            }
        }
    } 
?>