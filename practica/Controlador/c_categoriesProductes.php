<?php 
/*controlador de les categories del producte que es la pàgina inicial*/
    include __DIR__ ."/../model/connectaBD.php"; 
    include __DIR__ ."/../model/m_categories.php"; 
    $categories = consultaCategories($connexio);
    include __DIR__ ."/../vista/v_resumCompra.php"; 
    include __DIR__ ."/../vista/v_menuSuperior.php";
?>
