<?php
session_start();

include ('APIController.php');

if(isset($_POST['ingredientName']) && isset($_POST['ingredientDescription']))
{

//    var_dump($_POST['allergy']);
//    exit;
    $ingredientName = $_POST['ingredientName'];
    $ingredientDescription = $_POST['ingredientDescription'];
    $allergies = $_POST['allergies'];

    if(isset($_POST['id'])) $ingredientId = $_POST['id'];


    switch($_POST['method'])
    {
        case 'create':
            createIngredient($ingredientName, $ingredientDescription, $allergies);
            break;
        case 'edit':
            editIngredient($ingredientName, $ingredientDescription, $allergies, $ingredientId);
            break;
        default:
            header('location: ../view/ingredients/index.php?default');
    }
}

if(isset($_POST['method']) && $_POST['method'] == 'delete')
{
    $ingredientId = $_POST['id'];
    deleteIngredient($ingredientId);
}


function createIngredient($ingredientName, $ingredientDescription, $allergies)
{
    $url = '/ingredients';
    $arr = array(
        'ingredientName' => $ingredientName,
        'ingredientDescription' => $ingredientDescription,
        'allergies' => array()
    );

    //Sets allergieIds inside array
    foreach ($allergies as $allergy)
    {
        $arr['allergies'][] = array(
            'allergyId' => $allergy
        );
    }

    $arr = json_encode($arr);

    $response = postToApi($url, $arr);

    $_SESSION['msg'] = $response;

    header('location: ../view/ingredients/index.php?success');
}

function editIngredient($ingredientName, $ingredientDescription, $allergies, $ingredientId)
{
    $url = '/ingredients/' . $ingredientId;
    $arr = array(
        'ingredientName' => $ingredientName,
        'ingredientDescription' => $ingredientDescription,
        'allergies' => array()
    );

    //Sets allergieIds inside array
    foreach ($allergies as $allergy)
    {
        $arr['allergies'][] = array(
            'allergyId' => $allergy
        );
    }

    $arr = json_encode($arr);

    $response = putToApi($url, $arr);

    $_SESSION['msg'] = $response;

    header('location: ../view/ingredients/index.php?success');
}

function deleteIngredient($ingredientId)
{
    $url = '/ingredients/' . $ingredientId;

    $response = deleteFromApi($url);

    $_SESSION['msg'] = $response;

    var_dump($response);
    exit;

    header('location: ../view/ingredients/index.php?success');
}