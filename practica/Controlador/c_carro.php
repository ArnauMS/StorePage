<?php 
/*controlador del carro*/
    include __DIR__ ."/../model/connectaBD.php";  
    if(!isset($_SESSION['carro'])) {
        $_SESSION['carro'] = array();
        $_SESSION['carro']['productes'] = array();
        $_SESSION['carro']['preuTotal'] = 0.00;
        $_SESSION['carro']['elementsTotal'] = 0;
    }
    include __DIR__ ."/../vista/v_resumCompra.php";
    include __DIR__ ."/../vista/v_carro.php"; 
?>