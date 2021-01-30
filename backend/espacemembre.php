<?php include 'header.html';?>
<?php
session_start();
if(isset($_SESSION['id'])){

    echo 'Bienvenue ' ."" . $_SESSION['pseudo'] ." ".  'dans votre espace !';
}



?>

<a href ="deconnexion.php">Se déconnecter</a>