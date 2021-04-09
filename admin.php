<?php
    session_start();
    include 'config/teamplate/head.php';
    include 'config/teamplate/nav.php';
    include 'back/traitement_admin.php';
?>
<div class="container">
    <form method="POST" class="search-item">
            <input type="search" name="searchBar" placeholder="Search Product" class="search-bar">
            <button type="submit" name="search"><img src="asset/img/search_icon.png" alt="search icon" class="search-icon"></button>
            <div class="radio-btn-container">
                <div class="radio-item">
                    <label for="tri">Label</label>
                    <br>
                    <input type="radio" name="tri" value="Name" class="radio">
                </div>
                <div class="radio-item">
                    <label for="tri">Price</label>
                    <br>
                    <input type="radio" name="tri" value="Price" class="radio">
                </div>
            </div>
    </form>
    <h2> Page admin </h2>
    <h2> Vous êtes connectés en tant qu'administrateur</h2>
    <h4> Gestion des stocks</h4>
    <div class="product-container">
    <?php for ($i=0;$i<sizeof(affichageAllProduct($pdo));$i++):?>
             <div class="product-item">
                 <div class="card-container">
                     <div class="card">
                         <a href="productDM.php?"><img src="<?=affichageAllProduct($pdo)[$i]["img_produit"]?>" alt="Donovan card" class="pict-card"></a>
                         <input class="product-btn_img" type="button" value="Change picture">
                     </div>
                 </div>
                 <form class="info-container" method="POST">
                     <input class="aff-info" type="text" name="label" value="<?=affichageAllProduct($pdo)[$i]["label_produit"]?>">
                     <input  class="aff-info" type="text" name="price" value="<?=affichageAllProduct($pdo)[$i]["prix_produit"]?>">
                     <input class="aff-info" type="text" name="quantite" value="<?=affichageAllProduct($pdo)[$i]["quantite_produit"]?>">
                     <textarea class="aff-info" rows="10" cols="35" name="description" maxlength="255"><?=affichageAllProduct($pdo)[$i]["descrip_product"]?></textarea>
                     <select class="aff-info" name="dispo">
                     <option value="<?=affichageAllProduct($pdo)[$i]["label_stock"]?>"><?=affichageAllProduct($pdo)[$i]["label_stock"]?></option>
                     <option value="En Stock">En Stock</option>
                     <option value="Indisponible">Indisponible</option>
                     </select>
                     <button class="product-btn" type="submit" name="edit" value="<?=$i?>">Modifier</button>
                     <button class="product-btn" type="submit" name="delete" value="<?=$i?>">Supprimer</button>
                 </form>
             </div>
        <?php endfor;?>
         </div>
    <a href="addProduct.php">Ajouter</a>
    <a href="?session=destroy">Déconnexion</a>
    <?php
        include 'config/teamplate/footer.php';
    ?>
   