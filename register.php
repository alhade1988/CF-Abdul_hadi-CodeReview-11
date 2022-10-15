
<?php
require_once "actions/db_connect.php";

session_start();

if(isset($_SESSION["user"])){
    header("Location: home.php");
}

if(isset($_SESSION["adm"])){
    header("Location: dashboard.php");
}

if(isset($_SESSION["super"])){
  header("Location: super.php");
}



$error = false;
$fname = $lname = $E_Mail = $status=$dateofbirth="";
$fnameError = $lnameError = $PASSWORDError = $E_MailError = $statusError="";

if(isset($_POST["submit"])){
    $fname = trim($_POST["fname"]); 
    $fname = strip_tags($fname); 
    $fname = htmlspecialchars($fname);

    $lname = trim($_POST["lname"]); 
    $lname = strip_tags($lname); 
    $lname = htmlspecialchars($lname);

    $E_Mail = trim($_POST["E_Mail"]); 
    $E_Mail = strip_tags($E_Mail); 
    $E_Mail = htmlspecialchars($E_Mail);

    $PASSWORD = trim($_POST["PASSWORD"]); 
    $PASSWORD = strip_tags($PASSWORD); 
    $PASSWORD = htmlspecialchars($PASSWORD);

   

    if(empty($fname)){
        $error = true;
        $fnameError = "Please Type your first name";
    }elseif(strlen($fname) < 3){
        $error = true;
        $fnameError = "the first name must be more than 3 letters";
    }elseif(!preg_match("/^[a-zA-Z]/", $fname)) {
        $error = true;
        $fnameError = "first name must contain only letters";
    }

    if(empty($lname)){
        $error = true;
        $lnameError = "Please Type your last name";
    }elseif(strlen($lname) < 3){
        $error = true;
        $lnameError = "the last name must be more than 3 letters";
    }elseif(!preg_match("/^[a-zA-Z]/", $lname)) {
        $error = true;
        $lnameError = "last name must contain only letters";
    }


    if(empty($E_Mail)){
        $error = true;
        $E_MailError = "Please type your E_Mail";
    }elseif(!filter_var($E_Mail, FILTER_VALIDATE_EMAIL)){
        $error = true;
        $E_MailError = "Please type a valid E_Mail";
    }else {
        $sql = "SELECT * FROM users WHERE E_Mail = '$E_Mail'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count != 0){
            $error = true;
            $E_MailError = "E_Mail already exists";
        }
    }


    if(empty($PASSWORD)){
        $error = true;
        $PASSWORDError = "Please Type your PASSWORD";
    }elseif(strlen($PASSWORD) < 6){
        $error = true;
        $PASSWORDError = "the PASSWORD must be more than 5 letters";
    }

    if(!$error){
        $PASSWORD = hash("sha256", $PASSWORD); 

        $query = "INSERT INTO `users`(`fname`, `lname`, `E_Mail`, `PASSWORD`, `dateofbirth`) VALUES ('$fname','$lname','$E_Mail','$PASSWORD', '$dateofbirth') ";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "User has been created";
            $fname = $lname = $E_Mail = "";

        }else {
            echo "Something went wrong, please try again later ...";
        }
    }


}


?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="login-box" >




   <h2>register</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off"  enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="fname" placeholder="Type your first Name" value="<?= $fname ?>">
      <label>fname</label>
      <p><?= $fnameError ?></p>
      
    </div>
    <div class="user-box">
      <input type="text" name="lname"placeholder="Type your last Name" value="<?= $lname ?>">
       <label>lname</label>
      <p><?= $lnameError ?></p>
     
    </div>
    
    
    <div class="user-box">
      <input  type="email" name="E_Mail" placeholder="Type your email" value="<?= $E_Mail ?>">
      <p><?= $E_MailError ?></p>
      <label>E_Mail</label>
    </div>
    <div class="user-box">
      <input type="PASSWORD" name="PASSWORD" placeholder="Type your PASSWORD">
      <p><?= $PASSWORDError ?></p>
      <label>PASSWORD</label>
    </div>
    <div class="user-box">
      <input type="date" name="dateofbirth" required="">
      <label>dateofbirth</label>
    </div>
    <h2>You have an account already? </h2>
    
    <a href="#">
      <input type="submit" value="Create Account" name="submit"> 
    </a>
    <a href="login.php">
      Login Now
    </a>
    
  </form>

  
</div>


<div class="row">
  <div class="col-sm-4">
<div class="card">
  
  <div class="card-body">
  <h2>You have an account already? </h2>
    
    <a href="login.php" class="btn btn-primary">Login Now</a>
  </div>
</div></div></div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>