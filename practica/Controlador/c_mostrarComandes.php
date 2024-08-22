<?php
/* Controlador de mostrar comandes on es fa una comprovació per veure si l'usuari ha iniciat sessió */
    include __DIR__ ."/../model/connectaBD.php";  
    if(!isset($_SESSION['usuariId'])) { 
        echo "Inicia sessió abans de veure les comandes."; ?>
        <br><b><a href="index.php?accio=login" style="text-decoration: none; color: black;"> Iniciar Sessió. </a></b>
    <?php } 
    else {
        include __DIR__ ."/../model/m_mostrarComandes.php";
        $comandes = consultaCompres($connexio);
        include __DIR__ ."/../vista/v_mostrarComandes.php";
    }
?>