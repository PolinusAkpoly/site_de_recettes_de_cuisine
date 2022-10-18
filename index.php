<?php session_start(); // $_SESSION ?>

<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Site de recettes</h1>

        <!-- inclusion des variables et fonctions -->
        <?php
            include_once('variables.php');
            include_once('functions.php');
        ?>

<?php include_once('login.php'); ?>

        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>
        

   <?php if(isset($_SESSION['loggedUser'])): ?>
        <?php foreach(getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
            </article>
            <ul class="list-group list-group-horizontal">
               <li class="list-group-item"><a class="link-warning" href="update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
               <li class="list-group-item"><a class="link-danger" href="delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>
                        
            </ul>
        <?php endforeach ?>
        <?php endif; ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>