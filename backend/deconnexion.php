<?php
session_start();
 // Pour déconnecter l'utilisateur, il faut détruire la session
 if(isset($_SESSION['id'])) {
   session_unset(); // on "vide" les variable de session
   session_destroy(); // on détruit la session => cela détruit l'id de la session, et la prochaine fois que l'utilisateur se connecte, la session aura un nouvel sessionId


   setcookie('email', null, strtotime("-1 day"));
   setcookie('password', null, strtotime("-1 day"));

//On redirige vers la page d'accueil
header('Location: index.php');
}else{
   
   echo 'Vous n êtes pas connecté !';
  
}
//to do 
//permettre la connexion avec un password_hash
//verifier la bdd
