<?php

session_start();

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

include('../navbar.php');

include_once('../../model/RecipeType.php');
$recipeTypes = (new RecipeType())->getRecipeTypes();

include_once('../../model/Ingredient.php');
$ingredients = (new Ingredient())->getIngredients();

?>

<html>
<head>
    <title>Create Recipe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="margin: 0 auto; width: 20%">
    <h1 class="form-signup-heading">Create Recipe</h1>
    <div style="margin-top: 30px; margin-bottom: 30px">
        <form action="../../controller/RecipeController.php" method="post">
            <input type="hidden" name="method" value="create">
            <label for="recipeName" class="sr-only">Name</label>
            <input type="text" name="recipeName" id="recipeName" class="form-control" placeholder="Name" style="border-radius: 0" required>
            <br>

            <label for="recipeDescription" class="sr-only">Description</label>
            <textarea type="text" name="recipeDescription" id="recipeDescription" class="form-control" placeholder="Description" required></textarea>
            <br>

            <select class="form-control" id="recipeType" name="recipeType" style="border-radius: 0">
                <option value="0">--Select Recipe Type--</option>
                <?php foreach ($recipeTypes as $recipeType){ ?>
                    <option value="<?php echo $recipeType->getRecipeTypeName() ?>"><?php echo $recipeType->getRecipeTypeName() ?></option>
                <?php  }?>
            </select>
            <br>

            <select class="form-control" id="ingredients" name="ingredients" style="border-radius: 0">
                <option value="0">--Select Ingredient--</option>
                <?php foreach ($ingredients as $ingredient){ ?>
                    <option value="<?php echo $ingredient->getIngredientName() ?>"><?php echo $ingredient->getIngredientName() ?></option>
                <?php  }?>
            </select>
            <br>

            <input class="standardButton" style="width: 100%" type="submit" value="Create">
        </form>
    </div>
</div>
</body>
</html>
