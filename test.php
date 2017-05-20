<?php

//$allergiesUrl = 'http://80.255.6.114:4568/allergies';
//
//$allergiesJson = file_get_contents($allergiesUrl);
//$allergiesArray = json_decode($allergiesJson, true);
//
////var_dump($allergiesArray);
//
//foreach ($allergiesArray as $allergy)
//{
//    foreach ($allergy as $innerAllergy)
//    {
//        echo $innerAllergy['allergyId'] . '<br>';
//        echo $innerAllergy['allergyName'] . '<br>';
//        echo $innerAllergy['allergyDescription'] .'<br><br>';
//    }
//}

//////////////// POST TEST ///////////////

$url = 'http://kaempe.club:8654/mealTypes';
$arr = array('mealTypeName' => 2);
$arr = json_encode($arr);
$auth_token = "AJly3UVydKgJxcclyCcJvk9LvD8beSwlyHH6h3sKNAHj8In7tQ6Smwr2Y235nsZF1n9t-TiosMv84K4tEcrr-pPJbC9ylmMjGovHtGI7Gpjcv-PaDlMn3Y9kbvozaXiFtyQiSrK1MfIohgn_Mia-8g3f8b23MJwEU8zRZBDA89z-FxgIEjsefbqfduFsX-wAI_AVYUSYHjfv";


$options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => $arr,
        'header'=>
            "Content-Type: application/json\r\n" .
            "Accept: application/json\r\n" .
            "Authorization: " . $auth_token ."\r\n"

    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );

echo $response;

/////////// GET TEST ////////

//$url = 'http://kaempe.club:8654/allergies';
//$auth_token = "AJly3UVydKgJxcclyCcJvk9LvD8beSwlyHH6h3sKNAHj8In7tQ6Smwr2Y235nsZF1n9t-TiosMv84K4tEcrr-pPJbC9ylmMjGovHtGI7Gpjcv-PaDlMn3Y9kbvozaXiFtyQiSrK1MfIohgn_Mia-8g3f8b23MJwEU8zRZBDA89z-FxgIEjsefbqfduFsX-wAI_AVYUSYHjfv";
//
//$options = array(
//    'http' => array(
//        'method'  => 'GET',
//        //'content' => $arr,
//        'header'=>
//            "Content-Type: application/json\r\n" .
//            "Accept: application/json\r\n" .
//            "Authorization: " . $auth_token ."\r\n"
//    )
//);
//
//$context  = stream_context_create( $options );
//$result = file_get_contents( $url, false, $context );
//$response = json_decode( $result, true );
//
//include ('model/Allergy.php');
//
//foreach ($response as $allergy)
//{
////    var_dump($response);
//    foreach ($allergy as $innerAllergy)
//    {
//        $tempAllergy = new Allergy($innerAllergy['allergyId'], $innerAllergy['allergyName'], $innerAllergy['allergyDescription']);
//        $allergies[] = $tempAllergy;
//
//
////        echo $innerAllergy['allergyId'] . '<br>';
////        echo $innerAllergy['allergyName'] . '<br>';
////        echo $innerAllergy['allergyDescription'] .'<br><br>';
//    }
//}
//var_dump($allergies);
