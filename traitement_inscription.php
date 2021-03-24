<?php
$content_pseudo = "";
$content_mail = "";
$content_mdp = "";
$content_gender = "";
$content_tel = "";
if (isset($_POST['submit'])) {
    extract($_POST);
    if (check_pseudo($pseudo, $pdo) == false) {
        $content_pseudo = '<div class="error" style="color:red;">Ce pseudo n\'est pas disponible</div>';
    } else if (strlen($tel) != 10 || filter_var($tel, FILTER_SANITIZE_NUMBER_INT) == false) {
        $content_tel = '<div class="error" style="color:red;">Le numéro est incorrect</div>';
    } else if ((filter_var($email, FILTER_VALIDATE_EMAIL) == false) || (preg_match('#yopmail\.com$#', $email))) //Vérification de la validité de l'adresse mail ainsi qu'isolation des emails poubelles
    {
        $content_mail = '<div class="error" style="color:red;">Adresse email incorrect</div>';
    } else if (check_mdp($password, $confpass) == false) {
        $content_mdp = '<div class="error" style="color:red;">Votre mot de passe est incorrect ou ne correspond pas</div>';
    } else if ($genre != 'Femme' && $genre != 'Homme' && $genre != 'Autre') {
        $content_gender = '<div class="error" style="color:red;">Veuillez sélectionner un genre</div>';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        addUser($pdo, $pseudo, $email, $password, $genre, $adresse, $tel, 0);
    }
}
?>