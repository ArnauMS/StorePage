<?php
/*model encarregat de verificar que el correu existeix a la base de dades i después de que l'usuari i la
contrasenya coincideixen. Primer es mira que els dos camps (usuari i contrasenya) estan plens i 
después hi ha una funció que es la que ens permet verificar que l'usuari i la contrasenya coincideixen.*/
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $intent = $connexio->prepare('SELECT id, email, password FROM usuaris WHERE email=:email');
        $intent->bindParam(':email',$_POST['email']);
        $intent->execute();
        $resultat = $intent->fetch(PDO::FETCH_ASSOC);

        $message = '';
        function comprovacio($resultat, $email, $pass) {
            if ($email == $resultat['email']) {
                if (password_verify($pass, $resultat['password'])) {
                    $_SESSION['usuariId'] = $resultat['id'];
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
?>