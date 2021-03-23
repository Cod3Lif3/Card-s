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
                echo '<a href="login.php"><img src="asset/img/Profil.png" class="profil" alt="profil icon"></a>';
            }

        ?>
        <div class="bucket">
            <a href="bucket.php">
               <img src="asset/img/bucket.png" alt="bucket icon" class="bucket-icon">
            </a>
            <h1>1</h1>
        </div>
    </div>
</nav>

<nav class="second-nav">
    <a href="index.php"><h1>DeckedUP</h1></a>
    <ul>
        <li class="nav-item" id="NBA"> <a>Cartes NBA</a></li>
        <li class="nav-item" id="NFL"><a>Cartes NFL</a></li>
        <li class="nav-item" id="about"><a>A propos</a></li>
        <li class="nav-item" id="back"><a>Retours</a></li>
    </ul>
</nav>
