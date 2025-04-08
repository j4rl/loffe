<!DOCTYPE html>
<?php
$host="localhost";
$user="root";
$pass="";

$conn=mysqli_connect($host,$user,$pass,"loffe");


$name="Inget namn";
if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $sql="INSERT INTO tblName(name) VALUES ('$name')";
    $result=mysqli_query($conn,$sql);
}

$sql="SELECT * FROM tblName";
$result=mysqli_query($conn,$sql);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <h1>Form</h1>
    <h2><?php
    while($rad=mysqli_fetch_assoc($result)){ ?>
       <p><?=$rad['name']?></p>
  <?php  }
    ?></h2>
    <form action="index.php" method="POST">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="submit" name="btn" value="Tryck här">
    </form>
</body>
</html>