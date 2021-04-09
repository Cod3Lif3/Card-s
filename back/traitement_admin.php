<?php
if(isset($_POST['edit'])){
        extract($_POST);
        updateProduct($pdo,$label,$quantite,$price,$description,$dispo,affichageAllProduct($pdo)[$edit]["id_produit"]);
    }
    else if(isset($_POST['search'])){
        extract($_POST);
        search($pdo,$searchBar);
    }
    else if(isset($_POST['delete'])){
        extract($_POST);
        delete($pdo,$label);
    }