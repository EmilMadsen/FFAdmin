<?php
if (strpos( $_SERVER['REQUEST_URI'],'error') !== false)
{
    echo "<script>alert('Something went wrong');</script>";
}
else if(strpos( $_SERVER['REQUEST_URI'],'auth') !== false)
{
    echo "<script>alert('Access Forbidden! Please Sign in!');</script>";
}
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/FFAdmin/css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="margin: 0 auto; width: 20%">
    <form class="form-signin" action="loginHandler.php" method="post">
        <h2 class="form-signin-heading">Welcome! Login!</h2>
        <div style="margin-top: 30px; margin-bottom: 30px">
            <label for="email" class="sr-only">Email</label>
            <input style="margin-bottom: 5px; border-radius: 0px" type="text" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
            <label for="password" class="sr-only">Password</label>
            <input style="border-radius: 0px" type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <input type="hidden" name="function" value="login">
            <input type="hidden" name="origin" value="access">
        </div>
        <button style="border-radius: 0px" class="btn btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <button style="border-radius: 0px" class="btn btn-default btn-block" type="submit" onclick="location.href = 'signup.php'">Sign up</button>
</div>

</body>
</html>