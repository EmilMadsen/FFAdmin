<?php
session_start();

include ('APIController.php');

if(isset($_POST['mealTypeName']))
{
    switch($_POST['method'])
    {
        case 'create':
            createMealType($_POST['mealTypeName']);
            break;
        default:
            header('location: ../view/mealtypes/index.php?default');
    }
}
if(isset($_POST['recipeTypeName']))
{
    switch($_POST['method'])
    {
        case 'create':
            createRecipeType($_POST['recipeTypeName']);
            break;
        default:
            header('location: ../view/recipetypes/index.php?default');
    }
}


function createRecipeType($recipeTypeName)
{
    $url = '/recipeTypes';
    $arr = array(
        'recipeTypeName' => $recipeTypeName
    );

    $arr = json_encode($arr);

    $response = postToApi($url, $arr);

    header('location: ../view/recipetypes/index.php?success');
}


function createMealType($mealTypeName)
{
    $url = '/mealTypes';
    $arr = array(
        'mealTypeName' => $mealTypeName
    );

    $arr = json_encode($arr);

    $response = postToApi($url, $arr);

    header('location: ../view/mealtypes/index.php?success');
}