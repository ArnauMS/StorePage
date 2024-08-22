<?php
/*model encarregat de pujar a la base de dades les modificacions fetes en el perfil. El que es fa aquí es
revisar quines son les dades que es volen modificar i aleshores es fa un UPDATE nomès d'aquells valors que vol
cambiar el usuari. Per fer les modificacions s'han hagut de passar els filtres previament ja que la funció de
modificar nomès s'executa quan es passen els filtres.*/
    function usuari($connexio) {
        try{
            $consulta = $connexio->prepare("SELECT * FROM usuaris WHERE id=".$_SESSION['usuariId']);
            $consulta->execute();
            $resultat = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        return($resultat);
    }

    function modificar($connexio) {
        if (!empty($_POST['nom']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['address']) || !empty($_POST['city']) || !empty($_POST['citynumber'])) {        
            if(!empty($_POST['nom'])) {
                $nom = $connexio->prepare("UPDATE usuaris SET nom = :nom WHERE id=".$_SESSION['usuariId']);
                $nom->bindParam(':nom',$_POST['nom']);
                $nom = $nom->execute();
            }
            if(!empty($_POST['email'])) {
                $email = $connexio->prepare("UPDATE usuaris SET email = :email WHERE id=".$_SESSION['usuariId']);
                $email->bindParam(':email',$_POST['email']);
                $email = $email->execute();
            }
            if(!empty($_POST['password'])) {
                $pass = $connexio->prepare("UPDATE usuaris SET password = :password WHERE id=".$_SESSION['usuariId']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pass->bindParam(':password',$password);
                $pass = $pass->execute();
            }
            if(!empty($_POST['address'])) {
                $address = $connexio->prepare("UPDATE usuaris SET address = :address WHERE id=".$_SESSION['usuariId']);
                $address->bindParam(':address',$_POST['address']);
                $address = $address->execute();
            }
            if(!empty($_POST['city'])) {
                $city = $connexio->prepare("UPDATE usuaris SET city = :city WHERE id=".$_SESSION['usuariId']);
                $city->bindParam(':city',$_POST['city']);
                $city = $city->execute();
            }
            if(!empty($_POST['citynumber'])) {
                $citynumber = $connexio->prepare("UPDATE usuaris SET citynumber = :citynumber WHERE id=".$_SESSION['usuariId']);
                $citynumber->bindParam(':citynumber',$_POST['citynumber']);
                $citynumber = $citynumber->execute();
            }
    
            if (isset($nom) || isset($email) || isset($pass) || isset($address) || isset($city) || isset($citynumber)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>