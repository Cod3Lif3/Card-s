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

if(isset($_GET['session']) && $_GET['session'] == 'destroy'){
        session_destroy();
        header('location:login.php');
        exit();
}

//variable d'affichage

//


require 'fonction.php';
