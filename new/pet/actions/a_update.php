
<?php 
ob_start();

session_start();

    require_once 'dbconnect.php';

    if ($_POST) {
       
        $animal = $_POST['animal'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $hobbies = $_POST['hobbies'];
        $image = $_POST['image'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];
        $address = $_POST['address'];
       
        $id = $_POST['id'];

       //$sql = "UPDATE animals SET animals_animal = '$animal', animals_name = '$name', animals_age = '$age', animals_type = '$type', animals_description = '$description', animals_hobbies = '$hobbies', animals_image = '$image', animals_city = '$city', animals_zip = '$zip', animals_address = '$address' WHERE animals_id = {$id}";
        
        //$sql = "UPDATE animals SET animals_animal = {$animal}, animals_name = {$name}, animals_age = {$age}, animals_type = {$type}, animals_description = {$description}, animals_hobbies = {$hobbies}, animals_image = {$image}, animals_city = {$city}, animals_zip = {$zip}, animals_address = {$address} WHERE animals_id = {$id} ";
        
        $sql = "UPDATE `animals` SET `animals_animal`=$animal, `animals_name`=$name, `animals_age`=$age,`animals_type`=$type,`animals_description`=$description,`animals_hobbies`=$hobbies,`animals_image`=$image,`animals_city`=$city,`animals_zip`=$zip,`animals_address`=$address WHERE animals_id = {$id}";
        
        if($conn->query($sql) === TRUE) {
            echo    "<p>Successfully Updated</p>";
            echo    "<a href='../update.php?id=" .$id."'><button type='button'>Back</button></a>";
            echo    "<a href='../index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error while updating record : ". $conn->error;
        }

        $conn->close();

    }

?>