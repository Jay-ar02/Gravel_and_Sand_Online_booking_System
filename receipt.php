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
    <title>Jearrr | Receipt</title>

    <!--favicon-->
    <link rel="icon" href="images/logo.png" type="image/x-icon">

<style>
*{
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
}


body {
    background-image: url(images/gapo.jpg);
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
}

table td {
    vertical-align: top;
}

.body-wrap {
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

.main {
    backdrop-filter: blur(10px);
    background:#94949442;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
  
}

.content-block {
    padding: 0 0 20px;
}

.header {
    width: 100%;
    margin-bottom: 20px;
}

.footer p, .footer a, .footer unsubscribe, .footer td {
    font-size: 12px;
}

h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
    color: white;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}


.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
    color: white;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}
td, .content-block{
    color: white;
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
$id = $conn->insert_id;
$sql = "SELECT * FROM customer 
        JOIN orders ON customer.customer_id = orders.customer_id 
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
<table class="body-wrap">

<tbody><tr>
    
    
<td class="container" width="600">
<div class="content">
<table class="main" width="100%" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="content-wrap aligncenter">
<table width="100%" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="content-block">
<br>
<center><img src="images/logo.png" width="100px" alt=""></center>
<h2></h2>
</td>
</tr>
<tr>
<td class="content-block">
<table class="invoice">
<tbody><tr>
<?php
       if (!$row) {
        echo "No results found for customer with ID 1";
      } else {
        // print out the customer information
        echo "Customer Name: " . $row["full_name"] . "<br>";
        echo "Phone Number: " . $row["phone_no"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        echo "Order Date: " . $row["order_date"] . "<br>";
        echo "Delivery Date: " . $row["delivery_date"] . "<br>";
      }
?>
    <tr>
    <td>
    <table class="invoice-items" cellpadding="0" cellspacing="0">
    <tbody><tr>
    <td>Gravel</td>
    <td class="alignright">₱600</td>
    </tr>
    <tr class="total">
    <td class="alignright" width="80%">Total</td>
    <td class="alignright">₱600</td>
    </tr>
    </tbody></table>
    </td>
    </tr>
    </tbody></table>
    </td>
    </tr>
    <tr>
    <td class="content-block">
    Jearrr | Gravel & Sand 2023
    </td>
    </tr>
    </tbody></table>
    </td>
    </tr>
    </div>
    </td>
    <td></td>
    </tr>
</tbody></table>
<br>

<center><a href="edit.php" class="btn">&nbsp;&nbsp;&nbsp;Edit &nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp; <a href="view.php" class="btn">View all lists</a> &nbsp;&nbsp;<a href="proceed.php" class="btn">Proceed</a></center>

</body>
</html>
