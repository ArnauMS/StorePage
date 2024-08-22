<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/cssComandes.css" />
        
    </head>
    <body>
        <header>
            <h1> COMANDES </h1>
            <hr>
        </header>
        <section>
            <?php if($comandes !== null) { ?> <!-- comprovació de si l'usuari ha realizat comandes o no -->
                <table id="table" border="1"> <!-- taula on es mostraran totes les comandes realitzades per l'usuari-->
                <tr>
                    <th> Número de la comanda </th>
                    <th> Imatge </th>
                    <th> Nom </th>
                    <th> Preu </th>
                    <th> Quantitat </th>
                    <th> Preu total de la compra</th>
                </tr>
                <?php 
                foreach($comandes as $com) { ?> <!-- bucle necessari per mostrar tots els productes de les comandes amb els seus detalls-->
                    <tr>
                        <td> <?php echo $com['Id']; ?> </td>
                        <td> <img src="<?php echo $com['Imatge']; ?>" height="150px"> </td>
                        <td> <?php echo $com['Nom']; ?> </td>
                        <td> <?php echo $com['Preu']; ?> €</td>
                        <td> <?php echo $com['Quantitat']; ?> </td>
                        <td> <?php echo $com['PreuTotal']; ?> € </td>
                    </tr>
                <?php } ?>
            </table>
            <?php }
            else { ?>
                <p id="noCom"> No has realitzat ninguna comanda. </p>
            <?php } ?>            
        </section>
    </body>    
</html>