<?php include "templates/header.php"; ?>


<div class="jumbotron"><h2>Sign up and start recording snake stuff!</h2>
check the url above to see if your sign up was sucessful. It should tell you if it is! If you are sucessful, you can go ahead and log into the website</div>

<form action="includes/signup.inc.php" method="post"><br>
    <label for="username"><b>Username</b></label><br>
    <input class="form-control" type="text" name="uid" placeholder="Username"><br>
    <label for="email"><b>Email</b></label><br>
    make sure you use a valid email, or it won't work!<br>
    <input  class="form-control" type="text" name="mail" placeholder="Email"><br>
    <label for="password"><b>Password</b></label><br>
    <input  class="form-control" type="password" name="pwd" placeholder="Password"><br>
    <label for="passwordrepeat"><b>Password Repeat</b></label><br>
    make sure it's the same as your first password!<br>
    <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat Password"><br>
<button type="submit" class= "btn btn-outline-secondary" name="signup-submit">Sign Up</button>
</form>

<?php include "templates/footer.php"; ?>