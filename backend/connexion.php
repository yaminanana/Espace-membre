<?php include 'header.html';?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['connexion'])){
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'db.php';

    $requete = $connexion->prepare('SELECT * FROM Adherents WHERE email= :email ');
    $requete->execute(array('email'=>$email));
    $resultat = $requete->fetch();
if(!$resultat){
    $message = "Votre email ou votre mot de passe ne sont pas valide";
}else{
   $passwordOK = password_verify($password, $resultat['motDePasse']);
   /* var_dump ($resultat['motDePasse']);*/
    if($passwordOK){
       
        session_start();
        $_SESSION['id'] = $resultat['adherentId'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['email'] = $email;

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
        }
        header('location: index.php?error=1&id'.$resultat['adherentId']);
    }
   
}

}

?>


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
    </html>



