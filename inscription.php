<?php
    include 'config/teamplate/head.php';
?>
<header>
<?php
    include 'config/teamplate/nav.php';
?>
</header>
<fieldset>
    <form method="POST">
        <input type="text" name="pseudo" id="pseudo" placeholder="pseudo">
        <input type="mail" name="email" id="email" placeholder="Mail">
        <input type="password" name="password" id="mdp" placeholder="Entrez votre mot de passe">
        <input type="password" name="confpass" id="confmdp" placeholder="Confirmer votre mot de passe">
        <label>Genres</label>
        <label>Femme</label><input type="radio" name="genre" value="Femme" id="Femme">
        <label>Homme</label><input type="radio" name="genre" value="Homme" id="Homme">
        <label>Autre</label><input type="radio" name="genre" value="Autre" id="autre">
        <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        <input type="tel" name="tel" id="tel">
        <br>
        <small>En cliquant sur S’inscrire, vous acceptez nos Conditions générales.<br> Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.<br> Vous recevrez peut-être des notifications par texto de notre part et vous pouvez à tout moment vous désabonner.</small>
        <input type="submit" name="submit" value="S'inscrire">
    </form>
</fieldset>
<?php
    if (isset($_POST['submit']))
    {
        extract($_POST);
        if(check_pseudo($pseudo) == false)
        {
            echo 'Ce pseudo n\'est pas disponible'; 
        }
        else if (strlen($tel)!= 9 || filter_var($tel,FILTER_VALIDATE_INT)==false)
        {
            echo 'Le numéro est incorrect';
        }
        else if ((filter_var($email,FILTER_VALIDATE_EMAIL)==false) || (preg_match('#yopmail\.com$#',$email))) //Vérification de la validité de l'adresse mail ainsi qu'isolation des emails poubelles
        {
            echo 'Adresse email incorrect';
        }
        else if (check_mdp($password, $confpass) == false)
        {
            echo 'Votre mot de passe est incorrect ou ne correspond pas';
        }
        else if ($genre != 'Femme'&& $genre != 'Homme' && $genre != 'Autre')
        {
            echo "Veuillez sélectionner un genre";
        }
        else
        {
            $password=password_hash($password, PASSWORD_DEFAULT);
            addUser($pseudo,$email,$password,$genre,$adresse,$tel);
            echo 'votre compte a bien été créée';
            
        }
    
    }
?>

</body>
</html>