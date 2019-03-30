<?php 

    require "../config.php";
    require "common.php";

    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            

            $weightrecording =[
              "id"  => $_POST['id'],
              "weight"  => $_POST['weight'],
              "weightdate"  => $_POST['weightdate'],
            ];
            

            $sql = "UPDATE `weightrecording`
                        SET id = :id, 
                        weight = :weight, 
                        weightdate = :weightdate
                        WHERE id = :id";
            
            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($weightrecording);
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
            $sql = "SELECT * FROM weightrecording WHERE id = :id";
            
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

<div class="jumbotron"><h2>Edit Weight Data</h2></div>

<?php if (isset($_POST['submit']) && $statement) : ?>
<div class="alert alert-success">
  <strong>Success!</strong> Entry sucessfully updated.
</div>
<?php endif; ?>

<form method="post">
    
    ID = <?php echo escape($weightrecording['id']); ?><br><br>
    
    <label for="foodtype"><b>Weight (in pounds)</b></label><br>
    <input type="text" name="weight" id="weight" class="form-control" value="<?php echo escape($mealrecording['weight']); ?>"><br>

    <label for="fooddate"><b>Weight Recorded on</b></label><br>
    <input type="date" name="weightdate" id="weightdate" class="form-control" value="<?php echo escape($mealrecording['weightdate']); ?>"><br>

    <input type="submit" name="submit" class= "btn btn-outline-secondary" value="Save">

</form>

<?php include "templates/footer.php"; ?>