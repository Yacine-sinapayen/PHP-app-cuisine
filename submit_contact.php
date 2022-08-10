<?php
// Cette fonction vérifie si les variables envoyés depuis mon formulaire de contact à ma page "submit_contact.php" existent et si elles sont valident 
// isset() vérifie l'existence des variables
// filter_var() check la validé de l'email (le format)
// empty() pour check que le message ne soit pas vide. 
if (!isset($_POST['email']) || !isset($_POST['message']))
{
	echo('Il faut un email et un message pour soumettre le formulaire.');
    return;
}	

$email = $_POST['email'];
$message = $_POST['message'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - demande de Contact reçue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once('header.php'); ?>
    <div class="container">
        <h1>Message bien reçu !</h1>
        <h3>Sur cette page je récupère les données envoyées par le formulaire</h3>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo ($_POST['email']); ?></p>
                <p class="card-text"><b>Message</b> : <?php echo strip_tags($_POST['textarea']); ?></p>
            </div>
        </div>
    </div>
     
</body>

</html>