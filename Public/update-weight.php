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

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work successfully updated.</p>
<?php endif; ?>

<h2>Edit Data</h2>

<form method="post">
    
    ID = <?php echo escape($weightrecording['id']); ?>
    
    <label for="foodtype">Weight</label>
    <input type="text" name="weight" id="weight" value="<?php echo escape($mealrecording['weight']); ?>">

    <label for="fooddate">Weight Recorded on</label>
    <input type="date" name="weightdate" id="weightdate" value="<?php echo escape($mealrecording['weightdate']); ?>">

    <input type="submit" name="submit" value="Save">

</form>

<?php include "templates/footer.php"; ?>