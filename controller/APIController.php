<?php

//Approve item with post values.
if(isset($_POST['return_to']))
{
    //Starting session in here, since the other methods are called in places where the session is already started.
    session_start();

    //Setting type, instead of reusing 'return_to' since its used in 'header' below, and not all directive names match.
    $type = $_POST['return_to'];
    if($_POST['return_to'] == 'mealtypes') $type = 'mealTypes';
    if($_POST['return_to'] == 'recipetypes') $type = 'recipeTypes';

    $url = 'http://kaempe.club/admin/' . $type . '/accept/' . $_POST['to_approve'];

    $options = array(
        'http' => array(
            'method'  => 'PUT',
            'header'=>
                "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: " . $_SESSION['auth_token'] ."\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode($result);

    header('location: ../view/' . $_POST['return_to'] . '/index.php');

}

function getFromApi($partUrl)
{

    $url = 'http://kaempe.club/admin' . $partUrl;

    $options = array(
        'http' => array(
            'method'  => 'GET',
            'header'=>
                "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: " . $_SESSION['auth_token'] ."\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $wrapper = json_decode( $result, true );

    return $wrapper;
}

function deleteFromApi($partUrl)
{
    $url = 'http://kaempe.club/admin' . $partUrl;

//    var_dump($url);
//    exit;

    $options = array(
        'http' => array(
            'method'  => 'Delete',
            'header'=>
                "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: " . $_SESSION['auth_token'] ."\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result );

    var_dump($response);
    exit;

    return $response;
}


function postToApi($partUrl, $data)
{
    $url = 'http://kaempe.club/admin' . $partUrl;

    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => $data,
            'header'=>
                "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: " . $_SESSION['auth_token'] ."\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result );

    return $response;
}

function putToApi($partUrl, $data)
{
    $url = 'http://kaempe.club/admin' . $partUrl;

    $options = array(
        'http' => array(
            'method'  => 'PUT',
            'content' => $data,
            'header'=>
                "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: " . $_SESSION['auth_token'] ."\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result );

    return $response;
}