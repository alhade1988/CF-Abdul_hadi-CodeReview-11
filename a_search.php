
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div id="ser"></div>
<button type="button" onclick="lodDoc()">Screech</button>
<input type="text" id="text" name="text">

<script>function loadDoc(){

  let xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if (this.status == 200{

      document.getElementById("ser").innerHTML =this.responseText; }

    }; 
    var name = document.getElementById("text").Value;
    if(name != "") {
   xhttp.open( "GET", 'searchnehme.php?text='+name, true); 
   xhttp.send =  (); 
    
    }else {document.getElementById("ser").innerHTML="";
    }
  }
document.getElementByld("text"),.addEventListener("keyup"; loadDoc());

    </script>

  


 
 
    

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>Live Search in Database</h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="search">
      <table class="table table-hover">
      <thead>
        <tr>
          <th>animalsname</th>
          <th>description</th>
          <th>hobbies</th>
          <th>sise</th>
          <th>sise</th>
        </tr>
      </thead>
      <tbody id="output">
        
      </tbody>
    </table>
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'searchnehme.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>
</html>