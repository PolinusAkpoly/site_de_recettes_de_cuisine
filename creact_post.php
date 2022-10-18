







<?php
session_start();


if ((!isset($_POST['title']) || empty($_POST['title']) ) || (!isset($_POST['recipe']) || empty($_POST['recipe'])))
{
	echo('Il faut un title et une recette valides pour soumettre le formulaire.');
    return;
}


try
{
	$mysqlClient = new PDO('mysql:host=localhost;dbname=we_love_food; charset=utf8', 'root');
}
catch (Exception $e)
{
      die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = 'INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)';

// Préparation
$insertRecipe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La recette est maintenant en base de données
$insertRecipe->execute([
    'title' => $_POST['title'],
    'recipe' => $_POST['recipe'],
    'author' => $_SESSION['loggedUser'],
    'is_enabled' => 1, // 1 = true, 0 = false
]);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
    <title>Document</title>
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container">
    <?php include_once('header.php'); ?>
 
<h1>Recette ajoutée avec succès !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <h5 class="card-title"> <?php echo $_POST['title']; ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $_SESSION['loggedUser']; ?></p>
                <p class="card-text"><b>Recipe</b> : <?php echo $_POST['recipe']; ?></p>
            </div>
        </div> 
       
</div>

<?php include_once('footer.php'); ?>
</body>
</html>












































































