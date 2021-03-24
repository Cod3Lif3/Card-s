<?php

// connexion PDO
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=card_bd;','root','aZERTYUIOP_973',[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
}
catch(Exception $e)
{
    die('Erreur : '. $e->getMessage());
}
//variable d'affichage

//


require 'fonction.php';
?>