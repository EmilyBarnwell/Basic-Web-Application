<?php 

	
    require "../config.php"; 
    
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		 
        $sql = "SELECT * FROM mealrecording";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
?>


<?php include "templates/header.php"; ?>

        <h2>Meal Data</h2>

            <?php 
                  foreach($result as $row) { 
            ?>

            <p>
                ID:
                <?php echo $row["id"]; ?><br> 

                Food Eaten:
                <?php echo $row['foodtype']; ?><br> 

                Date Eaten:
                <?php echo $row['fooddate']; ?><br> 

                <a href='update-food.php?id=<?php echo $row['id']; ?>'>Edit Entry</a> | <a href='delete-food.php?id=<?php echo $row['id']; ?>'>Delete Entry</a>
                

<?php
?>

<hr>
<?php }; //close the foreach
?>

<?php 

	
    require "../config.php"; 
    
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		 
        $sql = "SELECT * FROM shedrecording";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
?>


        <h2>Shed Data</h2>

            <?php 
                  foreach($result as $row) { 
            ?>

            <p>
                ID:
                <?php echo $row["id"]; ?><br> 

                Shed Date:
                <?php echo $row['sheddate']; ?><br> 

                <a href='update-shed.php?id=<?php echo $row['id']; ?>'>Edit Entry</a> | <a href='delete-shed.php?id=<?php echo $row['id']; ?>'>Delete Entry</a>
                
                

<?php
?>
                
                <hr>
<?php }; //close the foreach
?>
                
                <?php 

	
    require "../config.php"; 
    
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		 
        $sql = "SELECT * FROM weightrecording";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
?>


        <h2>Weight Data</h2>

            <?php 
                  foreach($result as $row) { 
            ?>

            <p>
                ID:
                <?php echo $row["id"]; ?><br> 

                Weight:
                <?php echo $row['weight']; ?><br> 
                
                Recorded on:
                <?php echo $row['weightdate']; ?><br>

                <a href='update-weight.php?id=<?php echo $row['id']; ?>'>Edit Entry</a> | <a href='delete-weight.php?id=<?php echo $row['id']; ?>'>Delete Entry</a>
                

<?php
?>


<hr>
<?php }; //close the foreach
?>






<?php include "templates/footer.php"; ?>