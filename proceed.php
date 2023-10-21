<?php
include "db_connection.php";



if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $order_date = $_POST['order_date'];
    $delivery_date = $_POST['delivery_date'];

    $sql = "INSERT INTO `customer`(`customer_id`, `full_name`, `phone_no`, `address`) VALUES (LAST_INSERT_ID(), '$full_name', '$phone_no', '$address'); 
            INSERT INTO `orders`(`order_id`, `order_date`, `delivery_date`) VALUES (LAST_INSERT_ID(), '$order_date', '$delivery_date')";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
  }

     .message p{
   
   background-color: #f2f2f249;
   border: 1px solid #ddd;
   padding: 10px;
   border-radius: 5px;
   width: fit-content;
   
   
 }
 
 .message h2 {
   font-size: 24px;
   margin-bottom: 10px;
 }
 
 
 p{
     font-size: 18px;
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
  text-decoration: none;
}
</style>

</head>
<body>

<?php
 
// retrieve the inserted data
//$id = $conn->insert_id;
//$sql = "SELECT * FROM customer 
//JOIN orders ON customer.customer_id = orders.customer_id 
//WHERE customer.customer_id = 1;";
//$result = $conn->query($sql);
 // retrieve the inserted data
$id = $conn->insert_id;
$sql = "SELECT * FROM customer 
        JOIN orders ON customer.customer_id = orders.customer_id 
        -- WHERE customer.customer_id = 1 
        ORDER BY orders.order_id DESC 
        LIMIT 1";
$result = $conn->query($sql);

// display the latest inserted value
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  //echo "Latest inserted order for customer with ID 1 is: Order ID - " . $row["order_id"] . ", Order Date - " . $row["order_date"] . ", Order Total - " . $row["delivery_date"];
} else {
  echo "No orders found for customer with ID 1";
}
?>

<br><br><br><br><br><br><br><br><br><br>
  <center><img src="" height="200px" alt=""></center>
  <div class="message">

  <?php
       if (!$row) {
        echo "No results found for customer with ID 1";
      } else {
        
?>

    <center><h2>Thank you for Ordering Mr/Mrs <?php echo $row['full_name']; ?>!</h2></center>
    <center><p>
    "Thank you for your order of gravel and sand! We appreciate your <br>
     business and will process your order as soon as possible. If you <br>
     have any questions or need further assistance, please don't <br>
     hesitate to contact us. We look forward to serving you!"</p></center>
  </div><br>
  <center><a href="index.php" class="btn">Okay</a></center>

<?php 
}
?>
</body>
</html>