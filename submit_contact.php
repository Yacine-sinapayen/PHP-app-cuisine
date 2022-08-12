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

/*-------- Testons que le fichier(piece jointe au formulaire) a bien été envoyée et qu'il n'y a pas de msg d'erreur --------*/
if(isset($_FILES['screenshot']) && $_FILES['screenshot']['error']=== 0){
    // Je vérifie que la taille du fichié ne dépasse pas 1MO
    if($_FILES['screenshot']['size'] <= 1000000){
        // Je vérifie l'extension du fichier pour être sûr que c'est un image et pour ce protéger des script php
            // je récupère l'extension du fichier dans uen variable
            // La fonction pathinfo renvoie un tableau (array) contenant entre autres l'extension du fichier dans  $fileInfo['extension']
        $fileInfo = pathinfo($_FILES['screenshot']['name']);
        $extension = $fileInfo['extension'];
        // je stock les extensions que j'autorise dans une variables
        $alowedExtensions = ['jpg', 'jpeg','gif', 'png'];
        // Une fois l'extension récupérée, on peut la comparer à un tableau d'extensions autorisées, et vérifier si l'extension récupérée fait bien partie des extensions autorisées à l'aide de la fonction in_array()
        if (in_array($extension, $alowedExtensions)){
            //Si tout est bon, on accepte le fichier définitivement en appelant la fonction move_uploaded_file()
            move_uploaded_file(
                // ['name'] est le nom du chemin sous lequelle sera stocké le fichié
                //['tmp_name'] est le nom temporaire du fichié
            $_FILES['screenshot']['name']['tmp_name'], 'uploads/'
            // basename() permet d'extraire le nom di fichier "fichier.png exemple" depuis ['name'];
            .basename($_FILES['screenshot']['name']));
            echo "l'envoi a bien été effectué !";

        }

    }
}
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