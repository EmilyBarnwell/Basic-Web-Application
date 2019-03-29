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

<h2>Record Weight</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Weight Recorded.</p>
<?php } ?>

<form method="post">
    <label for="weight">Weight</label>
    <input type="weight" name="weight" id="weight"> pounds

    <label for="weightdate">Date Weight Was Taken</label>
    <input type="date" name="weightdate" id="weightdate">
    
    <input type="submit" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>