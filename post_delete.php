<?php

$postData = $_POST;

if (!isset($postData['id']))
{
	echo('Il faut un identifiant valide pour supprimer une recette.');
    return;
}	

$id = $postData['id'];


try
{
	$mysqlClient = new PDO('mysql:host=localhost;dbname=we_love_food; charset=utf8', 'root');
}
catch (Exception $e)
{
      die('Erreur : ' . $e->getMessage());
}

$deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$deleteRecipeStatement->execute([
    'id' => $id,
]);

header('Location: http://localhost/tuto/index.php');
?>











