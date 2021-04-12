<?php
    class Product{
        private $_id;
        private $_img;
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

        public function id(){
            return $this->_id;
        }

        public function img(){
            return $this->_img;
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
                $this->_id = $id;
            }
        }
        public function setImg_produit($img){
            if (is_string($img)){
                $this->_img = $img;
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
     class ProductManager{
         private $_pdo;

         public function __construct($pdo)
         {
             $this->setDb($pdo);
         }
         public function setDb(PDO $pdo){
             $this->_pdo = $pdo;
         }
         public function add(Product $product){
            $stmt = $this->_pdo -> prepare("INSERT INTO tb_product (label_produit, quantite_produit, prix_produit,descrip_product,label_stock) VALUES(?,?,?,?,?)");
            $stmt -> execute(array(
                $product->label(),
                $product->quantite(),
                $product->prix(),
                $product->descrip(),
                $product->label_stock()
            ));
         }
         public function delete(Product $product){
             $stmt = $this->_pdo->prepare("DELETE FROM tb_product WHERE id_produit = :id");
             $stmt -> bindValue(':id',$product->id());
             $stmt -> execute();
         }
         public function get($id){
                $stmt = $this->_pdo -> prepare('SELECT * FROM tb_product WHERE label_produit = :label');
                $stmt -> bindParam(':label',$id);
                $stmt -> execute();
                $result = $stmt->fetch();
                return new Product($result);
         }
         public function getList(){
             $products = [];
             $stmt = $this->_pdo -> prepare('SELECT * FROM tb_product');
             $stmt -> execute();
             $result = $stmt->fetchAll();
             foreach ($result as $key)
                $products[] = new Product($key);
             return $products;
         }

         public function update(array $data,$id){
            $id++;
            $stmt = $this->_pdo -> prepare('UPDATE tb_product SET label_produit = ?, quantite_produit = ?, prix_produit = ?, descrip_product = ?, label_stock = ? WHERE id_produit = ?');
            $stmt -> execute(array(
                $data['label'],
                $data['quantite'],
                $data['price'],
                $data['description'],
                $data['dispo'],
                $id
            ));
         }

     }
    /**
     * function that check if the password is conform to our rules (regex, string length ...)
     * @param string $password The user's password.
     * @param string $conf Confirmation password.
     * 
     * @return bool FALSE if the password ins't conform, or TRUE otherwise
     */
    function check_mdp($password,$conf){
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
        $stmt -> execute(array(
            $pseudo,
            $password,
            $email,
            $gender,
            $adress,
            $phone,
            $status
        ));
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
        $stmt = $stmt->fetch();
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
        $result = $stmt->fetch();
        return $result[$user_data];
    }
    
    /**
     * function which show the requested data in product table
     * @param object $pdo Database connection
     * @param string $label The product label.
     * @param string $string The field in Database we want.
     * 
     * @return string Returns the data researched if exists.
     */
    function affichageAllProduct($pdo){
        $stmt = $pdo -> prepare('SELECT * FROM tb_product');
        $stmt -> execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function showProduct($pdo,$label,$string){
        $stmt = $pdo -> prepare('SELECT * FROM tb_product as p INNER JOIN tb_stock ON p.label_stock = tb_stock.label_stock WHERE label_produit = ?');
        $stmt -> bindParam(1,$label);
        $stmt -> execute();
        $result = $stmt->fetch();
        return $result[$string];    
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
    /**
     * This function update the data on the product enter by the admin
     * @param object $pdo Database connection.
     * @param string $label The product label.
     * @param integer $qte  The product quantity
     * @param float $price The product price
     * @param string $descript The description of the product
     * @param integer $id Id of the product in our database
     * 
     * @return void
     */
    function updateProduct($pdo,$label,$qte,$price,$descript,$stock,$id){
        $stmt = $pdo -> prepare('UPDATE tb_product SET label_produit = ?, quantite_produit = ?, prix_produit = ?, descrip_product = ?, label_stock = ? WHERE id_produit = ?');
        $stmt -> bindParam(1,$label);
        $stmt -> bindParam(2,$qte);
        $stmt -> bindParam(3,$price);
        $stmt -> bindParam(4,$descript);
        $stmt -> bindParam(5,$stock);
        $stmt -> bindParam(6,$id);
        $stmt -> execute();  

    }

    /**
     * Search a Product in database 
     * @param object $pdo
     * @param string $string
     * 
     * @return array Return a associative array with all the product which correspond to the search
     */
    function search($pdo,$string){
        $stmt = $pdo -> prepare("SELECT label_produit FROM tb_product WHERE label_produit LIKE '%$string%'");
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        return $result;
    }

    /**
     * Delete a product in the database
     * @param object $pdo
     * @param string $label
     * 
     * @return void
     */
    function delete($pdo,$label){
        $stmt = $pdo -> prepare("DELETE FROM tb_product WHERE label_produit = :label");
        $stmt -> bindParam(':label',$label);
        $stmt -> execute();
    }

    /**
     * @param object $pdo
     * @param string $label
     * @param integer $qte
     * @param float $price
     * @param string $descript
     * @param string $stock
     * 
     * @return void
     */
    function addProduct($pdo,$label,$qte,$price,$descript,$stock){
        $stmt = $pdo -> prepare("INSERT INTO tb_product (label_produit, quantite_produit, prix_produit,descrip_product,label_stock) VALUES(?,?,?,?,?)");
        $stmt -> execute(array(
            $label,
            $qte,
            $price,
            $descript,
            $stock
        ));
    }
