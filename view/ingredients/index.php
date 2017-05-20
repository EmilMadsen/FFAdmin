<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
session_start(); // used for sending auth_token

include ('../navbar.php');

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

?>

<body>

<center><h1>Ingredients</h1></center>

<div class="container" style="margin-top: 30px">
    <table class="table table-bordered table-responsive table-hover">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Published</th>
        </thead>

        <tbody>
        <?php

        include('../../model/Ingredient.php');

        $ingredients = (new Ingredient())->getIngredients($_SESSION['auth_token']);

        if (!is_null($ingredients)) {
            foreach ($ingredients as $ingredient){

                echo
                    '<tr>' .

                        '<td>' . $ingredient->getIngredientId() . '</td>' .
                        '<td>' . '<a href="details.php/?id=' . $ingredient->getIngredientId() .'">' . $ingredient->getIngredientName() . '</a>' . '</td>' .
                        '<td>' . $ingredient->getIngredientDescription() . '</td>' .
                        '<td>' . $ingredient->getPublished() . '</td>' .
                        // Edit Button
                        '<td>' .
                            '<button title="Edit" class="iconButton" onclick="location.href = \'editIngredient.php?id=' . $ingredient->getIngredientId() . '\'"><i class="fa fa-cogs"></i></button>'.
                        '</td>' .
                        // Delete Button
                        '<form action="../../controller/IngredientController.php" method="post">' .
                            '<td>' .
                                '<input type="hidden" name="id" value="'. $ingredient->getIngredientId() .'">' .
                                '<input type="hidden" name="method" value="delete">' .
                                '<button title="Delete" class="iconButton"><i class="fa fa-trash-o"></i></button>' .
                            '</td>' .
                        '</form>';


                if($ingredient->getPublished() == 'false'){

                    echo
                        '<form action="../../controller/APIController.php" method="post">' .
                            '<td>' .
                                '<input type="hidden" name="to_approve" value="'. $ingredient->getIngredientId() .'">' .
                                '<input type="hidden" name="return_to" value="ingredients">' .
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
    <input class="standardButton marginTop marginBot" type="button" value="Create Ingredient" onclick="location.href = 'createIngredient.php'">
</div>


<?php
if(isset($_SESSION['msg']))
{
    echo '<script type="text/javascript">alert("'.$_SESSION['msg'].'");</script>';

    $_SESSION['msg'] = null;
}
?>