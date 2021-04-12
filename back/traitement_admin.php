<?php
$manager = new ProductManager($pdo);
$content ="";
$content = (isset($_GET['access']) &&  $_GET['access'] == 'forbidden') ? '<div style="background:tomato;padding:2%;">Pour accéder à la page profil, vous devez être connecté </div>' : "" ;
 if (!isset($_SESSION['user']))
 {
     header('location:login.php?connect=forbidden');
     exit();
 }
if(isset($_POST['edit'])){
        extract($_POST);
        $manager->update($_POST,$edit);
        header('Location: admin.php');
    }
    else if(isset($_POST['search'])){
        extract($_POST);
        search($pdo,$searchBar);
    }
    else if(isset($_POST['delete'])){
        extract($_POST);
        $manager->delete($manager->get($label));
        header('Location: admin.php');
    }