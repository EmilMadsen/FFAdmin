<?php
session_start();

include ('APIController.php');


if(isset($_POST['allergyName']) && isset($_POST['allergyDescription']))
{
    $allergyName = $_POST['allergyName'];
    $allergyDescription = $_POST['allergyDescription'];
    $allergyId = $_POST['id'];

    switch($_POST['method'])
    {
        case 'create':
            createAllergy($allergyName, $allergyDescription);
            break;
        case 'edit':
            editAllergy($allergyName, $allergyDescription, $allergyId);
            break;
        case 'delete':
            deleteAllergy($allergyId);
            break;
        default:
            header('location: ../view/allergies/index.php?default');
    }
}

if(isset($_POST['method']) && $_POST['method'] == 'delete')
{
    $allergyId = $_POST['id'];
    deleteAllergy($allergyId);
}


function createAllergy($allergyName, $allergyDescription)
{
    $url = '/allergies';
    $arr = array(
        'allergyName' => $allergyName,
        'allergyDescription' => $allergyDescription
    );

    $arr = json_encode($arr);

    $response = postToApi($url, $arr);

    $_SESSION['msg'] = $response;

    header('location: ../view/allergies/index.php?success');

}

function editAllergy($allergyName, $allergyDescription, $allergyId)
{
    $url = '/allergies/' . $allergyId;
    $arr = array(
        'allergyName' => $allergyName,
        'allergyDescription' => $allergyDescription
    );

    $arr = json_encode($arr);

    $response = putToApi($url, $arr);

    $_SESSION['msg'] = $response;

    header('location: ../view/allergies/index.php?success');
}

function deleteAllergy($allergyId)
{
    $url = '/allergies/' . $allergyId;

    $response = deleteFromApi($url);

    $_SESSION['msg'] = $response;

    header('location: ../view/allergies/index.php?success');
}

