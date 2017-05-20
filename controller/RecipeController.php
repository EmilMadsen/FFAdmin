<?php
session_start();

include ('APIController.php');


if(isset($_POST['recipeName']) && isset($_POST['recipeDescription']))
{
    $recipeName = $_POST['recipeName'];
    $recipeDescription = $_POST['recipeDescription'];

    switch($_POST['method'])
    {
        case 'create':
            createRecipe($recipeName, $recipeDescription);
            break;
        default:
            header('location: ../view/recipes/index.php?default');
    }

}

function createRecipe($recipeName, $recipeDescription)
{

    $url = '/recipes';
    $arr = array(
        'recipeName' => $recipeName,
        'recipeDescription' => $recipeDescription,
        'recipeImageFilePath' => "text",
        'recipeType' => array(
            'recipeTypeId' => 1
        ),
        'measuredIngredients' => array(array(
            'ingredient' => array(
                'ingredientId' => 1
            ),
            'amount' => 2.2,
            'measure' => "litre"
        ))
    );

    $arr = json_encode($arr);
//
//    var_dump($arr);
//    exit;

    $response = postToApi($url, $arr);

//    var_dump($response);
//    exit;

    //echo $response;
    //echo "<script>alert('Message');</script>";

    header('location: ../view/recipes/index.php?success');

}