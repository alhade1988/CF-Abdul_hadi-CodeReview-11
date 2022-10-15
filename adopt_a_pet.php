<?php
session_start();
require_once "actions/db_connect.php";

if(isset($_GET["id"])){
$id = $_GET["id"];
$sql = "SELECT * From adopt_a_pet join users on users.id = adopt_a_pet.fk_users join animals on animals.id = adopt_a_pet.fk_animals WHERE  id = {$id}";


$result = mysqli_query($conn, $sql);

    
   
$body = "";

    if(mysqli_num_rows($result) == 0){
        $body = "<div class='text-center h1 text-danger'>No Results</div>";
    }else {
        while($row = mysqli_fetch_assoc($result)){
            $body.= "
            <div>
            <div class='card m-1 mt-5 text-warning bg-dark' style='width: 18rem;'>
                <img src='../img/{$row["img"]}' class='card-img-top' alt='{$row["animalsname"]}'>
                <div class='card-body'>
                  <h5 class='card-title'>{$row["fname"]}"-"{$row["animalsname"]}</h5>
                  
                  <p class='card-text'>description:{$row["fname"]}"-" {$row["description"]} </p>
                  <p class='card-text'>hobbies:{$row["fname"]}"-" {$row["hobbies"]} </p>
                  <p class='card-text'>address: {$row["fname"]}"-"{$row["address"]} </p>
                  <p class='card-text'>age:{$row["fname"]}"-" {$row["age"]} </p>
                  <p class='card-text'>sise:{$row["fname"]}"-" {$row["sise"]} </p>   
                </div>
              </div>
              </div>
              
              ";
        } 
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
</nav>
    
    <br>

    <div class="container mt-5">
        <div class="row row-cols-3 ">
            <?= $body; ?>
        </div>
    </div> 


    

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
<?php 
} 
?>