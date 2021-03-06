<?php
session_start(); // used for sending auth_token

include ('../navbar.php');

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<center><h1>Meal Types</h1></center>

<div class="container" style="margin-top: 30px">
    <table class="table table-bordered table-responsive table-hover">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Published</th>
        </thead>

        <tbody>
        <?php

        include('../../model/MealType.php');

        $mealtypes = (new MealType())->getMealTypes($_SESSION['auth_token']);

        if (!is_null($mealtypes)) {
            foreach ($mealtypes as $mealtype){

                echo
                    '<tr>' .
                    '<td>' . $mealtype->getMealTypeId()  . '</td>' .
                    '<td>' . $mealtype->getMealTypeName() . '</td>' .
                    '<td>' . $mealtype->getPublished() . '</td>';

                if($mealtype->getPublished() == 'false'){

                    echo
                        '<form action="../../controller/APIController.php" method="post">' .
                        '<td>' .
                        '<input type="hidden" name="to_approve" value="'. $mealtype->getMealTypeId() .'">' .
                        '<input type="hidden" name="return_to" value="mealtypes">' .
                        '<button title="Approve" class="iconButton"><i class="fa fa-check-square"></i></button>' .
//                                    '<input class="btn btn-danger" type="submit" name="submit" value="Delete">' .
                        '</td>' .
                        '</form>';
                }
                echo
                    '</tr>';
            }
        }
        else {
            echo "0 results";
        }

        ?>
        </tbody>
    </table>
    <input class="standardButton marginTop marginBot" type="button" value="Create Meal Type" onclick="location.href = 'createMealType.php'">
</div>