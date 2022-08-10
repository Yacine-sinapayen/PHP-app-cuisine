<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('header.php'); ?>
    <div class="container">
        <a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>
        <h1>Site de recettes</h1>

        <form action="contact.php" method="GET">
            <!-- données à faire passer à l'aide d'inputs -->
            <input name="nom">
            <input name="prenom">
        </form>

        <!-- Inclusion des variables et fonctions -->
        <?php
        include_once('variables.php');
        include_once('functions.php');
        ?>

        <!-- Inclusion du header -->
        <?php
        include_once('header.php');
        ?>

        <!-- Je boucle sur mes recettes et mes auteurs -->
        <?php foreach (getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
            </article>
        <?php endforeach ?>
    </div>

    <!-- Inclusion du footer -->
    <?php
    include_once('footer.php');
    ?>
</body>

</html>