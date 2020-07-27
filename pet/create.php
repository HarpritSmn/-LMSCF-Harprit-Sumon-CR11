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
<title>Add Animal</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<h1 class="display-4 d-flex justify-content-center">Add Animal</h1>

    <form action="actions/a_create.php" method= "post">
        <div class="container w-50 p-3">
            <div class="form-group m-1">
                <label>Animal</label>
                <input class="form-control border border-primary" type="text" name="animal" placeholder="Animal"/>
            </div>    

            <div class="form-group m-1">
                <label>Name</label>
                <input class="form-control border border-primary" type="text" name="name" placeholder="Name"/>
            </div>  

            <div class="form-group m-1">
                <label>Age</label>
                <input class="form-control border border-primary" type="text" name="age" placeholder="Age"/>
            </div>    
            
            <div class="form-group m-1">
                <label>Type</label>
                <input class="form-control border border-primary" type="text" name="type" placeholder="Type"/>
            </div>    
            
            <div class="form-group m-1">
                <label>Description</label>
                <input class="form-control border border-primary" type="text" name="description" placeholder="Description"/>
            </div>    
            
            <div class="form-group m-1">
                <label>hobbies</label>
                <input class="form-control border border-primary" type="text" name="hobbies" placeholder="hobbies"/>
            </div>    
            
            <div class="form-group m-1">
                <label>Image</label>
                <input class="form-control border border-primary" type="text" name="image" placeholder="Image link"/>
            </div>    
            
            <div class="form-group m-1">
                <label>city</label>
                <input class="form-control border border-primary" type="text" name="city" placeholder="city"/>
            </div>    
            
            <div class="form-group m-1">
                <label>Zip - Code</label>
                <input class="form-control border border-primary" type="text" name="zip" placeholder="Zip"/>
            </div>    
            
            <div class="form-group m-1">
                <label>Address</label>
                <input class="form-control border border-primary" type="text" name="address" placeholder="Address"/>
            </div>    
            
            <div class="form-group m-1">
                <button type ="submit" class="btn btn-success">Insert Animal</button>
                <a href= "indeks.php"><button class="btn btn-success" type="button">Back</button></a>
            </div> 
        </div>
    </form>



</body>
</html>

