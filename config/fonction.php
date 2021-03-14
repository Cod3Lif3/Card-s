<?php
    function check_mdp($mdp,$conf)
    {
        $majuscule = preg_match('@[A-Z]@', $mdp);
        $minuscule = preg_match('@[a-z]@', $mdp);
        $chiffre = preg_match('@[0-9]@', $mdp);
        $special = preg_match('@[$%?!]@', $mdp);
        $comparaison = preg_match('/'.$conf.'/',$mdp);
//iconv_strlen/page admin gestion stock et prix
       if(!$majuscule || !$minuscule || !$chiffre || !$special || !$comparaison || iconv_strlen($mdp)<10 || iconv_strlen($mdp) > 20)
       {
           return false;
       }
       else 
       {
           return true;
       }
    }

    function check_pseudo($pseudo)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=bd_card;','root','aZERTYUIOP_973',[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
        $result = $pdo ->query('SELECT * FROM tb_user');
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user['pseudo'] == $pseudo){
            return false;
        }
        else
        {
            return true;
        }
    }

    function addUser($pseudo,$email,$mdp,$genre,$adresse,$num)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=bd_card;','root','aZERTYUIOP_973',[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
        $stmt = $pdo -> prepare('INSERT INTO tb_user(pseudo, mdp, email,gender,adresse,tel) VALUES(?,?,?,?,?,?)');
        $stmt -> bindParam(1, $pseudo);
        $stmt -> bindParam(2, $mdp);
        $stmt -> bindParam(3, $email);
        $stmt -> bindParam(4, $genre);
        $stmt -> bindParam(5, $adresse);
        $stmt -> bindParam(6, $num);
        $stmt -> execute();
    }

    function connectPseudo($pseudo)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=bd_card;','root','aZERTYUIOP_973',[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
        $stmt = $pdo -> prepare('SELECT * FROM tb_user WHERE pseudo = ?');
        $stmt -> bindParam(1,$pseudo);
        $stmt-> execute();
        return $stmt;
    }

    function passwordConnect($password, $pseudo)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=bd_card;','root','aZERTYUIOP_973',[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
        $stmt = $pdo -> prepare(('SELECT mdp FROM tb_user WHERE pseudo = ?'));
        $stmt -> bindParam(1, $pseudo);
        $stmt -> execute();
        $stmt = $stmt->fetch();
        $hash = $stmt[0];
        return password_verify($password,$hash);
       
    }
?>