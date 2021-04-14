<?php
    $manager = new Manager($pdo);
    $user = $manager->getUser($_SESSION['user']['pseudo']);
    
    $content = (isset($_GET['connect']) &&  $_GET['connect'] == 'forbidden') ? '<div style="background:tomato;padding:2%;">Vous ne pouvez pas accéder à la page d\'inscription</div>' :  "";
    
    if($_SESSION['user']['statut'] == 0){
        $status_content = '<h3> Hello '.htmlspecialchars($user->pseudo()).' <span class = "statut" >vous êtes connectés</span> en tant que membre </h3>';
    }
    else{
        header('location:admin.php');
        exit();
    }

    if (!isset($_SESSION['user']))
    {
        header('location:login.php?access=forbidden');
        exit();
    }
