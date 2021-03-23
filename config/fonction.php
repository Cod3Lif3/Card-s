<?php
    function check_mdp($mdp,$conf){
        $majuscule = preg_match('@[A-Z]@', $mdp);
        $minuscule = preg_match('@[a-z]@', $mdp);
        $chiffre = preg_match('@[0-9]@', $mdp);
        $special = preg_match('@[$%?!]@', $mdp);
        $comparaison = preg_match('/'.$conf.'/',$mdp);
       if(!$majuscule || !$minuscule || !$chiffre || !$special || !$comparaison || iconv_strlen($mdp)<10 || iconv_strlen($mdp) > 20)
       {
           return false;
       }
       else 
       {
           return true;
       }
    }

    function check_pseudo($pseudo,$pdo){
        $result = $pdo ->query('SELECT * FROM tb_user');
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user == $pseudo){
            return false;
        }
        else
        {
            return true;
        }
    }

    function addUser($pdo,$pseudo,$email,$mdp,$genre,$adresse,$num,$statut){
        $stmt = $pdo -> prepare('INSERT INTO tb_user(pseudo, mdp, email,gender,adresse,tel,statut) VALUES(?,?,?,?,?,?,?)');
        $stmt -> bindParam(1, $pseudo);
        $stmt -> bindParam(2, $mdp);
        $stmt -> bindParam(3, $email);
        $stmt -> bindParam(4, $genre);
        $stmt -> bindParam(5, $adresse);
        $stmt -> bindParam(6, $num);
        $stmt -> bindParam(7,$statut);
        $stmt -> execute();
    }

    function connectPseudo($pseudo,$pdo){
        $stmt = $pdo -> prepare('SELECT * FROM tb_user WHERE pseudo = ?');
        $stmt -> bindParam(1,$pseudo);
        $stmt-> execute();
        return $stmt;
    }

    function passwordConnect($password, $pseudo, $pdo)
    {
        $stmt = $pdo -> prepare(('SELECT mdp FROM tb_user WHERE pseudo = ?'));
        $stmt -> bindParam(1, $pseudo);
        $stmt -> execute();
        $stmt = $stmt->fetch();
        $hash = $stmt[0];
        return password_verify($password,$hash);
       
    }
    function affichageTel($pdo,$pseudo)
    {
        $stmt = $pdo -> prepare(('SELECT tel FROM tb_user WHERE pseudo = ?'));
        $stmt -> bindParam(1, $pseudo);
        $stmt -> execute();
        $stmt = $stmt->fetch();
        return $stmt[0];
    }
    function affichageAdresse($pdo,$pseudo)
    {
        $stmt = $pdo -> prepare(('SELECT adresse FROM tb_user WHERE pseudo = ?'));
        $stmt -> bindParam(1, $pseudo);
        $stmt -> execute();
        $stmt = $stmt->fetch();
        return $stmt[0];
    }
    function affichageMail($pdo,$pseudo)
    {
        $stmt = $pdo -> prepare(('SELECT email FROM tb_user WHERE pseudo = ?'));
        $stmt -> bindParam(1, $pseudo);
        $stmt -> execute();
        $stmt = $stmt->fetch();
        return $stmt[0];
    }
    function affichageProduct($pdo,$label,$string)
    {
        $stmt = $pdo -> prepare(('SELECT * FROM tb_product WHERE label_produit = ?'));
        $stmt -> bindParam(1,$label);
        $stmt -> execute();
        $stmt = $stmt->fetch();
        return $stmt[$string];
    }
?>