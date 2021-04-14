    <header>
        <nav class="first-nav">
            <h3>Contact</h3>
            <div class="first-nav_field">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['pseudo'] != 'admin') : //si l'utilisateur est connecté et n'est pas admin alors on le redirige vers profil.php?>
                    <a href="profil.php" class="nav-user_pseudo">
                        <?= $_SESSION["user"]["pseudo"] ?>
                    </a>
                    <a href="?session=destroy" style="text-decoration:none;color:white;margin-right: 15px;">
                        Deconnexion
                    </a>
                <?php elseif(isset($_SESSION['user']) && $_SESSION['user']['pseudo'] == 'admin') ://si l'utilisateur est connecté et est admin alors on le redirige vers admin.php?>
                    <a href="admin.php" class="nav-user_pseudo">
                        <?= $_SESSION['user']['pseudo'] ?>
                    </a>
                    <a href="?session=destroy" style="text-decoration:none;color:white;margin-right:15px;">
                        Deconnexion
                    </a>
                <?php else : ?>
                    <a href="login.php"><img src="asset/img/Profil.webp" class="profil" alt="profil icon"></a>

                <?php endif; ?>
                <div class="bucket">
                    <a href="bucket.php">
                        <img src="asset/img/bucket.png" alt="bucket icon" class="bucket-icon">
                    </a>
                    <h1><?= nbArticle() ?></h1>
                </div>
            </div>
        </nav>

        <nav class="second-nav" role="navigation">
            <a href="index.php">
                <h1>DeckedUP</h1>
            </a>
            <ul>
                <li class="nav-item" id="NBA"> <a href="index.php">Acceuil</a></li>
                <li class="nav-item" id="NBA"> Cartes NBA</li>
                <li class="nav-item" id="NFL">Cartes NFL</li>
                <li class="nav-item" id="about">A propos</li>
                <li class="nav-item" id="back">Retours</li>
            </ul>
        </nav>
    </header>