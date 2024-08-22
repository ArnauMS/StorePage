<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/cssPerfil.css" />
        
    </head>
    <body>
        <?php if (isset($_SESSION['usuariId'])) { 
            foreach($usuari as $user) { ?>
            <section class="form-perfil">
                <h1> Modificar Perfil </h1> <!-- formulari amb els filtres a la part del client on es demanen les noves dades que es volen modificar d'un compte per dessar-les a la base de dades-->
                <form action="index.php?accio=perfilCo" method="post">
                    <input class="controls" type="text" name="nom" pattern="^[A-Za-z ]+$" placeholder="<?php echo $user['nom']; ?>"/><br />
                    <input class="controls" type="mail" name="email" placeholder="<?php echo $user['email']; ?>"/><br />
                    <input class="controls" type="password" name="password" patten="^[A-Za-z0-9]+$" placeholder="Contrasenya"/><br />
                    <input class="controls" type="text" name="address" pattern="^[A-Za-z0-9 ]+$" maxlength="30" placeholder="<?php echo $user['address']; ?>"/><br />
                    <input class="controls" type="text" name="city" pattern="^[A-Za-z0-9 ]+$" maxlength="30" placeholder="<?php echo $user['city']; ?>"/><br />
                    <input class="controls" type="text" name="citynumber" pattern="\d{0,9}" minlength="5" placeholder="<?php echo $user['citynumber']; ?>"/><br />
                    <input class="buttons" type="submit" onclick="enviarFormulari('Compte')" name="botoModificar" value="Enviar"/><br />
                    <p><a href="index.php"> Inici </a></p>
                </form>
            </section>
        <?php }
        }
        else { ?>
            <p id="noSessio"> Inicia sessió per poder modificar les teves dades. </p> 
            <b><a href="index.php?accio=login" style="text-decoration: none; color: black;"> Iniciar Sessió </a></b>          
        <?php }?>
    </body>    
</html>