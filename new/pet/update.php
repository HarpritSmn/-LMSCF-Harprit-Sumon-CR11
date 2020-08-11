<?php 
ob_start();

session_start();

require_once 'actions/dbconnect.php';

    // ------------------------------------------------------
    $id = $_GET["id"];
    $sql = "SELECT * FROM animals WHERE animals_id = $id";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_assoc();
    // ------------------------------------------------------

    // if ($_GET['id']) {
    //     $animals_id = $_GET['id'];

    //     $sql = "SELECT * FROM animals WHERE animals_id = {$id}";
    //     $result = $conn->query($sql);
    //     $data = $result->fetch_assoc();
    //     $conn->close();
?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>Edit Animal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>


    <p>Update user</p>

        <form action="actions/a_update.php" method="post">
            <table>  
                <tr>
                    <th>Animal</th>
                    <td><input type="text" name="animal" placeholder ="Animal" value="<?php echo $data['animals_animal'] ?>" /></td>
                </tr>    
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" placeholder ="name" value="<?php echo $data['animals_name'] ?>" /></td>
                </tr>    
                <tr>
                    <th>age</th>
                    <td><input type="text" name="age" placeholder ="age" value="<?php echo $data['animals_age'] ?>" /></td>
                </tr>    
                <tr>
                    <th>Type</th>
                    <td><input type="text" name="type" placeholder ="type" value="<?php echo $data['animals_type'] ?>" /></td>
                </tr>    
                <tr>
                    <th>Description</th>
                    <td><input type="text" name="description" placeholder ="description" value="<?php echo $data['animals_description'] ?>" /></td>
                </tr>    
                <tr>
                    <th>hobbies</th>
                    <td><input type="text" name="hobbies" placeholder ="hobbies" value="<?php echo $data['animals_hobbies'] ?>" /></td>
                </tr>    
                <tr>
                    <th>Image</th>
                    <td><input type="text" name="image" placeholder ="image" value="<?php echo $data['animals_image'] ?>" /></td>
                </tr>           
                <tr>
                    <th>City</th>
                    <td><input type="text" name="city" placeholder ="city" value="<?php echo $data['animals_city'] ?>" /></td>
                </tr>    
                <tr>
                    <th>Zip</th>
                    <td><input type="text" name="zip" placeholder ="zip" value="<?php echo $data['animals_zip'] ?>" /></td>
                </tr>    
                <tr>
                    <th>Address</th>
                    <td><input type="text" name="address" placeholder ="Address" value="<?php echo $data['animals_address'] ?>"/></td>
                </tr>    
                
                <tr>
                    <input type= "hidden" name= "id" value= "<?php echo $data['animals_id']?>" />
                    <td><button type="submit">Save Changes</button></td>
                    <td><a href= "indeks.php"><button type="button">Back</button></a></td>
                </tr>
            </table>
        </form>



    </body>
    </html>

    