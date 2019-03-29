<?php 

    require "../config.php";
    require "common.php";

    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            

            $shedrecording =[
              "id"  => $_POST['id'],
              "sheddate"  => $_POST['sheddate'],
            ];
            

            $sql = "UPDATE `shedrecording`
                        SET id = :id,  
                        sheddate = :sheddate
                        WHERE id = :id";
            
            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($shedrecording);
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
            $sql = "SELECT * FROM shedrecording WHERE id = :id";
            
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
    
    <label for="sheddate">Shed Date Recorded</label>
    <input type="date" name="sheddate" id="sheddate" value="<?php echo escape($shedrecording['sheddate']); ?>">


    <input type="submit" name="submit" value="Save">

</form>

<?php include "templates/footer.php"; ?>