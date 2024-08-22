<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/cssCarro.css" />
        
    </head>
    <body>
        <header>
            <h1> CARRO </h1>
            <hr>
        </header>
        <?php if($_SESSION['carro']['elementsTotal'] == 0) { ?> <!-- comprovació de que el carro no està buit-->
            <p id="carroBuit"> El carro està buit </p>
            <?php $total=0;
        } 
        else {?>
        <section>
            <table id="table" border="1"> <!-- taula on es mostraran tots els productes del carro-->
                <tr>
                    <th> Imatge </th>
                    <th> Nom </th>
                    <th> Preu </th>
                    <th> Quantitat </th>
                    <th> Import </th>
                    <th> -- </th>
                </tr>
                <?php $total=0; 
                foreach($_SESSION['carro']['productes'] as $producteAfegit) { ?> <!-- bucle necessari per mostrar tots els productes del carro amb els seus detalls-->
                    <tr>
                        <td> <img src="<?php echo $producteAfegit['imatge']; ?>" height="150px"> </td>
                        <td> <?php echo $producteAfegit['nom']; ?> </td>
                        <td> <?php echo $producteAfegit['preu']; ?> €</td>
                        <td> <a style="cursor: pointer;" onclick="enlace('#pagina', 'index.php?accio=carro&variableQuantitat=1&id=<?php echo $producteAfegit['id']?>')"> - </a> <?php echo $producteAfegit['quantitat']; ?> <a style="cursor: pointer;" onclick="enlace('#pagina', 'index.php?accio=carro&variableQuantitat=2&id=<?php echo $producteAfegit['id']?>')"> + </a></td>
                        <td> <?php echo ($producteAfegit['preu']*$producteAfegit['quantitat']); ?> € </td>
                        <td> <button onclick="enlace('#pagina', 'index.php?accio=carro&id=<?php echo $producteAfegit['id']?>&eliminar=1')" id="botoEliminar" type="button"> X </button> </td>
                    </tr>
                    <?php $total=$total+($producteAfegit['preu']*$producteAfegit['quantitat']); ?>
                <?php } ?>
            </table>
        </section>
        <?php } ?>
        <section>
            <div id="peuCarro"> <!-- aqui es mostren el preu total del carro i els botons de eliminar tots els productes del carro i el de realitzar la compra -->
                <div id="totalCompra">
                    <h3> Total: </h3> <p class="preuTotal"> <?php echo number_format($total, 2); ?> € </p>
                </div> 
                <div id="botonsInferiors">
                    <button onclick="enlace('#pagina', 'index.php?accio=carro&borrar=1')" id="botoEliminarTot" type="button"> Eliminar </button>
                    <button id="botoCompra" onclick="enlace('#body','index.php?accio=confirmarCompra&c&compra=1')"type="button"> Comprar </button>
                </div>   
            </div>
        </section>
    </body>    
</html>