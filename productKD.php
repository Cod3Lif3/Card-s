        <?php
        include 'config/teamplate/head.php';
        ?>
        <header>
            <?php
            include 'config/teamplate/nav.php';
            ?>
        </header>
        <div class="container">
            <h2>Kevin Durant</h2>
            <div class="container-description">
                <div class="container-img">
                    <button type="submit"  id="previous-btn" class="btn">
                        <img src="asset/img/left-arrow.png" class="img-btn">
                    </button>
                    <img src="asset/img/KDGoat1.png" alt="KD card" id="first_pict">
                    <img src="asset/img/KDGoat2.jpg" alt="KD card"  class="second-card-img" id="second_pict">
                    <img src="asset/img/KDGoat3.jpg" alt="KD card" class="third-card-img" id="third_pict">
                    <button type="submit" id="next-btn" class="btn">
                        <img src="asset/img/right-arrow.png" class="img-btn">
                    </button>
                </div>
                <div class="descript">
                    <h3>Description</h3>
                    <p>Cette carte Kevin Durant GOAT EDITION est l’une des plus rares dans le monde. Finition en feuilles d’or et plastifiée manuellement, cette carte est sans aucun doute celle qui manque à votre collection</p>
                    <h3>Disponibilité</h3>
                    <p>Il reste actuellement 567 carte(s) en stocks</p>
                    <h3>Prix</h3>
                    <h3>149.99€</h3>
                    <input type="button" value="Ajouter au Panier">
                </div>
            </div>
            <div class="Avis">
                <h3>Avis des Utilisateurs:(101 avis)</h3>
                <h4>John Doe</h4>
                <div class="container-star">
                    <img src="asset/img/Vector.svg" class="stars">
                    <img src="asset/img/Vector.svg" class="stars">
                    <img src="asset/img/Vector.svg" class="stars">
                    <img src="asset/img/Vector.svg" class="stars">
                    <img src="asset/img/Vector (1).svg" class="stars">
                </div>
                <p>La qualité de cette carte est bluffante, on est clairement sur du premium</p>
            </div>
        </div>
        <footer>
            <?php
            include "config/teamplate/footer.php"
            ?>
        </footer>
        <script src="asset/script/product.js"></script>
    </body>
</html>