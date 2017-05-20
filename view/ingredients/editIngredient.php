<?php
session_start();

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

if(isset($_GET['id']))
{
    include_once('../../model/Ingredient.php');
    include_once('../../model/Allergy.php');

    $ingredient = (new Ingredient())->getIngredientWithAllergies($_GET['id']);
    $allergies = (new Allergy())->getAllergies();

}

include('../navbar.php');

?>

<html>
<head>
    <title>Edit Ingredient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="margin: 0 auto; width: 20%">
    <h1 class="form-signup-heading">Edit Ingredient</h1>
    <div style="margin-top: 30px; margin-bottom: 30px">
        <form action="../../controller/IngredientController.php" method="post">
            <input type="hidden" name="method" value="edit">
            <input type="hidden" name="id" value="<?php echo $ingredient->getIngredientId() ?>">
            <label for="ingredientName" class="sr-only">Name</label>
            <input type="text" name="ingredientName" id="ingredientName" class="form-control" value="<?php echo $ingredient->getIngredientName() ?>" style="border-radius: 0" required>
            <br>
            <label for="ingredientDescription" class="sr-only">ingredientDescription</label>
            <textarea type="text" name="ingredientDescription" id="ingredientDescription" class="form-control" style="border-radius: 0" required><?php echo $ingredient->getIngredientDescription()?></textarea>
            <br>

            <?php foreach ($allergies as $allergy)
            {
                $match = false;
                foreach ($ingredient->getAllergies() as $ingredientAllergy)
                {
                    if($allergy->getAllergyId() == $ingredientAllergy->getAllergyId()) $match = true;

                }
                if($match)
                { ?>
                    <input type="checkbox" checked name="allergies[]" value="<?php echo $allergy->getAllergyId() ?>"/><?php echo $allergy->getAllergyName() ?><br>
                <?php }
                else
                { ?>
                    <input type="checkbox" name="allergies[]" value="<?php echo $allergy->getAllergyId() ?>"/><?php echo $allergy->getAllergyName() ?><br>
                <?php }
            }?>


            <br>
            <input class="standardButton" style="width: 100%" type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>