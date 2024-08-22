<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/cssRegistre.css" />
        
    </head>
    <body>
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <section class="form-register">
            <h1> REGISTRE </h1>
            <form action="index.php?accio=registreCo" method="post"> <!-- formulari amb els filtres a la part del client on es demanen totes les dades per crear un compte i dessar-les a la base de dades -->
                <input class="controls" type="text" name="nom" pattern="^[A-Za-z ]+$" placeholder="Nom i cognoms"/><br />
                <input class="controls" type="mail" name="email" placeholder="Adreça electrònica"/><br />
                <input class="controls" type="password" name="password" patten="^[A-Za-z0-9]+$" placeholder="Contrasenya"/><br />
                <input class="controls" type="text" name="address" pattern="^[A-Za-z0-9 ]+$" maxlength="30" placeholder="Direcció"/><br />
                <input class="controls" type="text" name="city" pattern="^[A-Za-z0-9 ]+$" maxlength="30" placeholder="Població"/><br />
                <input class="controls" type="text" name="citynumber" pattern="\d{0,9}" minlength="5" placeholder="Codi Postal"/><br />
                <p> Estic d'acord amb els <a href="#">Termes y Condicions</a></p>
                <input class="buttons" type="submit" onclick="enviarFormulari('Registre')" name="botoFormulariRegistre" value="Registrar-se"/><br />
                <p><a href="index.php"> Inici </a></p>
                <p><a href="index.php?accio=login">Ja estic registrat</a></p>
            </form>
        </section>
    </body>    
</html>