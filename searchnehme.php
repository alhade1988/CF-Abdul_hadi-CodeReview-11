<?php
require_once "actions/db_connect.php";


// Create connection

$sql = "SELECT * FROM animals WHERE animalsname LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['animalsname']."</td>
		          <td>".$row['description']."</td>
		          <td>".$row['hobbies']."</td>
		          <td>".$row['sise']."</td>
		        </tr>";
	}
}

// $text = $_GET["text"];
// $sql = "SELECT * FROM animals WHERE animalsname LIKE 'text%'";
// $result = mysqli_query($conn, $sql);





// if(mysqli_num_rows($result) == 0){
//    echo "<div class='text-center h1 text-danger'>No Results</div>";
// }else {
//     $row = mysqli_fetch_assoc($result);
//     foreach($row as $value){
//       echo "
//         <div>
//         <div class='card m-1 mt-5 text-warning bg-dark' style='width: 18rem;'>
//             <img src='../img/{$value["img"]}' class='card-img-top' alt='{$value["animalsname"]}'>
//             <div class='card-body'>
//               <h5 class='card-title'>{$value["animalsname"]}</h5>
              
//               <p class='card-text'>description: {$value["description"]} </p>
//               <p class='card-text'>hobbies: {$value["hobbies"]} </p>
//               <p class='card-text'>address: {$value["address"]} </p>
//               <p class='card-text'>age: {$value["age"]} </p>
//               <p class='card-text'>sise: {$value["sise"]} </p> 
               
//             </div>
//           </div>
//           </div>
          
//           ";
//     } 
// }

?>