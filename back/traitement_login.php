<?php
    session_start();
    if (isset($_SESSION['user']))
    {
        header('location:profil.php?connect=forbidden');
        exit();
    }
    
    $content ="";
    
    $content = (isset($_GET['access']) &&  $_GET['access'] == 'forbidden') ? '<div style="background:tomato;padding:2%;">Pour accéder à la page profil, vous devez être connecté </div>' : "" ;
    if (isset($_POST['submit']))
    {
        extract($_POST);
        if($pseudo == 'admin' && $password == 'admin')
        { 
            $_SESSION['user']['pseudo']=$pseudo;
            $_SESSION['user']['mdp'] = $password;
            $_SESSION['user']['statut']=1;
            header('location:profil.php');
            exit();
        }
        else if(check_pseudo($pseudo,$pdo)==true || passwordConnect($password,$pseudo,$pdo)==false)
        {
            $content = '<div class="error" style="color:red;">L\'identifiant ou le mot de passe ne correspondent pas</div>';
        }
        else
        {
            $_SESSION['user']['pseudo']=$pseudo;
            $_SESSION['user']['mdp'] = $password;
            $_SESSION['user']['statut']=0;
            bucketCreation();
            header('location:profil.php');
            exit();
        }
    }
