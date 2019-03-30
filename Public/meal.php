<?php include "templates/header.php"; ?>

<?php 
if (isset($_POST['submit'])) {
	
    require "../config.php"; 
    
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_mealrecording = array( 
    "foodtype"    => $_POST['foodtype'], 
    "fooddate"    => $_POST['fooddate'],
);
        
 $sql = "INSERT INTO mealrecording (foodtype, fooddate) VALUES (:foodtype, :fooddate)";    
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_mealrecording);

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>

<div class="jumbotron"><h2>Meal Recordings</h2>
    Use this nifty tracker to track what food your snake is eating, and the date on which they ate their food! Snakes usually eat on a schedule, so it's important to make sure they are eating on time.</div>

<?php if (isset($_POST['submit']) && $statement) { ?>
<div class="alert alert-success">
  <strong>Success!</strong> Entry Sucessfully added.
</div>
<?php } ?>
<div class="form-group row">
<form method="post">
    <div class="col-xs-2">
    <label for="foodtype"><b>Food Type</b></label><br>
    What was the last food item your snake ate?<br>
    <div class="col-xs-2">
        <input type="text" class="form-control" placeholder="Enter food item here!" name="foodtype" id="foodtype"><br></div>

    <div class="col-xs-2">
    <label for="fooddate"><b>Date Eaten</b></label><br>
        <input type="date" class="form-control" name="fooddate" id="fooddate"><br><br></div>
    
    <input class= "btn btn-outline-secondary" type="submit" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>