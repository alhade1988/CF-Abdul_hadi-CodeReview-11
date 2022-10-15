<?php
require_once '../../actions/db_connect.php';
require_once 'file_upload.php';

session_start();


if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])&& !isset($_SESSION["super"])){
    header("Location: ../../login.php");
}
if(isset($_SESSION["user"])){
    header("Location: ../../home.php");
}


if($_POST){
    $id = $_POST["id"];
    $animalsname= $_POST["animalsname"];
    $description = $_POST["description"];
    $hobbies = $_POST["hobbies"];
    $address = $_POST["address"];
    $age = $_POST["age"];
    $sise = $_POST["sise"];
    $img = file_upload($_FILES["img"]);
    
    $sql = "UPDATE `animals` SET `animalsname`='$animalsname',`img`='$img->fileName',`description`='$description',`hobbies`='$hobbies',`address`='$address',`age`='$age',`sise`='$sise' where id = {$id}";
    $result = mysqli_query($conn, $sql);



   



    if($result ){
        echo "Success <br> <a href='../index.php'>Home</a>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>update</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
<div class="container-fluid">
<a class="navbar-brand" href="../../dashboard.php">Home</a>
<a class="navbar-brand" href="../../update.php?id=<?= $data["id"] ?>">Update your account</a>
<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
<span class="navbar-toggler-icon"></span>
</button>
<div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
<div class="offcanvas-header">
  <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="create.php">create</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="index.php">animals</a>
    </li>
    <li class="nav-item">
    <a  class="nav-link"href="../../logout.php?logout">Logout</a>
    </li>
    
    <li class="nav-item dropdown">
  <form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
</div>
</div>
</div>
</nav>
</div>
</div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>