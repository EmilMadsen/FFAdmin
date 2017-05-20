<?php
session_start();

//sets auth_token on session, second time the file is loaded.
if(isset($_POST['auth_token']))
{
    $_SESSION['adminName'] = $_POST['adminName'];
    $_SESSION['auth_token'] = $_POST['auth_token'];
    $_SESSION['loggedIn'] = true;

    header('location: /FFAdmin/view/allergies/index.php');
    exit;
}

if (!isset($_POST["email"]) && isset($_POST["password"]))
{
    header("location: login.php?error");
}

    $email = $_POST['email'];
    $password = $_POST['password'];

?>

Processing...



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/myRedirect.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script src="js/firebaseInit.js"></script>

<!-- Firebase signin-->
<script>

    firebase.auth().signInWithEmailAndPassword("<?php echo $email;?>", "<?php echo $password;?>").then(function(onResolve, onReject) {

//        console.log("IM INSIDE AUTH");

        if(onResolve == null)
        {
//            console.log("ERROR");
        }
        if(onReject == null)
        {
            var user = firebase.auth().currentUser;
            console.log(user);

            firebase.auth().currentUser.getToken(/* forceRefresh */ false).then(function(idToken) {
                // Send token to your backend via HTTPS
                // ...
                this.token = idToken;

//                console.log(idToken);

                post('/FFAdmin/loginHandler.php', {auth_token: this.token, userEmail: user.email});

            }).catch(function(error) {
                // Handle error
            });


        }
    });

</script>
