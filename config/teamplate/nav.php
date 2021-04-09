    <header>
        <nav class="first-nav">
            <h3>Contact</h3>
            <div class="first-nav_field">
                <?php if (isset($_SESSION['user'])):?>
                        <a href="profil.php" class="nav-user_pseudo">
                            <?=$_SESSION["user"]["pseudo"]?>
                        </a>
                <?php else: ?>
                        <a href="login.php"><img src="asset/img/Profil.webp" class="profil" alt="profil icon"></a>

                <?php endif;?>
                <div class="bucket">
                    <a href="bucket.php">
                        <img src="asset/img/bucket.png" alt="bucket icon" class="bucket-icon">
                    </a>
                    <h1><?=nbArticle()?></h1>
                </div>
            </div>
        </nav>

        <nav class="second-nav" role="navigation">
            <a href="index.php"><h1>DeckedUP</h1></a>
            <ul>
                <li class="nav-item" id="NBA"> <a href="index.php">Acceuil</a></li>
                <li class="nav-item" id="NBA"> Cartes NBA</li>
                <li class="nav-item" id="NFL">Cartes NFL</li>
                <li class="nav-item" id="about">A propos</li>
                <li class="nav-item" id="back">Retours</li>
            </ul>
        </nav>
    </header>
