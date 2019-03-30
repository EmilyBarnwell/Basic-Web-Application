<?php include "templates/header.php"; ?>

<?php
if (isset($_SESSION['userID'])) {
echo '<p class="login-status"><b>Sucessfully logged in!</b><br>';
}

else {
echo '<p class="login-status"><b>You are logged out!</b><br>Why not register or log in?</p>';
}
?>
<div class="jumbotron">
<h2>Welcome to the Snake Tracker!</h2>
For all your snake tracking needs
</div>

<p>Use this wonderful tool to track all of your snake's data and progress as they grow. As many great snake owners may know, keeping track of weight, sheds, and eating schedules is very important if you want to raise a healthy and happy snake.</p>

<p><b>Sign up and log in to use the sites features!</b></p></div>


<?php include "templates/footer.php"; ?>