<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html%22%3E">
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/categoriesProductes.css" />
        <link rel="stylesheet" type="text/css" href="css/cssDetallProductes.css" />
        
    </head>
    <body>
        <div id="producte">
            <?php foreach($detalls as $detall) { ?> <!-- bucle per mostrar els detalls d'un producte en concret-->
            <section class="imatges">
                <div>
                    <img src="<?php echo $detall['Imatge2']; ?>"/><br />
                </div>
                <div>
                    <img src="<?php echo $detall['Imatge3']; ?>"/><br />
                </div>
                <img id="Imatge" src="<?php echo $detall['Imatge1']; ?>"/><br />
            </section>
            <section class="descripcio">
                <h3 id="Nom"> <?php echo $detall['Nom']; ?> </h3>
                <h3 id="Preu"> <?php echo $detall['Preu']; ?> € </h3>
                <h2> Descripcio: </h2> <p> <?php echo $detall['Descripcio']; ?> </p>
                <h2> Escolleix una talla: </h2> 
                <div id="talla">
                    <div>
                        <p> S </p>
                    </div>
                    <div>
                        <p> M </p> 
                    </div>
                    <div>
                        <p> L </p>
                    </div>
                    <div>  
                        <p> XL </p>
                    </div>
                </div>
                <a id="afegirCarro" onclick="enlace('#pagina','index.php?accio=detalls&categoria=<?php echo $detall['CategoriaId']; ?>&detall=<?php echo $detall['Id']; ?>&variableAfegir=1')"> Afegir al carro </a>
                <!-- botó que en permet afegir un producte al carro-->
            </section>
            <?php } ?>
        </div>        
    </body>
</html>