<?php 

    require "../config.php";
    require "common.php";

    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            

            $mealrecording =[
              "id"  => $_POST['id'],
              "foodtype"  => $_POST['foodtype'],
              "fooddate"  => $_POST['fooddate'],
            ];
            

            $sql = "UPDATE `mealrecording`
                        SET id = :id, 
                        foodtype = :foodtype, 
                        fooddate = :fooddate
                        WHERE id = :id";
            
            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($mealrecording);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }


    if (isset($_GET['id'])) {

        
        try {

            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM mealrecording WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $mealrecording = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };
?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work successfully updated.</p>
<?php endif; ?>

<h2>Edit Data</h2>

<form method="post">
    
    ID = <?php echo escape($mealrecording['id']); ?><br>
    
    <label for="foodtype">Food Type</label>
    <input type="text" name="foodtype" id="foodtype" value="<?php echo escape($mealrecording['foodtype']); ?>">

    <label for="fooddate">Date Eaten</label>
    <input type="date" name="fooddate" id="fooddate" value="<?php echo escape($mealrecording['fooddate']); ?>">

    <input type="submit" name="submit" value="Save">

</form>

<?php include "templates/footer.php"; ?>