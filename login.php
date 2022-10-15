<?php
    session_start();

    if(isset($_SESSION["user"])){
        header("location: home.php");
    }

    if(isset($_SESSION["adm"])){
        header("Location: dashboard.php");
    }
    if(isset($_SESSION["super"])){
      header("Location: super.php");
  }
    require_once "actions/db_connect.php";

    $error = false;
    $E_Mail = "";
    $PASSWORDError  = $E_MailError = "";

    if(isset($_POST["submit"])){
     

        $E_Mail = trim($_POST["E_Mail"]); 
        $E_Mail = strip_tags($E_Mail); 
        $E_Mail = htmlspecialchars($E_Mail);

        $PASSWORD = trim($_POST["PASSWORD"]);  


        if(empty($E_Mail)){
            $error = true;
            $E_MailError = "Please type your E_Mail";
        }elseif(!filter_var($E_Mail, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $E_MailError = "Please type a valid E_Mail";
        }


        if(empty($PASSWORD)){
            $error = true;
            $PASSWORDError  = "Please Type your PASSWORD";
        }

        if(!$error){
            $PASSWORD = hash("sha256", $PASSWORD); 

            $sql = "SELECT * FROM users WHERE E_Mail= '$E_Mail' AND PASSWORD = '$PASSWORD'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);

            if($count == 1){
              if ($data["status"] == "user"){
                    $_SESSION["user"] = $data["id"];
                    header("location: home.php");
                }else  {$_SESSION["super"]= $data["id"];
                  header("Location: super.php");} 
                 } else { $_SESSION["adm"]= $data["id"];
                    header("Location: dashboard.php");}
                
              }
             
                
            }else {
                 echo "something went wrong, check your credentials";
        }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>



    
<div class="login-box">
  <h2>Login</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off"  enctype="multipart/form-data">
    <div>
  <div class="user-box">
      <input  type="email" name="E_Mail" placeholder="Type your email" value="<?= $E_Mail ?>">
      
      <label>E_Mail</label>
    </div><p><?= $E_MailError ?></p>
    </div>

    <div>
    <div class="user-box">
      <input type="PASSWORD" name="PASSWORD" placeholder="Type your PASSWORD">
      
      <label>PASSWORD</label>
    </div><p><?= $PASSWORDError ?></p></div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="login" name="submit"> 
      
    </a>
  </form>
</div>

<div class="row">
  <div class="col-sm-4">
<div class="card">
  
  <div class="card-body">
  <h2>You don't have an account?</h2>
    
    <a href="register.php" class="btn btn-primary">Register now</a>
  </div>
</div></div></div>


   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>