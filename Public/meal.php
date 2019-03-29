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

<h2>Record Last Meal</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Work successfully added.</p>
<?php } ?>

<form method="post">
    <label for="foodtype">Food Type</label>
    <input type="text" name="foodtype" id="foodtype">

    <label for="fooddate">Date Eaten</label>
    <input type="date" name="fooddate" id="fooddate">
    
    <input type="submit" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>