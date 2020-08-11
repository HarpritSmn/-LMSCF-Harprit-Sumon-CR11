<?php 

    require_once 'dbconnect.php';

    if ($_POST) {
        $animal = $_POST['animal'];
        $name = $_POST['name'];
        $age = $_POST[ 'age'];
        $type = $_POST[ 'type'];
        $description = $_POST[ 'description'];
        $hobbies = $_POST[ 'hobbies'];
        $image = $_POST[ 'image'];
        $city = $_POST[ 'city'];
        $zip = $_POST[ 'zip'];
        $address = $_POST[ 'address'];
        

        $sql = "INSERT INTO animals (animals_animal, animals_name, animals_age, animals_type, animals_description, 
        animals_hobbies, animals_image, animals_city, animals_zip, animals_address) VALUES ('$animal',
        '$name', '$age', '$type', '$description', '$hobbies', '$image', '$city', '$zip','$address')";
            if($conn->query($sql) === TRUE) {
            echo "<p>New Record Successfully Created</p>" ;
            echo "<a href='../create.php'><button type='button'>Back</button></a>";
                echo "<a href='../indeks.php'><button type='button'>Home</button></a>";
        } else  {
            echo "Error " . $sql . ' ' . $conn->connect_error;
        }

        $conn->close();
    }

?>