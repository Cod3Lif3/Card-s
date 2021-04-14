<?php
    class Product{
        private $_id_produit;
        private $_img;
        private $_second_img;
        private $_third_img;
        private $_label;
        private $_quantite;
        private $_prix;
        private $_descrip;
        private $_label_stock;

        public function __construct( array $data)
        {
            foreach ($data as $key => $value){
                $method = 'set'.ucfirst($key);
                if (method_exists($this,$method))
                    $this->$method($value);
            }
        }

        public function id_produit(){
            return $this->_id_produit;
        }

        public function img(){
            return $this->_img;
        }
        public function second_img(){
            return $this->_second_img;
        }
        public function third_img(){
            return $this->_third_img;
        }
        public function label(){
            return $this->_label;
        }
        public function quantite(){
            return $this->_quantite;
        }
        public function prix(){
            return $this->_prix;
        }
        public function descrip(){
            return $this->_descrip;
        }
        public function label_stock(){
            return $this->_label_stock;
        }

       
        public function setId_produit($id){
            $id = (int) $id;
            if($id>0){
                $this->_id_produit = $id;
            }
        }
        public function setImg_produit($img){
            if (is_string($img)){
                $this->_img = $img;
            }
        }
        public function setSecond_img($img){
            if (is_string($img)){
                $this->_second_img = $img;
            }
        }
        public function setThird_img($img){
            if (is_string($img)){
                $this->_third_img = $img;
            }
        }
        public function setLabel_produit($label){
            if (is_string($label)){
                $this->_label = $label;
            }
        }
        public function setQuantite_produit($quantite){
            $quantite = (int) $quantite;
            if ($quantite >= 0){
                $this->_quantite = $quantite;
            }
        }
        public function setPrix_produit($price){
            $price = (float) $price;
            if ($price > 0){
                $this->_prix = $price;
            }
        }

        public function setDescrip_product($descript){
            if (is_string($descript)){
                $this->_descrip = $descript;
            }
        }
        public function setLabel_stock($label_stock){
            if(is_string($label_stock))
                $this->_label_stock = $label_stock;
        }
     
    }
    class User{
        private $_id_user;
        private $_pseudo;
        private $_mdp;
        private $_email;
        private $_gender;
        private $_adresse;
        private $_tel;
        private $_statut;

        public function __construct( array $data)
        {
            foreach ($data as $key => $value){
                $method = 'set'.ucfirst($key); //variable méthode récupère les données de data concatène avec set et mets la 1ère  lettre de la variable récupérer en majuscule
                if (method_exists($this,$method))
                    $this->$method($value);
            }
        }

        public function pseudo(){
            return $this->_pseudo;
        }
        public function mdp(){
            return $this->_mdp;
        }
        public function email(){
            return $this->_email;
        }
        public function gender(){
            return $this->_gender;
        }
        public function adresse(){
            return $this->_adresse;
        }
        public function tel(){
            return $this->_tel;
        }
        public function statut(){
            return $this->_statut;
        }

        public function setId_user($user){
            if(is_string($user))
                $this->_id_user = $user;
        }

        public function setPseudo($pseudo){
            if(is_string($pseudo))
                $this->_pseudo = $pseudo;
        }

        public function setMdp($mdp){
            if(is_string($mdp))
                $this->_mdp = $mdp;
        }

        public function setEmail($email){
            if(is_string($email))
                $this->_email = $email;
        }
        public function setGender($gender){
            if(is_string($gender))
                $this->_gender = $gender;
        }
        public function setAdresse($adresse){
            if(is_string($adresse))
                $this->_adresse = $adresse;
        }
        public function setTel($tel){
            if(is_string($tel))
                $this->_tel = $tel;
        }
        public function setStatut($statut){
            $statut = (int) $statut;
            if($statut>=0){
                $this->_statut = $statut;
            }
        }

    }
    class Manager{
        private $_pdo;

        public function __construct($pdo){
             $this->setDb($pdo);
        }
        public function setDb(PDO $pdo){
             $this->_pdo = $pdo;
        }
         /**
          * Function used to add a product in the database 
          * @param Product $product
          * 
          * @return void
          */
        public function addProduct(Product $product){
            $stmt = $this->_pdo -> prepare("INSERT INTO tb_product (img_produit,second_img,third_img,label_produit, quantite_produit, prix_produit,descrip_product,label_stock) VALUES(?,?,?,?,?,?,?,?)");
            $stmt -> execute(array(
                $product->img(),
                $product->second_img(),
                $product->third_img(),
                $product->label(),
                $product->quantite(),
                $product->prix(),
                $product->descrip(),
                $product->label_stock()
            ));
        }
        /**
         * Suppression d'un produit dans la base de données à partir d'un objet Produit.
         * @param Product $product
         * 
         * @return void
         */
        public function deleteProduct(Product $product){
             $stmt = $this->_pdo->prepare("DELETE FROM tb_product WHERE id_produit = :id");
             $stmt -> bindValue(':id',$product->id_produit());
             $stmt -> execute();
        }
        /**
         * Récupération d'un produit dans la base de données ensuite implémentation de ce même produit en Objet Produit.
         * @param string $label Le nom du produit.
         * 
         * @return Product Retourne un produit avec les attributs du produit récupérer dans la base de données.
         */
        public function get($label){
                $stmt = $this->_pdo -> prepare('SELECT * FROM tb_product WHERE label_produit = :label');
                $stmt -> bindParam(':label',$label);
                $stmt -> execute();
                $result = $stmt->fetch();
                return new Product($result);
        }
        /**
         * Récupère tout les produits de la base de données et les insères dans une liste de Produit.
         * @return array Retourne une liste contenant des objets Produit.
         */
        public function getList(){
             $products = [];
             $stmt = $this->_pdo -> prepare('SELECT * FROM tb_product');
             $stmt -> execute();
             $result = $stmt->fetchAll();
             foreach ($result as $key)
                $products[] = new Product($key);
             return $products;
        }

        /**
         * Modifie les attributs d'un produit dans la base de données.
         * @param array $data Tableau de associatif correspondant au données que l'on souhaite modifier.
         * @param int $id ID du produit
         * 
         * @return [type]
         */
        public function updateProduct(array $data,$id){
            $id++;
            $stmt = $this->_pdo->prepare('UPDATE tb_product SET img_produit = ?, second_img = ?, third_img = ?,label_produit = ?, quantite_produit = ?, prix_produit = ?, descrip_product = ?, label_stock = ? WHERE id_produit = ?');
            $stmt -> execute(array(
                $data['img'],
                $data['second_img'],
                $data['third_img'],
                $data['label'],
                $data['quantite'],
                $data['price'],
                $data['description'],
                $data['dispo'],
                $id
            ));
        }

        public function updateQuantite(Product $product, int $i){
            $product->setQuantite_produit($product->quantite()+$i);
            $stmt = $this->_pdo->prepare('UPDATE tb_product SET quantite_produit = ? WHERE id_produit = ?');
            $stmt -> execute(array(
                $product->quantite(),
                $product->id_produit()
            ));
        }

        public function updateStock(Product $product, string $string){
            $product->setLabel_stock($string);
            $stmt = $this->_pdo->prepare('UPDATE tb_product SET label_stock = ? WHERE id_produit = ?');
            $stmt -> execute(array(
                $product->label_stock(),
                $product->id_produit()
            ));
        }

        /**
         * Fonction permettant la recherche d'un produit à partir d'une chaîne de caractères
         * @param string $string Chaîne de caractère correspondant à notre recherche
         * 
         * @return Product Retourne un object Produit correspondant au produit rechercher.
         */
        public function search($string){
            $stmt = $this->pdo->prepare("SELECT label_produit FROM tb_product WHERE label_produit LIKE '%$string%'");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return new Product($result);
        }

        /**
         * Fonction vérifiant que le mot de passe respecte bien tout les critères imposées à l'utilisateur
         * @param string $mdp Le mot de passe rentrer par l'utilisateur
         * @param string $conf La confirmation du mot de passe rentrer par l'utilisateur
         * 
         * @return boolean Return TRUE si toutes les conditions sont respectés et FALSE sinon.
         */
        public function check_mdp($mdp,$conf){
            $uppercase = preg_match('@[A-Z]@', $mdp);
            $lowercase = preg_match('@[a-z]@', $mdp);
            $number = preg_match('@[0-9]@', $mdp);
            $special = preg_match('@[$%?!]@', $mdp);
            $comparison = preg_match('/'.$conf.'/',$mdp);
            $check = (!$uppercase || !$lowercase || !$number || !$special || !$comparison || iconv_strlen($mdp)<10 || iconv_strlen($mdp) > 20) ? false : true;
            return $check;
        }
        /**
         * fonction récupérant le mot de passe stocké dans la base de donnée pour le pseudo rentré.
         * @param string $pseudo Le pseudo de l'utilisateur.
         * 
         * @return string Retourne le mot de passe crypté.
         */
        public function passwordConnect($pseudo,$password){
            $stmt = $this->_pdo->prepare('SELECT mdp FROM tb_user WHERE pseudo = :pseudo');
            $stmt->bindValue(':pseudo', $pseudo);
            $stmt->execute();
            $result = $stmt->fetch();
            $result = $result['mdp'];
            return password_verify($password,$result);
        }
        /**
         * Vérifie l'unicité du pseudo dans notre base de données.
         * @param string $pseudo Pseudo entré par l'utilisateur
         * 
         * @return boolean Retourne TRUE si le pseudo existe déjà False sinon.
         */
        public function check_pseudo($pseudo){
            $stmt = $this->_pdo->prepare('SELECT pseudo FROM tb_user');
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO::FETCH_NUM);
            for($i=0;$i<sizeof($result);$i++){
                $check = preg_match('/'.$result[$i][0].'/',$pseudo);
                if($check == true){
                    return true;
                    break;
                }
            }
            return false;
        }

        /**
         * Récupère toute les données stockés pour l'utilisateur
         * @param string $pseudo Pseudo utilisateur.
         * 
         * @return User Retourne un objet USER avec toute les données concernant l'utilisateur
         */
        function getUser($pseudo){
            $stmt = $this->_pdo->prepare('SELECT * FROM tb_user WHERE pseudo = :pseudo');
            $stmt -> bindParam(':pseudo', $pseudo);
            $stmt -> execute();
            $result = $stmt->fetch();
            return new User($result);
        }

        /**
         * Ajout d'un utilisateur dans la base de donnée à partir d'un objet User.
         * @param User $user Object User.
         * 
         * @return void
         */
        public function addUser(User $user){
            $user->setMdp(password_hash($user->mdp(),PASSWORD_DEFAULT));//on crypte notre mdp puis on le mets à jour dans notre objet User.
            $stmt = $this->_pdo->prepare('INSERT INTO tb_user(pseudo, mdp, email,gender,adresse,tel,statut) VALUES(?,?,?,?,?,?,?)');
            $stmt -> execute(array(
                $user->pseudo(),
                $user->mdp(),
                $user->email(),
                $user->gender(),
                $user->adresse(),
                $user->tel(),
                0
            ));
        }

    }
    /**
     * Creating a bucket if not exist
     * @return bool Return TRUE if the bucket already exist or create a Bucket otherwise
     */
    function bucketCreation(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['libelleProduit'] = array();
            $_SESSION['panier']['qteProduit'] = array();
            $_SESSION['panier']['prixProduit'] =array();
            $_SESSION['panier']['verrou'] = false;
        }
        return true;
    }

    /**
     * Adding an article in our basket
     * @param string $labelProduct Label of the product.
     * @param int $qteProduct quantity of the product.
     * @param float $price The price of the product.
     * 
     * @return void
     */
    function addArticle($labelProduct,$qteProduct, $price){
        if (bucketCreation()){
            $position = array_search($labelProduct, $_SESSION['panier']['libelleProduit'],true);
            if($position !== false){
                $_SESSION['panier']['qteProduit'][$position] += $qteProduct;
            }
            else
            {
                array_push($_SESSION['panier']['libelleProduit'],$labelProduct);
                array_push($_SESSION['panier']['qteProduit'], 1);
                array_push($_SESSION['panier']['prixProduit'], $price);
            }
        }
        else{
            echo "Un problème est survenu veuillez contacter l'admin du site.";
        }
    }

    /**
     * Delete an article  in the basket
     * @param string $labelProduct
     * 
     * @return void
     */
    function deleteArticle($labelProduct){
        if (bucketCreation()){
            $tmp = array();
            $tmp['libelleProduit'] = array();
            $tmp['qteProduit'] = array();
            $tmp['prixProduit'] = array();
            for($i=0;$i<sizeof($_SESSION['panier']['libelleProduit']);$i++){
                if ($_SESSION['panier']['libelleProduit'][$i] !== $labelProduct){
                    array_push($tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                    array_push($tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                    array_push($tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
                }
            }
            $_SESSION['panier']=$tmp;
            unset($tmp);
        } 
        else echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    /**
     * Calculate the total amount of the basket
     * @return float
     */
    function total(){
        $sum = 0;
        for($i=0;$i<sizeof($_SESSION['panier']['libelleProduit']);$i++){
            $sum += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
        }
        return $sum;
    }

    /**
     * calculate the number of different article in our basket
     * @return int
     */
    function nbArticle(){
        if (isset($_SESSION['panier']))
            return sizeof($_SESSION['panier']['libelleProduit']);
        else
            return 0;
    }