<?php

require_once "actions/db_connect.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM `adopt_a_pet`  ";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);



$sql3 = "SELECT * FROM animals";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result);



if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM adopt_a_pet WHERE id = {$id}" ;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 1) {
      $adopt_a_pet = $row["adopt_a_pet"];
      $fk_animals =$row["fk_animals"];
      $fk_animals = $row["fk_animals"];
      $animalsname = $row["animalsname"];
        $img =$row["img"];
        $description = $row["description"];
        $hobbies = $row["hobbies"];
        $address = $row["address"];
        $age =$row["age"];
        $sise = $row["sise"];
  } else {
      header("location: error.php");
  }
  mysqli_close($conn);
} else {
  header("location: error.php");
}  


$body = "";


    $body.= "
    <div>
    <div class='card m-1 mt-5 text-warning bg-dark' style='width: 18rem;'>
        <img src='../img/{$row["img"]}' class='card-img-top' alt='{$row["animalsname"]}'>
        <div class='card-body'>
          <h5 class='card-title'>{$row["animalsname"]}</h5>
          
          <p class='card-text'>description: {$row["description"]} </p>
          <p class='card-text'>hobbies: {$row["hobbies"]} </p>
          <p class='card-text'>address: {$row["address"]} </p>
          <p class='card-text'>age: {$row["age"]} </p>
          <p class='card-text'>sise: {$row["sise"]} </p>
          <a href='adopt_a_pet.php?id={$row["id"]}' class='btn btn-primary'>adopt_a_pet</a>   
        </div>
      </div>
      </div>
      
      ";


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

<!-- <nav class="navbar navbar-dark bg-dark fixed-top">

<div class="container-fluid">
<a class="navbar-brand" href="home.php"><h1 class="navbar-brand">Home page, welcome <?= $data["lname"] ?> </h1></a>
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
      <a class="nav-link active" aria-current="page"  href="home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="animalsU8.php">Animals_U8</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="general.php">general</a>
    </li>

    
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="logout.php?logout">Logout</a>
    </li>
    
    <li class="nav-item dropdown">
  <form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
</div>
</div>
</div>
</nav> -->
    
    <br>

    <div class="container mt-5">
        <div class="row row-cols-3 ">
        <div class='card m-1 mt-5 text-warning bg-dark' style='width: 18rem;'>
                
                <div class='card-body'>
                  <h5 class='card-title'><?php echo $adopt_a_pet ?><?php echo $adopt_a_pet ?></h5>
                  <?= $body; ?>
                    
                </div>
              </div>
        </div>
    </div> 


    

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
