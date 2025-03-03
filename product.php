<?php 
  $servername="localhost:4306";
  $username="root";
  $password="";
  $dbname="tshirt";

//   database connection

  $conn=new mysqli($servername,$username,$password,$dbname);
  if($conn->connect_error){
     die("Connection failed:".$conn->connect_error);
  }

  $sql="SELECT * FROM products";
  $result=$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
    
   <h1>Our Products</h1>

   <div class="product-container">
     <?php 
        while($row=$result->fetch_assoc()){
            echo '<div class="product">';
            echo '<img src="'.$row["image"].'"  alt="'.$row["name"].'">';
            echo '<h2>'.$row["name"].'</h2>';
            echo '<p>Price: rs.'.$row["price"].'</p>';
            echo '<p>'.$row["description"].'</p>';
            echo '<button>Add to Cart</button>';
            echo '</div>';
        
            
        }
     ?>
   
   </div>
</body>
</html>

<?php 
  $conn->close();
 ?>