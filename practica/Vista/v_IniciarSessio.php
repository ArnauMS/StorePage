<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BlackRose</title>
        <meta name="author" content="Alejo De Urrengoechea, Arnau Masana Silvente" />
        <link rel="stylesheet" type="text/css" href="css/cssIniciarSessio.css" />
        
    </head>
    <body>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <section class="form-login"> 
            <h1> Iniciar Sessio </h1>
            <form action="index.php?accio=loginCo" method="post"> <!-- formula amb els filtres a la part del client per iniciar sessió --> 
                <input class="controls" type="mail" name="email" placeholder="Adreça electrònica"/><br />
                <input class="controls" type="password" name="password" patten="^[A-Za-z0-9]+$" placeholder="Contrasenya"/><br />
                <input class="buttons" type="submit" onclick="enviarFormulari('IniciarSessio')" name="botoFormulariIniciar" value="Iniciar Sessió"/>
                <p><a href="index.php"> Inici </a></p>
                <p><a href="index.php?accio=registre">No estic regitrat</a></p>
            </from>
        </section>
    </body>    
</html>