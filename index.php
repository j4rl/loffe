<!DOCTYPE html>
<?php
$host="localhost";
$user="root";
$pass="";
$db="loffe";
$conn=mysqli_connect($host,$user,$pass,$db);


if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $sql="INSERT INTO tblname(name) VALUES ('$name')";
    $result=mysqli_query($conn,$sql);
}

$sql="SELECT * FROM tblname ORDER BY name ASC LIMIT 5";
$result=mysqli_query($conn,$sql);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Lägg in namn för åsiktsregistrering</h1>
    <form action="index.php" method="POST">
        <label for="name">Namn:</label>
        <input type="text" id="name" name="name" required placeholder="Skriv in namn här">
        <input type="submit" name="btn" value="Registrera">
    </form>
    <h2>Här är registrerade namn</h2>
    <?php while($rad=mysqli_fetch_assoc($result)){ ?>

        <p><?=$rad['name']?></p>

  <?php  }  ?>
    
</body>
</html>