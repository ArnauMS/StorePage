<?php
/* Index on tenim diverses funcions que utilitzem a la nostra web i tenim un switch case que ens carrega les
pàgines que l'usuari sol·liciti */

$accio = $_GET['accio']??"";
session_start();

if(!isset($_SESSION['carro'])) {
    $_SESSION['carro'] = array();
    $_SESSION['carro']['productes'] = array();
    $_SESSION['carro']['preuTotal'] = 0.00;
    $_SESSION['carro']['elementsTotal'] = 0;
}

function eliminarProducte($id) {
    foreach($_SESSION['carro']['productes'] as $prod) {
        if($prod['id'] == $id) {
            $_SESSION['carro']['preuTotal'] -= ($_SESSION['carro']['productes'][$id]['preu']*$_SESSION['carro']['productes'][$id]['quantitat']);
            $_SESSION['carro']['elementsTotal'] -= $_SESSION['carro']['productes'][$id]['quantitat'];
            unset($_SESSION['carro']['productes'][$id]);
        }
    }
}

function escollirQuantitat($id) {
    foreach($_SESSION['carro']['productes'] as $prod) {
        if($prod['id'] == $id) {
            if ($_GET['variableQuantitat'] == 1) {
                if($_SESSION['carro']['productes'][$id]['quantitat'] != 1) {
                    $_SESSION['carro']['productes'][$id]['quantitat'] -= 1;
                    $_SESSION['carro']['preuTotal'] -= $_SESSION['carro']['productes'][$id]['preu'];
                    $_SESSION['carro']['elementsTotal'] -= 1;
                }
            } 
            else {
                $_SESSION['carro']['productes'][$id]['quantitat'] += 1;
                $_SESSION['carro']['preuTotal'] += $_SESSION['carro']['productes'][$id]['preu'];
                $_SESSION['carro']['elementsTotal'] += 1;
            }
        }
    }  
}

switch ($accio) 
{
    case 'registre':
        require_once __DIR__ .'/controlador/c_registre.php';
        break;
    case 'registreCo':
        require_once __DIR__ .'/controlador/c_registreComprovacio.php';
        break;
    case 'login':
        require_once __DIR__.'/controlador/c_iniciarSessio.php';
        break; 
    case 'loginCo':
        require_once __DIR__.'/controlador/c_iniciarSessioComprovacio.php';
        break; 
    case 'logout':
        require_once __DIR__ . '/controlador/c_tancarSessio.php';
        break;
    case 'confirmarCompra':
        require_once __DIR__ . '/controlador/c_compra.php';
        break;
    case 'carro': 
        if(isset($_GET['borrar'])) {
            unset($_SESSION['carro']);
        }
        if(isset($_GET['eliminar'])) {
            $id = $_GET['id'];
            eliminarProducte($id);            
        }
        if(isset($_GET['variableQuantitat'])) {
            $id = $_GET['id'];
            escollirQuantitat($id);
        }
        require_once __DIR__ .'/controlador/c_carro.php';
        break;
    case 'perfil':
        require_once __DIR__ . '/controlador/c_perfil.php';
        break;
    case 'perfilCo':
        require_once __DIR__ . '/controlador/c_perfilComprovacio.php';
        break;
    case 'comandes':
        require_once __DIR__ . '/controlador/c_mostrarComandes.php';
        break;
    case 'detalls':
        $variableAfegir = 0;
        $producte = $_GET['detall'];
        require_once __DIR__.'/controlador/c_detallProductes.php';
        break;
    case 'producte':
        $categoria = $_GET['categoria'];
        require_once __DIR__.'/controlador/c_llistatProductes.php';
        break;
    default:
        require_once __DIR__.'/controlador/c_categoriesProductes.php';
        break;
 }

 function getPreuTotal($pos) {
    $total = $_SESSION['carro']['preuTotal'];
    $total += $_SESSION['carro']['productes'][$pos]['preu'];
    return($total);
 }

 ?>