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


<div class="jumbotron"><h2>Edit Food Entries</h2></div>

<?php if (isset($_POST['submit']) && $statement) : ?>
<div class="alert alert-success">
  <strong>Success!</strong> Entry sucessfully updated.
</div>
<?php endif; ?>

<form method="post">
    
    ID = <?php echo escape($mealrecording['id']); ?><br><br>
    
    <label for="foodtype"><b>Food Type</b></label><br>
    <input type="text" name="foodtype" class="form-control" id="foodtype" value="<?php echo escape($mealrecording['foodtype']); ?>"><br>

    <label for="fooddate"><b>Date Eaten</b></label><br>
    <input type="date" name="fooddate" class="form-control" id="fooddate" value="<?php echo escape($mealrecording['fooddate']); ?>"><br>

    <input type="submit" class= "btn btn-outline-secondary" name="submit" value="Save">

</form>

<?php include "templates/footer.php"; ?>