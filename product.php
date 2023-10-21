<?php
include "db_connection.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Jearrr | Gravel & Sand</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
 <!--favicon-->
 <link rel="icon" href="images/logo.png" type="image/x-icon">
<style>
  *{
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
  }
body{
  width: 100%;
    height: 100vh;
    background-image: url(images/gapo.jpg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;

    
     /*.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  display: inline-block;
}*/

.price {
  color: red;
  font-size: 22px;
}

 .btn  {
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: green;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  
}

.cardd button:hover {
  opacity: 0.7;
}
    }

    .content .cardd{
    display: inline-block;
    margin: 20px;
    
    }
    .cardd{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 200px;
  margin: auto;
  text-align: center;
  font-family: arial;
  color: white;
  
  
    }
    .content{
      display: flex;
  justify-content: center;    
    }
    p, a, .btn{
      text-decoration: none;
    }
    h2{
      color: white;
    }
    
</style>
</head>
<body>

<?php
$id = $conn->insert_id;
$sql = "SELECT * FROM product where product_id = 1111";
$result = $conn->query($sql);

// display the latest inserted value
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  //echo "Latest inserted order for customer with ID 1 is: Order ID - " . $row["order_id"] . ", Order Date - " . $row["order_date"] . ", Order Total - " . $row["delivery_date"];
} else {
  echo "No orders found for customer with ID 1";
}
?>

<br>
  <center><img src="images/logo.png" width="100px" alt=""></center>
  <center><hr width="1000px"></center>
 
<h2 style="text-align:center">Product offers:</h2>
<form action="" method="post">
<div class="content">
<div class="cardd">
  <img src="images/sand.jpg" alt="Gravel" style="width:100%">
  <h1><?php echo $row["product_name"]; ?></h1>
  <p class="price">₱<?php echo $row["price"]; ?></p>
  <p><?php echo $row["description"]; ?></p><br>
  <a href="form.php" class="btn">Order now</a>
  
</div>

<?php
$id = $conn->insert_id;
$sql = "SELECT * FROM product where product_id = 1112";
$result = $conn->query($sql);

// display the latest inserted value
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  //echo "Latest inserted order for customer with ID 1 is: Order ID - " . $row["order_id"] . ", Order Date - " . $row["order_date"] . ", Order Total - " . $row["delivery_date"];
} else {
  echo "No orders found for customer with ID 1";
}
?>

<div class="cardd">
  <img src="images/sanddd.png" alt="Sand" style="width:100%">
  <h1><?php echo $row["product_name"]; ?></h1>
  <p class="price">₱<?php echo $row["price"]; ?></p>
  <p><?php echo $row["description"]; ?></p><br>
  <a href="form.php" class="btn">Order now</a>
  
</div>
</form>
</div>
<!--<center><h1>Gravel & Sand</h1></center>
<center><img src="images/bg.jpg" alt=""></center>-->

</body>
</html>
