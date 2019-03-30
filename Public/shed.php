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

<div class="jumbotron"><h2>Shed Recordings</h2>
    Snakes shed a lot as they grow! It's important to monitor when your snake sheds; it's a good way to tell if they are healthy or not!</div>

<?php if (isset($_POST['submit']) && $statement) { ?>
<div class="alert alert-success">
  <strong>Success!</strong> Entry Sucessfully added.
</div>
<?php } ?>

<div class="form-group row">
<form method="post">
    <div class="col-xs-2">
    <label for="sheddate">Shed Date</label><br>
    When was the date of your snake's last shed?<br>
            <div class="col-xs-2">
<input type="date" class="form-control" name="sheddate" id="sheddate"><br><br>
    
        <input type="submit" class= "btn btn-outline-secondary" name="submit" value="Submit">
    </div>
</form>

<?php include "templates/footer.php"; ?>