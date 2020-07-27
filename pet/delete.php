<?php 

    require_once 'actions/dbconnect.php';

    if(!isset($_SESSION['admin'])) {
        header("Location: home.php");
        exit;
    }

    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM animals WHERE animals_id = {$id}";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        $conn->close();
        
?>

<!DOCTYPE html>
<html>
<head>
<title>Delete Animal</title>
</head>
<body>

<h3>Do you really want to delete this animal?</h3>
<form action ="actions/a_delete.php" method="post">

   <input type="hidden" name="id" value="<?php echo $data['animals_id'] ?>" />
   <button type="submit">Yes, delete it!</button >
   <a href="index.php"><button type="button">No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>