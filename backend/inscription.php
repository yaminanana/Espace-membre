<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['inscription'])){
        //on vérifie que le champs pseudo n'est pas vide
    if(empty($_POST['pseudo']) || !preg_match('/[a-zA-Z0-9]+/', $_POST['pseudo'])){
$message = "Votre pseudo n'est pas valide !";
        //ON vérifie la présence et la conformité du format de l'email
    }elseif(empty($_POST['mail']) || !filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL )){
        $message = "Votre adresse email n'est pas valide !";
        //on vérifie la présence du mdp et si il est similaire au mdp de confirmation
    }elseif(empty($_POST['password']) || $_POST['password'] != $_POST['passwordconf']){
        $message = "Votre mot de passe n'est pas valide !";
    }else{
        require_once 'db.php';
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $req = $connexion->prepare('INSERT INTO Adherents(prenom, nom, pseudo, motDePasse, numADH, email) VALUES(:prenom, :nom, :pseudo, :motDePasse, :numADH, :email)');
        $req->bindvalue(':prenom', $_POST['prenom']);
        $req->bindvalue(':nom', $_POST['nom']);
        $req->bindvalue(':pseudo', $_POST['pseudo']);
        $req->bindvalue(':motDePasse', $password);
        $req->bindvalue(':numADH', $_POST['adherent']);
        $req->bindvalue(':email', $_POST['mail']);
        

        $req->execute();
    

        $message = "Inscription confirmée !";
        header('Location:http://back.poneyfringant1.local:8084/profil.html');
    }
}


?>



    <!--<h1>Le poney fringant</h1>
    <img src="images/poney.png" alt="logo" id="logo" />

    <?php if(isset($message))echo $message; ?>
    <div class="formulaire">
        <form name="inscription" id="inscriptionForm" method="post" action="inscription.php">
            <h2>Inscription</h2>
            <div class="formfield">

                <label for="prenom"></label>
                <input placeholder="Prénom*" type="text" name="prenom" id="prenom" maxlength="20" required>
                
                <label for="nom"></label>
                <input placeholder="Nom*" type="text" name="nom" id="nom" maxlength="20" required>

                <label for="pseudo"></label>
                <input placeholder="Pseudo*" type="text" name="pseudo" id="pseudo" >
                
                <label for="password"></label>
                <input placeholder="Mot de passe*" type="password" name="password" id="password" maxlength="20" required>
                
                <label for="passwordconf"></label>
                <input placeholder="confirmer mot de passe*" type="password" name="passwordconf" id="passwordconf" maxlength="20" required>
                
                <label for="mail"></label>
                <input placeholder="Email*" type="text" name="mail" id="mail" maxlength="20" required>
                
                <label for="adherent"></label>
                <input placeholder="N°Adhérent*" type="text" name="adherent" id="adherent" required>

                

            </div>


            <button type="submit" name="inscription">S'inscrire</button>
            

        </form>

        
 
    
          


    </body>
    </html>-->