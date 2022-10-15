<?php
require_once '../actions/db_connect.php';
session_start();

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])&& !isset($_SESSION["super"])){
  header("Location: ../../login.php");
}
if(isset($_SESSION["user"])){
  header("Location: ../../home.php");
}

if(isset($_GET["id"])){
  $id = $_GET["id"];
  $sql = "SELECT * FROM animals WHERE id = {$id}";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc ($result) ;
  
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
<a class="navbar-brand" href="../dashboard.php">Home</a>
<a class="navbar-brand" href="../update.php?id=<?= $data["id"] ?>">Update your account</a>
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
    <a  class="nav-link"href="../logout.php?logout">Logout</a>
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
<style >

body {
margin: 0;
background: #000; 
}
video { 
position: fixed;
top: 50%;
left: 50%;
min-width: 100%;
min-height: 100%;
width: auto;
height: auto;
z-index: -100;
transform: translateX(-50%) translateY(-50%);

background-size: cover;
transition: 1s opacity;
}

@media screen and (max-width: 500px) { 
div{width:70%;} 
}
@media screen and (max-device-width: 800px) {

#bgvid { display: none; }
}

img{

height: 150px

}


     
     
     
 </style>

<video  id="bgvid" playsinline autoplay muted loop>

<source src="https://static.videezy.com/system/resources/previews/000/005/713/original/book_pages_04.mp4" type="video/webm">


</video>


<div class="container  text-warning">
        <h1>Add Product</h1>
        <form action="actions/a_Update.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="animalsname" class="form-label">animalsname</label>
                <input type="text" class="form-control" id="animalsname" aria-describedby="emailHelp" name="animalsname" placeholder="Type product animalsname">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description" placeholder="Type product description">
            </div> 
            <div class="mb-3">
                <label for="hobbies" class="form-label">hobbies</label>
                <input type="text" class="form-control" id="hobbies" aria-describedby="emailHelp" name="hobbies" placeholder="Type product hobbies">
            </div> 
            <div class="mb-3">
                <label for="address" class="form-label">address</label>
                <input type="text" class="form-control" id="address" aria-describedby="emailHelp" name="address" placeholder="Type product address">
            </div> 
           
            <div class="mb-3">
                <label for="age" class="form-label">age</label>
                <input type="text" class="form-control" id="age" aria-describedby="emailHelp" name="age" placeholder="Type product age">
            </div> 
            
            

<div class="mb-3">
            <p>sise</p>

            <select name="sise" id="sise">
            <option value="">--select--</option>
            <option value="Large">Large</option>
            <option value="Small">Small</option>
            <option value="Senior">Senior</option>
            </select>
</div> 

   

            <div class="mb-3">
                <label for="img" class="form-label">img</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>

      <input type="hidden" class="form-control" id="description" name="id" placeholder="id" value= "<?php echo $row["id"]; ?>">
      <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>



<?php 
} 
?>

