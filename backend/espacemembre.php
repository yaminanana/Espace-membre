<?php include 'header.html';?>
<?php
session_start();
if(isset($_SESSION['id'])){

    echo 'Bienvenue ' ." " . $_SESSION['pseudo'] ." ".  'dans votre espace !';
}
//To do terminé upload de photo + mettre la taille acceptée
if(isset($_POST['envoyer'])){
    $dossier = 'upload/';
    $fichier = basename($_FILES['avatar']['name']);
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)){
        echo 'Upload effectué avec succès !';
    }else{
        echo 'Echec de l\'upload !';
    }
}



?>

<a href ="deconnexion.php">Se déconnecter</a>
<a href ="Editprofil.php">Éditer mon profil</a>

<body>
    <h2>Bienvenue </h2>

    <form method="post" enctype="multipart/form-data">
    <div>
        Fichier : <input type="file" name="avatar">
</div>
<br>
<div>
    <input type="submit" name="envoyer" value="Envoyer le fichier">
</div>
</form>