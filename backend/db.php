<?php
    $dburl = "localhost";
    $dbuser = "mina"; 
    $dbpass ="password";
    $dbname = "poney1";

    //connexion à la bdd et envoi de la requête
    $connexion = new PDO("mysql:host=$dburl;dbname=$dbname", $dbuser, $dbpass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

