<?php 
/* controlador dels productes de les categories*/
    include __DIR__ ."/../model/connectaBD.php"; 
    include __DIR__ ."/../model/m_productes.php"; 
    include __DIR__ ."/../model/m_categories.php"; 
    $categories = consultaCategories($connexio);
    $productes = consultaProductes($connexio, $categoria);
    include __DIR__ ."/../vista/v_llistatProductes.php";
    include __DIR__ ."/../vista/v_resumCompra.php"; 
?>
