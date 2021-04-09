<?php
    $label = $_GET['label'];
    if (isset($_GET['session']) && $_GET['session'] == 'panier') {
        addArticle($label,1,showProduct($pdo, $label, "prix_produit"));
        header('location:bucket.php');
        exit();
    }