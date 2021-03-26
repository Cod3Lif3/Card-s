<?php
    /**
     * function that check if the password is conform to our rules (regex, string length ...)
     * @param string $password The user's password.
     * @param string $conf Confirmation password.
     * 
     * @return bool FALSE if the password ins't conform, or TRUE otherwise
     */
    function check_mdp($password,$conf){
        $check = false;
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $special = preg_match('@[$%?!]@', $password);
        $comparison = preg_match('/'.$conf.'/',$password);
        $check = (!$uppercase || !$lowercase || !$number || !$special || !$comparison || iconv_strlen($password)<10 || iconv_strlen($password) > 20) ? false : true;
        return $check;
    }

    /**
     * function that check the uniqueness of the pseudo enter by the user in ou database
     * @param string $pseudo The user's pseudo.
     * @param object $pdo Database connection.
     * 
     * @return bool FALSE if the pseudo already exist in the database, or TRUE otherwise
     */ 
    function check_pseudo($pseudo,$pdo){
        $check=true;
        $stmt = $pdo ->prepare('SELECT pseudo FROM tb_user');
        $stmt -> execute();
        $result = $stmt -> fetchAll(PDO::FETCH_NUM);
        for($i=0;$i<sizeof($result);$i++){
            $check = ($result[$i][0] == $pseudo) ? false : true;
        }
        return $check;
    }

    /**
     * procedure that hash the password and add an user and all his data in the database  
     * @param object $pdo Database connection.
     * @param string $pseudo The user's pseudo.
     * @param string $email The user's email.
     * @param string $password The user's password.
     * @param string $gender The user's gender.
     * @param string $adress The user's adress.
     * @param string $phone The user's phone number.
     * @param string $status The user's status.
     * 
     * @return void
     */
    function addUser($pdo,$pseudo,$email,$password,$gender,$adress,$phone,$status){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo -> prepare('INSERT INTO tb_user(pseudo, mdp, email,gender,adresse,tel,statut) VALUES(?,?,?,?,?,?,?)');
        $stmt -> bindParam(1, $pseudo);
        $stmt -> bindParam(2, $password);
        $stmt -> bindParam(3, $email);
        $stmt -> bindParam(4, $gender);
        $stmt -> bindParam(5, $adress);
        $stmt -> bindParam(6, $phone);
        $stmt -> bindParam(7, $status);
        $stmt -> execute();
    }

    /**
     * function which verify if the password enter match with the database password
     * @param string $password The user's password.
     * @param string $pseudo The user's pseudo.
     * @param object $pdo Database connection.
     * 
     * @return bool Returns TRUE if the user's password and  the database password match, or FALSE otherwise
     */
    function passwordConnect($password, $pseudo, $pdo){
        $stmt = $pdo -> prepare('SELECT mdp FROM tb_user WHERE pseudo = :pseudo');
        $stmt -> bindParam(':pseudo', $pseudo);
        $stmt -> execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
        $hash = $stmt["mdp"];
        return password_verify($password,$hash);   
    }
    
    
    /**
     * function which show the requested data in the user table 
     * @param object $pdo Database connection.
     * @param string $pseudo The user's pseudo.
     * @param string $user_data The field in Database we want. 
     * 
     * @return string Returns the data researched if exists.
     */
    function affichageUser($pdo,$pseudo, $user_data){
        $stmt = $pdo -> prepare(('SELECT * FROM tb_user WHERE pseudo = :pseudo'));
        $stmt -> bindParam(':pseudo', $pseudo);
        $stmt -> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result[$user_data];
    }
    function affichageProduct($pdo,$label,$string)
    {
        $stmt = $pdo -> prepare(('SELECT * FROM tb_product WHERE label_produit = ?'));
        $stmt -> bindParam(1,$label);
        $stmt -> execute();
        $stmt = $stmt->fetch();
        return $stmt[$string];
    }
