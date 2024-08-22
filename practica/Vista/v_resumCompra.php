<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html%22%3E">
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/cssResumCarro.css" />    
    </head>
    <body>
        <div id="resumCarro"> <!-- aquí es mostra un resum del carro amb el preu total i el número d'elements que té el carro -->
            <div>
                <h3> Resum de la compra. </h3>
            </div>
            <div>
                <p> Numero de productes: <?php echo (empty($_SESSION['carro']['elementsTotal']))?0: ($_SESSION['carro']['elementsTotal']); ?> </p>
            </div>
            <div>
                <p> Preu total: <?php echo (empty($_SESSION['carro']['preuTotal']))?0: ($_SESSION['carro']['preuTotal']); ?> €</p>
            </div>
        </div>
    </body>
</html>
        