<?php 
    // include the config file 
    require "../config.php";
    require "common.php";
    // This code will only run if the delete button is clicked
    if (isset($_GET["id"])) {
	    // this is called a try/catch statement 
        try {
            // define database connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set id variable
            $id = $_GET["id"];
            
            // Create the SQL 
            $sql = "DELETE FROM mealrecording WHERE id = :id";
            // Prepare the SQL
            $statement = $connection->prepare($sql);
            
            // bind the id to the PDO
            $statement->bindValue(':id', $id);
            
            // execute the statement
            $statement->execute();
            // Success message
            $success = "Entry Successfully Deleted <br> <a href='data.php'>go back</a>";
        } catch(PDOException $error) {
            // if there is an error, tell us what it is
            echo $sql . "<br>" . $error->getMessage();
        }
    };
    // This code runs on page load
    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM mealrecording";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>

<?php include "templates/header.php"; ?>


<?php if ($success) echo $success; ?>

<!-- This is a loop, which will loop through each result in the array -->
<?php foreach($result as $row) { ?>

<p>
    ID:
    <?php echo escape($row['id']); ?><br> Food Type:
    <?php echo $row['foodtype']; ?><br> Date Food was Taken:
    <?php echo $row['fooddate']; ?>
    
    <a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
    
    <a href='data.php'>go back</a>
</p>

<hr>
<?php }; //close the foreach
?>




<?php include "templates/footer.php"; ?>
