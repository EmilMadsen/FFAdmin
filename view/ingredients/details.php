<?php
session_start();

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}
include('../navbar.php');

include('../../model/Ingredient.php');

$ingredientWithAllergies = (new Ingredient())->getIngredientWithAllergies($_GET['id']);

//var_dump($ingredientAllergies);
//exit;




?>

<html>
<head>
    <title>Ingredient Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container marginTop">

    <!--   SHOOT OUT THE INGREDIENT WITH ALLERGIES -->
        <?php

            echo
            '<label>Ingredient Id: &nbsp;</label>' . $ingredientWithAllergies->getIngredientId() . '<br>' .
            '<label>Ingredient Name: &nbsp;</label>' . $ingredientWithAllergies->getIngredientName() . '<br>' .
            '<label>Ingredient Description: &nbsp;</label>' . $ingredientWithAllergies->getIngredientDescription() . '<br><br>' .
            '<label>Allergies:</label> <br>'
            ;

            foreach ($ingredientWithAllergies->getAllergies() as $allergy)
            {
                echo
                    '<li>' . $allergy->getAllergyName() . '<br>'
                ;
            }
        ?>




    </div>

</body>
</html>

