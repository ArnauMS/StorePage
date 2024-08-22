<?php 
/* controlador de la modificació del perfil amb els filtres a la part del servidor on es fa primer una 
comprovació de que ha passat els filtres i después una altre de que si s'han modificat les dades amb éxit*/
    include __DIR__ ."/../model/connectaBD.php"; 
    include __DIR__ ."/../model/m_perfil.php";
    if (isset($_SESSION['usuariId'])) {
        $usuari = usuari($connexio);
    } 
    
    if(!empty($_POST['nom'])) {
        $nom = $_POST['nom'];
        $nomComprovacio = filter_var($nom, FILTER_SANITIZE_STRING);
    }
    if(!empty($_POST['email'])) {
        $email = $_POST['email'];
        $emailComprovacio = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    if(!empty($_POST['password'])) {
        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $passwordComprovacio = filter_var($pass, FILTER_SANITIZE_STRING);
    }
    if(!empty($_POST['address'])) {
        $address = $_POST['address'];
        $addressComprovacio = filter_var($address, FILTER_SANITIZE_STRING);
    }
    if(!empty($_POST['city'])) {
        $city = $_POST['city'];
        $cityComprovacio = filter_var($city, FILTER_SANITIZE_STRING);
    }
    if(!empty($_POST['citynumber'])) {
        $citynumber = $_POST['citynumber'];
        $citynumber = (int)$citynumber;
        $citynumberComprovacio = filter_var($citynumber, FILTER_VALIDATE_INT);
    }


    if((isset($nomComprovacio) && $nomComprovacio) || (isset($emailComprovacio) && $emailComprovacio) || (isset($passwordComprovacio) && $passwordComprovacio) || (isset($addressComprovacio) && $addressComprovacio) || (isset($cityComprovacio) && $cityComprovacio) || (isset($citynumberComprovacio) && $citynumberComprovacio)) {
        $mod = modificar($connexio);
        if($mod) {
            echo "Les dades s'han modificat amb éxit.";?>
            <br><b><a href="index.php" style="text-decoration: none; color: black;"> Inici </a></b>
        <?php }
        else {
            echo "Hi ha hagut algun problema.";?>
            <br><b><a href="index.php?accio=perfil" style="text-decoration: none; color: black;"> El meu compte </a></b>
    <?php }
    }
    else {
        echo "Alguna de les dades és incorrecta, revisa-les.";?>
        <br><b><a href="index.php?accio=perfil" style="text-decoration: none; color: black;"> El meu compte </a></b>
    <?php } 
?>