<?php
    ob_start();
    session_start();
    require_once 'actions/dbconnect.php';

    if(!isset($_SESSION['admin'])) {
        header("Location: home.php");
        exit;
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="display-4 d-flex justify-content-center">Pets</h1>
<div class="container">
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Animal</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">hobbies</th>
                <th scope="col">image</th>
                <th scope="col">city</th>
                <th scope="col">zip</th>
                <th scope="col">address</th>
            </tr>
        </thead>

        <tbody>
        <?php
           $sql = "SELECT * FROM animals";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo 
                        "<tr>
                            <td>"     .$row['animals_animal']        ."</td>
                            <td>"     .$row['animals_name']          ."</td>
                            <td>"     .$row['animals_age']           ."</td>
                            <td>"     .$row['animals_type']          ."</td>
                            <td>"     .$row['animals_description']   ."</td>
                            <td>"     .$row['animals_hobbies']       ."</td>
                            <td><img src="     .$row['animals_image']         ."></td>
                            <td>"     .$row['animals_city']          ."</td>
                            <td>"     .$row['animals_zip']            ."</td>
                            <td>"     .$row['animals_address']        ."</td>
                            <td>
                                <a href='update.php?id="  .$row['animals_id']     ."'><button type='button'>Edit</button></a>
                                <a href='delete.php?id="  .$row['animals_id']     ."'><button type='button'>Delete</button></a>
                            </td>
                        </tr>";
                }
            
            } else {
                echo  "<tr><td><center>No Data Avaliable</center></td></tr>";
            }
        ?>
        </tbody>
    </table>


    <a href="create.php"><button type="button" class="btn btn-secondary">Add Animals</button></a>
    <a href="logout.php?logout"><button type="button" class="btn btn-secondary">Sign Out</button></a>
</div>
<img src="" >
</body>
</html>