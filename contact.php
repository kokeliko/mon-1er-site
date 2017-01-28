<?php include("html/header.php"); ?>
<?php include("html/container.php"); ?>
<?php include("html/footer.php"); ?>
<?php include("html/formulaire.php"); ?>




<?php
//1-initialisations des variables
$firstname = $name = $email = $message = "";
$confirmation = "";
$errors = [];


//2-si le formulaire est soumis
//$_POST n'est pas vide
// je vais traiter la réponse
if (!empty($_POST)) {

		// 2a-on récupère les données soumises
        $firstname = filter_var(trim($_POST["firstname"]), FILTER_SANITIZE_STRING);
		$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
		$email = filter_var(trim( $_POST["email"]), FILTER_SANITIZE_EMAIL);
		$message = filter_var(trim( $_POST["message"]), FILTER_SANITIZE_STRING);

	//2-b on vérifie qu'il n'y a pas d'erreurs
	// aucun champ ne doit être vide
	// si le formulaire a été soumis mais que l'input est vide
    if (empty ($firstname)) {
		//s'il y a une erreur je l'ajoute au tableau
		$errors["firstname"] = "Bah alors!! On ne se souvient plus de son prénom!";
	}

	if (empty ($name)) {
		//s'il y a une erreur je l'ajoute au tableau
		$errors["name"] = "He he, le nom ne va pas s'écrire tout seul!";
	}
	// si le mail est vide
		if (empty ($email)) {
			$errors["email"] = "Pour pouvoir te répondre, on va avoir besoin de ton email. On n'est pas des sauvages!";
		}
		// s'il n'est pas vide mais  le mail a un format invalide
		elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors["email"] = "Email invalide";
		}
			if (empty ($message)) {
				$errors["message"] = "Raconte nous tout...mais pas toute ta vie quand même!";
			}

	//2c-s'il n'y a pas d'erreurs
	if (!empty($errors)) {

	// on confirme que c'est ok à l'utilisateur
	$confirmation = "Ton message a bien été envoyé, on te recontacte avant la fin de la décennie";

	// on envoie un mail à l'admin
	$subject = "Nouveau message de " . $email;
	$contentEmail = "auteur: " . $firstname . $name . ", email: " . $email . ", contenu :";
	$contentEmail .= $message;
	mail ("ninoredad@hotmail.com", $subject, $contentEmail);

	//je vide les valeurs dans les champs
	$firstname = $name = $email = $message = "";

}
}

 ?>
