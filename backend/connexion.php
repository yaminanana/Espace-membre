<?php

//pour afficher les erreurs sur le navigateur, à utiliser qu'en phase de développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//si l'utilisateur essai de se connecter via le formulaire, on récupère le pseudo, l'emaile et le mdp saisie
if(isset($_POST['connexion'])){
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];

//éxécute le fichier db.php, où se trouve les identifiants (BDD) et la connexion à la BDD
    require_once 'db.php';
//préparation de la requête
    $requete = $connexion->prepare('SELECT * FROM Adherents WHERE email= :email ');
    $requete->execute(array('email'=>$email));
    $resultat = $requete->fetch();
if(!$resultat){
    $message = "Votre email ou votre mot de passe ne sont pas valide";
}else{
    //vérifie que le mdp récupèré correspond à celui stocké en BDD
   $passwordOK = password_verify($password, $resultat['motDePasse']);
   // var_dump ($resultat['motDePasse']);
    if($passwordOK){
      /*si tout est ok , on ouvre une session à l'utilisateur correspondant*/ 
        session_start();
        $_SESSION['id'] = $resultat['adherentId'];
        $_SESSION['pseudo'] = $resultat['pseudo'];
        $_SESSION['email'] = $email;
//si l'utilisateur coche la case, on crée des cookies pour l'email et le mdp saisis
        if(isset($_POST['sesouvenir'])){
            setcookie("email", $_POST['email']);
            setcookie("password", $_POST['password']);
        }else{
            if(isset($_COOKIE['email'])){
                setcookie( $_COOKIE['email'], "");
            }
            if(isset($_COOKIE['password'])){
                setcookie( $_COOKIE['password'], "");
            }
        }//On rédirige vers la page d'acceuil
        header('location: ./index.php?error=1&id'.$resultat['adherentId']);
    }
   
}

}

?>

<!--<h1>Le poney fringant</h1>
    <img src="images/poney.png" alt="logo" id="logo" />
<?php if(isset($message))echo $message; ?>
<form name="connexion" id="connexionForm" method="post" action="">
                <h2>Connexion</h2>
                <div class="formfield">



                    <label for="pseudoconnexion"></label>
                    <input placeholder="Pseudo*" type="text" name="pseudo" id="pseudoconnexion" required>
                    <label for="email"></label>
                    <input placeholder="Email" type="email" name="email" id="email">
                    <label for="password"></label>
                    <input placeholder="Mot de passe*" type="password" name="password" id="passwordconnexion" required>
                    <label for="sesouvenir" class="souvenir">Se souvenir de moi</label>
                    <input type="checkbox" name="sesouvenir" id="sesouvenir">

                </div>


                <button type="submit" name="connexion" >Se connecter</button>

            </form>
            
            

        </div>



    </body>
    </html>-->



