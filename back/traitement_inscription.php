<?php
$usermanager = new Manager($pdo);
$content_pseudo = "";
$content_mail = "";
$content_mdp = "";
$content_gender = "";
$content_tel = "";
if (isset($_SESSION['user']))
    {
        header('location:profil.php?connect=forbidden');
        exit();
    }
if (isset($_POST['submit'])) {
    extract($_POST);
    if (empty($pseudo) || $usermanager->check_pseudo($pseudo)==true){
        $content_pseudo = '<div class="error" style="color:red;">Ce pseudo n\'est pas disponible ou vide</div>';
    } else if (iconv_strlen($tel) != 10 || filter_var($tel, FILTER_SANITIZE_NUMBER_INT) == false) { // vérification du nombre de caractère du numéro de téléphone et de sa validité
        $content_tel = '<div class="error" style="color:red;">Le numéro est incorrect</div>';
    } else if ((filter_var($email, FILTER_VALIDATE_EMAIL) == false) || (preg_match('#yopmail\.com$#', $email))) //Vérification de la validité de l'adresse mail ainsi qu'isolation des emails poubelles
    {
        $content_mail = '<div class="error" style="color:red;">Adresse email incorrect</div>';
    } else if (empty($mdp) || $usermanager->check_mdp($mdp, $confpass) == false) {
        $content_mdp = '<div class="error" style="color:red;">Votre mot de passe est incorrect ou ne correspond pas</div>';
    } else if ($gender != 'Femme' && $gender != 'Homme' && $gender != 'Autre') {
        $content_gender = '<div class="error" style="color:red;">Veuillez sélectionner un genre</div>';
    } else {
        $user = new User($_POST);
        $usermanager->addUser($user);
        header('location:login.php');
        exit();
    }
}
