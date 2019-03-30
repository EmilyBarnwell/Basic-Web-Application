<?php include "templates/header.php"; ?>

<?php 
if (isset($_POST['submit'])) {
	
    require "../config.php"; 
    
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_weightrecording = array( 
    "weight"    => $_POST['weight'], 
    "weightdate"    => $_POST['weightdate'],
);
        
 $sql = "INSERT INTO weightrecording (weight, weightdate) VALUES (:weight, :weightdate)";    
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_weightrecording);

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>

<div class="jumbotron"><h2>Weight Recordings</h2>
    Everyone likes to know how fat their pet is! It's important to monitor a baby snake's weight as they grow (to make sure they <i>are</i> growing, of course!).</div>

<?php if (isset($_POST['submit']) && $statement) { ?>
<div class="alert alert-success">
  <strong>Success!</strong> Entry Sucessfully added.
</div>
<?php } ?>
   <div class="form-group row">
<form method="post">
    <div class="col-xs-2">
    <label for="weight"><b>Weight</b></label><br>
    <input type="weight" name="weight" class="form-control" id="weight" placeholder="in pounds!"></div>&nbsp;
<div class="col-xs-2">
    <label for="weightdate"><b>Date Weight Was Taken</b></label>
    <input type="date" class="form-control" name="weightdate" id="weightdate"></div><br>
    
    <input type="submit" class= "btn btn-outline-secondary" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>