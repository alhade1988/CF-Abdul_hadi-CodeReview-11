<?php
    session_start();
    require_once "actions/db_connect.php";

    if(!isset($_SESSION["adm"]) && !isset($_SESSION["user"]) && !isset($_SESSION["super"])){
        header("location: login.php");
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id = {$id}";

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);


    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $E_Mail = $_POST["E_Mail"];


        $sql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`E_Mail`='$E_Mail' WHERE id = {$id} ";
        $result = mysqli_query($conn, $sql);
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="fname" value="<?= $data["fname"] ?>"><br>
        <input type="text" name="lname" value="<?= $data["lname"] ?>"><br>
        <input type="E_Mail" name="E_Mail" value="<?= $data["E_Mail"] ?>"><br>
        <input type="hidden" name="id" value="<?= $data["id"] ?>"><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>