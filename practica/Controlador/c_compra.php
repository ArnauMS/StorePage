<?php 
/*controlador de la compra on es fa una comprovació primer de que l'usuari ha iniciat sessió i después 
de que la compra s'ha realitzat amb éxit*/
    include __DIR__ ."/../model/connectaBD.php";  
    include __DIR__ ."/../model/m_compra.php"; 
   
    if(!isset($_SESSION['usuariId'])) {
        echo "Inicia sessió abans de comprar.";?>
        <br><b><a href="index.php?accio=login" style="text-decoration: none; color: black;"> Iniciar Sessió. </a></b>
    <?php }
    else {
        $confirm = confirmacio($connexio);
        if ($confirm) {
            unset($_SESSION['carro']);
            include __DIR__ ."/../vista/v_confirmacioCompra.php";   
        } else {
            echo "Ups! Algo ha fallat. Intenta-ho de nou.";?>
            <b><a href="index.php?accio=carro" style="text-decoration: none; color: black;"> Carro </a></b>
        <?php }
    }   
 ?>