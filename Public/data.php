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

<div class="jumbotron"><h2>Snake Data!</h2>
Here is all the snake data you've recorded, isn't it impressive? Here you can edit and delete any entries that you've made!</div>


<h3>Meal Data</h3>

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


        <h3>Shed Data</h3>

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


        <h3>Weight Data</h3>

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