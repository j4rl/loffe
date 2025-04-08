<!DOCTYPE html>
<?php
require_once("inc.php");
$conn=conn("loffe");

if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $sql="SELECT * FROM tbllogin WHERE username='$name' AND password='$pass'";
    if($result=mysqli_query($conn,$sql)){
        if(mysqli_num_rows($result)==1){
            $rad=mysqli_fetch_assoc($result);
            $_SESSION['user']=$rad['username'];
            $_SESSION['level']=$rad['userlevel'];
            //header("Location: index.php");
        }else{
            $_SESSION['user']="";
            $_SESSION['level']="";
            //header("Location: login.php");
        }
    };

}




?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if(isLevel(10)){
    echo "<h1>Välkommen ".$_SESSION['user']."</h1>";
    echo "<a href='index.php'>Till startsidan</a>";
}else{
?>


    <h1>Logga in</h1>
    <form action="login.php" method="POST">
        <label for="name">Användarnamn:</label>
        <input type="text" id="name" name="name" required placeholder="Skriv in användarnamn här">
        <label for="pass">Lösenord:</label>
        <input type="password" name="pass" id="pass" required placeholder="Skriv in lösenord här">
        <input type="submit" name="btn" value="Logga in">
    </form>
    <?php } ?>
</body>
</html>