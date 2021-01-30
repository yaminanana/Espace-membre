<?php include 'header.html';?>
<?php
session_start();
if(isset($_SESSION['id'])){
    echo 'Bonjour'." " . $_SESSION['pseudo'];
    
   

?>
<a href="deconnexion.php">Se deconnecter</a> <a href="espacemembre.php">Mon profil</a>
<?php
 }else{
?>
    <a href="inscription.php">Inscription</a>
    <a href="connexion.php">Connexion</a>
<?php
 }
?>   
</body>
</html>