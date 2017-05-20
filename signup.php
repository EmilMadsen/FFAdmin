<html>
<head>
    <title>Signup</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container" style="margin: 0 auto; width: 20%">

    <form class="form-signup" action="signupHandler.php" method="post">
        <h2 class="form-signup-heading">Sign Up</h2>
        <div style="margin-top: 30px; margin-bottom: 30px">
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" class="form-control squareMe" placeholder="Email" required autofocus>
            <br>
            <label for="adminName" class="sr-only">Admin Name</label>
            <input type="adminName" name="adminName" id="adminName" class="form-control squareMe" placeholder="Admin Name" required autofocus>
            <br>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control squareMe" placeholder="Password" required>
            <br>
        </div>
        <button class="btn btn-success btn-block squareMe" type="submit">Create Account</button>
    </form>

    <?php
    if (strpos( $_SERVER['REQUEST_URI'],'taken') !== false) {
        echo "<script>alert('Username is already in use');</script>";
    } else {
        //echo 'No ERROR.';
    }
    ?>

</div>
</body>
</html>



