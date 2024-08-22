<?php 
/* controlador del registre amb els filtres a la part del servidor on es fa primer una comprovació 
de que ha passat els filtres i después una altre de que si s'ha registrat amb éxit*/
    include __DIR__ ."/../model/connectaBD.php"; 
    include __DIR__ ."/../model/m_registre.php"; 
    
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);;
    $address = $_POST['address'];
    $city = $_POST['city'];
    $citynumber = $_POST['citynumber'];
    $citynumber = (int)$citynumber;

    $nomComprovacio = filter_var($nom, FILTER_SANITIZE_STRING);
    $emailComprovacio = filter_var($email, FILTER_VALIDATE_EMAIL);
    $passwordComprovacio = filter_var($pass, FILTER_SANITIZE_STRING);
    $addressComprovacio = filter_var($address, FILTER_SANITIZE_STRING);
    $cityComprovacio = filter_var($city, FILTER_SANITIZE_STRING);
    $citynumberComprovacio = filter_var($citynumber, FILTER_VALIDATE_INT);

    if(!$nomComprovacio || !$emailComprovacio || !$passwordComprovacio || !$addressComprovacio || !$cityComprovacio || !$citynumberComprovacio) {
        echo "Alguna de les dades és incorrecta, revisa-les.";?>
        <br><b><a href="index.php?accio=registre" style="text-decoration: none; color: black;"> Registrar-se </a></b>
    <?php }
    else {
        $registrarse = registrarse($statment,$connexio);
        if($registrarse) {
            echo "T'has registrat amb exit";?>
            <br><b><a href="index.php?accio=login" style="text-decoration: none; color: black;"> Iniciar Sessió </a></b>
        <?php }
        else {
            echo "És possible que el email que has possat ja hagi sigut utilitzat.";?>
            <br><b><a href="index.php?accio=registre" style="text-decoration: none; color: black;"> Registrar-se </a></b>
        <?php }
    }
?>