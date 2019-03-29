<?php include "templates/header.php"; ?>

<?php 
if (isset($_POST['submit'])) {
	
    require "../config.php"; 
    
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_shedrecording = array( 
    "sheddate"    => $_POST['sheddate'], 
);
        
 $sql = "INSERT INTO shedrecording (sheddate) VALUES (:sheddate)";    
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_shedrecording);

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>

<h2>Record Last Shed</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Work successfully added.</p>
<?php } ?>

<form method="post">
    <label for="sheddate">Shed Date</label>
<input type="date" name="sheddate" id="sheddate"><br><br>
    
        <input type="submit" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>