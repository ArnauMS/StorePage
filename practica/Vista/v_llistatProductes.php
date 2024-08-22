<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html%22%3E">
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/categoriesProductes.css" />
        <link rel="stylesheet" type="text/css" href="css/cssProductes.css" />       
        
    </head>
    <body>
        <div class="contenidor">
        <?php foreach ($productes as $producte) { ?> <!-- bucle que ens permet mostrar tots els productes d'una categoria en concret -->
            <div class="imatge">
                <a onclick="enlace('#pagina','index.php?accio=detalls&categoria=<?php echo $producte['CategoriaId']; ?>&detall=<?php echo $producte['Id']; ?>')">
                <img src=" <?php echo $producte['Imatge1']; ?>"/></a>
                <p> <?php echo $producte['Nom']; ?> <p>
                <p> <?php echo $producte['Preu']; ?> <p>
            </div>
        <?php } ?>
        </div>
    </body>
</html>