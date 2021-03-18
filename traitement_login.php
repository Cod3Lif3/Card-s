<?php
    if (isset($_SESSION['user']))
    {
        header('location:profil.php?connect=forbidden');
        exit();
    }
    $content ="";
    if (isset($_GET['access']) &&  $_GET['access'] == 'forbidden')
    {
        $content .= '<div style="background:tomato;padding:2%;">Pour accéder à la page profil, vous devez être connecté </div>';
    }
    if (isset($_POST['submit']))
    {
        extract($_POST);
        if($pseudo == 'admin' && $password == 'admin')
        {
            session_start();
            $_SESSION['user']['pseudo']=$pseudo;
            $_SESSION['user']['mdp'] = $password;
            $_SESSION['user']['statut']=1;
            header('location:profil.php');
            exit();
        }
        else if(connectPseudo($pseudo,$pdo)==false || passwordConnect($password,$pseudo,$pdo)==false)
        {
            echo '<div class="error" style="color:red;">L\identifiant ou le mot de passe ne correspondent pas</div>';
        }
        else
        {
            session_start();
            $_SESSION['user']['pseudo']=$pseudo;
            $_SESSION['user']['mdp'] = $password;
            $_SESSION['user']['statut']=0;
            header('location:profil.php');
            exit();
        }
    }
?>