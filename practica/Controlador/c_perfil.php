<?php 
/* controlador de l'edició del perfil on es fa una comprovació per veure que l'usuari ha iniciat sessió*/
    include __DIR__ ."/../model/connectaBD.php";  
    include __DIR__ ."/../model/m_perfil.php";
    if (isset($_SESSION['usuariId'])) {
        $usuari = usuari($connexio);
    }
    include __DIR__ ."/../vista/v_perfil.php";
?>