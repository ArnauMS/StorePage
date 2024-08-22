<?php 
/* controlador dels detalls dels productes*/
    include __DIR__ ."/../model/connectaBD.php"; 
    include __DIR__ ."/../model/m_detallProducte.php"; 
    include __DIR__ ."/../model/m_categories.php"; 
    $categories = consultaCategories($connexio);
    $detalls = consultaDetallsProducte($connexio, $producte);
    include __DIR__ ."/../model/m_carro.php";
    include __DIR__ ."/../vista/v_detallProductes.php";
    include __DIR__ ."/../vista/v_resumCompra.php"; 
?>
