<?php 
/* model del registre on es verifica que tots els camps estan ocupats i en el cas de que tot estigues correcte
i de que el usuari no exiteix a la base de dades, guarda tots els valors a la base de dades.*/
    function revisarEmails($connexio) {
        if (!empty($_POST['email'])) {
            $intent = $connexio->prepare('SELECT email password FROM usuaris WHERE email=:email');
            $intent->bindParam(':email',$_POST['email']);
            $intent->execute();
            $resultat = $intent->fetch(PDO::FETCH_ASSOC);
            if(!empty($resultat)) {
                return true;
            }
            else {
                return false;
            }
        }
    }
    
    $message = '';

    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['citynumber'])) {
        $sql = "INSERT INTO usuaris (nom, email, password, address, city, citynumber) VALUES (:nom, :email, :password, :address, :city, :citynumber)";
        $statment = $connexio->prepare($sql);
        $statment->bindParam(':nom',$_POST['nom']);
        $statment->bindParam(':email',$_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $statment->bindParam(':password',$password);
        $statment->bindParam(':address',$_POST['address']);
        $statment->bindParam(':city',$_POST['city']);
        $statment->bindParam(':citynumber',$_POST['citynumber']);

        function registrarse($statment, $connexio) {
            $a = revisarEmails($connexio);
            if(!$a) {
                if ($statment->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
            else {
                return false;
            }
        }
    }
?> 