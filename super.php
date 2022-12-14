<?php
    session_start();
    require_once "actions/db_connect.php";

    if(!isset($_SESSION["adm"]) && !isset($_SESSION["user"]) && !isset($_SESSION["super"])){
        header("Location: login.php");
    }

    if(isset($_SESSION["user"])){
        header("Location: home.php");
    }

    if(isset($_SESSION["adm"])){
      header("Location: adm.php");
  }

    $sql = "SELECT * FROM users WHERE id = {$_SESSION["super"]}";

    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($result);
    
    $sql2 = "SELECT * FROM users WHERE status = 'user'";
    $result2 = mysqli_query($conn, $sql2);

    $sql3 = "SELECT * FROM users WHERE status = 'adm'";
    $result3 = mysqli_query($conn, $sql3);

    $text = "";
    $text1 = "";

    while($row = mysqli_fetch_assoc($result3)){
        $text.= "
        
        <div class='container text-center'>
  <div class='row'>
    <div class='col'>
        
      <img src='https://cdn.pixabay.com/photo/2020/10/31/16/39/boss-5701646__340.jpg' class='img-fluid rounded-start' alt='...'>
    </div>
    <div class='col'>
      <div class='card-body'>
      <h3 class='fs-1 text-center'>Admin Table</h3>
        <p class='fs-1 text-center'>{$row['fname']} {$row['lname']}   <a class='btn btn-outline-primary' href='update.php?id={$row['id']}'>Update</a>  <a class='btn btn-outline-danger' href='delete.php?id={$row["id"]}'>Delete</a></p>
      </div>
    </div>
  </div>
</div> <br> ";
    }
    while($row = mysqli_fetch_assoc($result2)){
       
      $text.= "
        
        <div class='container text-center'>
  <div class='row'>
    <div class='col'>
        
      <img src='https://cdn.pixabay.com/photo/2016/04/26/12/25/male-1354358__340.png' class='img-fluid rounded-start' alt='...'>
    </div>
    <div class='col'>
      <div class='card-body'>
      <h3 class='fs-1 text-center'>User Table</h3>
        <p class='fs-1 text-center'>{$row['fname']} {$row['lname']}   <a class='btn btn-outline-primary' href='update.php?id={$row['id']}'>Update</a>  <a class='btn btn-outline-danger' href='delete.php?id={$row["id"]}'>Delete</a></p>
      </div>
    </div>
  </div>
</div> <br> ";
    }

   
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?= $data["fname"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-dark fixed-top">
<div class="container-fluid">
<a class="navbar-brand" href="super.php"><h1>superAdm page  <span class="text-info bg-dark">welcome <?= $data["lname"] ?></span>  </h1></a>
<a class="navbar-brand" href="update.php?id=<?= $data["id"] ?>">Update your account</a>
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
      <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="animalsU8.php">Animals_U8</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="general.php">general</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="animals/create.php">create</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="animals/index.php">animals</a>
    </li>
    <li class="nav-item">
    <a  class="nav-link"href="logout.php?logout">Logout</a>
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



    <br><br>
<div class="card-body mt-5 "  >
        <?= $text1 ?>
    </div>
    <div class="card-body mt-5 "  >
        <?= $text ?>
    </div>
  
    

   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  
</body>
</html>