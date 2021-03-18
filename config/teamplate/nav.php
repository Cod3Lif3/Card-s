<nav class="first-nav">
    <a><h3>Contact</h3></a>
    <div class="first-nav_field">
        <?php
            if (isset($_SESSION['user']))
            {
                echo '<a href="profil.php" class="nav-user_pseudo">';
                echo $_SESSION["user"]["pseudo"];
                echo '</a>';
            }
            else
            {
                echo '<a href="login.php"><img src="asset/img/Profil.png" class="profil"></a>';
            }

        ?>
        <div class="bucket">
            <a>
               <img src="asset/img/bucket.png" alt="bucket icon" class="bucket-icon">
            </a>
        </div>
    </div>
</nav>

<nav class="second-nav">
    <a href="index.php"><h1>DeckedUP</h1></a>
    <ul>
        <a><li class="nav-item" id="NBA"> Cartes NBA</li></a>
        <a><li class="nav-item" id="NFL">Cartes NFL</li></a>
        <a><li class="nav-item" id="about">A propos</li></a>
        <a><li class="nav-item" id="back">Retours</li></a>
    </ul>
</nav>
