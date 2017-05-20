<?php

session_start();

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

include('../navbar.php');
?>

<html>
<head>
    <title>Create Allergy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="margin: 0 auto; width: 20%">
    <h1 class="form-signup-heading">Create Allergy</h1>
    <div style="margin-top: 30px; margin-bottom: 30px">
        <form action="../../controller/AllergyController.php" method="post">
            <input type="hidden" name="method" value="create">
            <label for="allergyName" class="sr-only">Name</label>
            <input type="text" name="allergyName" id="allergyName" class="form-control" placeholder="Name"  required>
            <br>
            <label for="allergyDescription" class="sr-only">AllergyDescription</label>
            <textarea type="text" name="allergyDescription" id="allergyDescription" class="form-control" placeholder="Description" required></textarea>
            <br>
            <input class="standardButton" style="width: 100%" type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
