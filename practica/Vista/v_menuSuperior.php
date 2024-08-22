<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html%22%3E">
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/categoriesProductes.css" />    
        <script src="javaScript/funcionEnlace.js" type="text/javascript"></script> 
    </head>
    <body id="body">
        <header>
            <div id="barra"> <!-- barra on es mostren les categories -->
                <div class="boto">
                    <span>&#9776;</span>
                </div>
                <ul id="categories">
                    <?php foreach($categories as $categoria) { ?> <!-- bucle per mostrar totes les categories -->
                        <li><a onclick="enlace('#pagina', 'index.php?accio=producte&categoria=<?php echo $categoria['Id'] = htmlentities($categoria['Id'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>')"><?php echo $categoria['Nom'] = htmlentities($categoria['Nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </header>
        <div class="layout">
            <section class="titulo">
                <h1><a href="index.php"> BlackRose </a></h1>
            </section>
            <section id="usuari">
                <ul> 
                    <li id="dades"> Dades 
                        <ul class="sessio"> <!-- llistat que es mostra amb jquery on podem veure algunes de les funcions que pot fer el client com iniciar sessió, registrar-se, etc -->
                            <?php if(!isset($_SESSION['usuariId'])) { ?>
                                <li><a onclick="enlace('#body', 'index.php?accio=login')"> Iniciar Sessió </a></li>
                                <li><a onclick="enlace('#body', 'index.php?accio=registre')">Registrar-se </a></li>
                            <?php } ?>
                            <li><a onclick="enlace('#pagina', 'index.php?accio=carro')"> Carro </a></li>
                            <li><a onclick="enlace('#body', 'index.php?accio=perfil')"> El meu compte</a></li>
                            <li><a onclick="enlace('#pagina', 'index.php?accio=comandes')"> Les meves compres</a></li>
                            <li><a onclick="enlace('#body', 'index.php?accio=logout')"> Tancar sessio</a></li>
                        </ul>
                    </li>
                </ul>
            </section>  
        </div>
        <div id="pagina"> <!-- aqui es on carreguem algunes pàgines de tal forma que no em de tornar a carregar tot el menú superior -->

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
        <script src="javaScript/jsCategories.js" type="text/javascript"> </script>
        <script src="javaScript/menuDesplegable.js" type="text/javascript"></script>   
    </body>
</html>