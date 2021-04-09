<?php
    session_start();
    include 'config/teamplate/head.php';
    include 'config/teamplate/nav.php';
    if(isset($_POST['add'])){
        extract($_POST);
        addProduct($pdo,$label,$qte,$price,$description,$dispo);
    }
?>
<body>
<div class="container">
        <h2>New Product</h2>
        <form method="POST" class="inscription-form">
            <input type="text" name="label" placeholder="Label">
            <input type="number" name="qte" placeholder="Quantité">
            <input type="text" name="price" placeholder="Prix">
            <input type="textarea" name="description" placeholder="description">
            <select name="dispo">
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
