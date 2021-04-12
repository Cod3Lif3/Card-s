<?php
    session_start();
    include 'config/teamplate/head.php';
    include 'config/teamplate/nav.php';
    $manager = new ProductManager($pdo);
    if(isset($_POST['add'])){
        extract($_POST);
        $product = new Product($_POST);
        $manager->add($product);
        header('Location: admin.php');
    }
?>
<body>
<div class="container">
        <h2>New Product</h2>
        <form method="POST" class="inscription-form">
            <input type="text" name="label_produit" placeholder="Label">
            <input type="number" name="quantite_produit" placeholder="Quantité">
            <input type="text" name="prix_produit" placeholder="Prix">
            <input type="textarea" name="descrip_product" placeholder="description">
            <select name="label_stock">
            <option value="En stock">En Stock</option>
            <option value="Indisponible">Indisponible</option>
            </select>
            <input type="submit" name="add" value="add">
        </form>
</body>
<?php
    include "config/teamplate/footer.php"
?>
</html>
