<?php
    ob_start();
    session_start();
    require_once 'actions/dbconnect.php';

    if(!isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    }
    
    $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PET's</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="senior.php">Senior Animals</a>
      </li>
      <li class="nav-item ml-auto">
      <a href="logout.php?logout"><button type="button" class="btn btn-secondary ml-auto">Sign Out</button></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Animal</th>
                <th>Name</th>
                <th>Age</th>
                <th>Type</th>
                <th>Description</th>
                <th>hobbies</th>
                <th>city</th>
                <th>zip</th>
                <th>address</th>
                <th>image</th>
            </tr>
        </thead>

        <tbody>
        <?php
           $sql = "SELECT * FROM animals where animals_type = 'small' or animals_type ='large' ";
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
                            
                            <td>"     .$row['animals_city']          ."</td>
                            <td>"     .$row['animals_zip']            ."</td>
                            <td>"     .$row['animals_address']        ."</td>
                            <td><img src="     .$row['animals_image']         ."></td>
                        </tr>";
                }
            
            } else {
                echo  "<tr><td><center>No Data Avaliable</center></td></tr>";
            }
        ?>
        </tbody>
    </table>
    <!-- <a href="logout.php?logout"><button type="button" class="btn btn-secondary mt-5">Sign Out</button></a> -->
</div>

</body>
</html>
<?php ob_end_flush(); ?>