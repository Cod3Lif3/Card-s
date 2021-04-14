<?php
    session_start();
    $usermanager = new Manager($pdo);
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
            header('location:admin.php');
            exit();
        }
        else if($usermanager->check_pseudo($pseudo)===false)
        {
            $content = '<div class="error" style="color:red;">L\'identifiant ne correspond pas</div>';
        }
        else if ($usermanager->passwordConnect($pseudo,$password)===false){
            echo password_hash('aZERTYUIOP!973',PASSWORD_DEFAULT);
            $content = '<div class="error" style="color:red;">le mot de passe ne correspond pas</div>';
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
