<?php     
/* controlador d'iniciar sessió amb els filtres a la part del servidor i fent comprovacions primer de si
han passat els filtres i después de si coincideixen l'usuari i contrasenya*/
    include __DIR__ ."/../model/connectaBD.php";    
    include __DIR__ ."/../model/m_iniciarSessio.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $emailComprovacio = filter_var($email, FILTER_VALIDATE_EMAIL);
    $passwordComprovacio = filter_var($password, FILTER_SANITIZE_STRING);
    
    if(!$passwordComprovacio || !$emailComprovacio) {
        echo "El usuari o la contrasenya són invalids.";?>
        <br><b><a href="index.php?accio=login" style="text-decoration: none; color: black;"> Iniciar Sessió. </a></b>
    <?php }   
    else {
        $comprovar = comprovacio($resultat, $email, $password);
        if($comprovar) {
            echo "Has iniciat sessio correctament."; ?>
            <br><b><a href="index.php" style="text-decoration: none; color: black;"> Inici </a></b>
        <?php }
        else {
            echo "El usuari o la contrasenya son incorrectes.";?>
            <br><b><a href="index.php?accio=login" style="text-decoration: none; color: black;"> Iniciar Sessió. </a></b>
        <?php }
    }
?>