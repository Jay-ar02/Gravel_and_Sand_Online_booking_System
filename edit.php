<?php
include"db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jearrr | Customer Information</title>

    <!--favicon-->
    <link rel="icon" href="images/logo.png" type="image/x-icon">

    <!--animate.css-->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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

  form{
    display: block;
    flex-direction: column;
    align-items: center;
    margin: 50px auto;
    background:#94949442;
    backdrop-filter: blur(10px);
    padding: 50px;
    border-radius: 10px;
    border: 1px solid white;
    box-shadow: 0 5px 15px rgba(0,0,0,.2);
    max-width: 600px;
    width: 100%;
  }

  form label {
    color: white;
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
  }

    form input[type="text"],
    form input[type="tel"],
    form input[type="password"],
    form input[type="date"],
    select,
    form input[type="file"],
    form input[type="radio"] {
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-bottom: 20px;
    width: 100%;
    font-size: 16px;
    color: #000000;
    background: #ffffff;
  }

    form input[type="text"]:focus,
    form input[type="password"]:focus,
    form input[type="date"]:focus,
    select:focus,
    form input[type="file"]:focus,
    form input[type="radio"]:focus {
    outline: none;
    border-color: #3498db;
  }

    form button[type="submit"] {
    background-color: green;
    color:;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 18px;
    margin-top: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
  }  

  form button[type="submit"]:hover {
    background-color: green;
  }

  .drp, label, select, option, form input:invalid {
    border-color: #e74c3c;
  }
    
  form input:valid {
    border-color: #2ecc71;
  }
    
  .inp-group {
    display: block;
    margin-left: 50px;
    text-align: center;
    max-width: 200%;
  }

  .inp-group > * {
    margin: 5px;
  }

  .inp-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .inp-group input[type="text"],
  .inp-group input[type="password"] {
    padding: 5px;
    border-radius: 3px;
    border: 1px solid #ccc;
    margin-left: 10px;
    margin-right: 10px;
    font-size: 16px;
    outline: none;
    background: #d3d3d34b;
    width: 35%;
    text-align: center; 
  }

  .inp-group button {
    padding: 5px 10px;
    border-radius: 3px;
    border: none;
    background-color: green;
    color: #000000;
    font-size: 16px;
    cursor: pointer;
  }

  .streyt input {
    display: inline-block;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-bottom: 20px;
    width: calc(50% - 5px); /* Subtract 5px to account for the 1px border on both sides */
    font-size: 16px;
    color: #23212160;
    background: #dddddd42;
  }

  .gitna{
    margin-left: -50px;
  }

  a{
    color: white;
    text-decoration: none
  }
</style>
    
</head>
<body>

<?php
include "db_connection.php";

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $order_date = $_POST['order_date'];
    $delivery_date = $_POST['delivery_date'];

    // Insert new customer
    $insertCustomerSql = "INSERT INTO `customer`(`full_name`, `phone_no`, `address`) VALUES ('$full_name', '$phone_no', '$address')";
    if ($conn->query($insertCustomerSql)) {
        $customerId = $conn->insert_id; // Get the last inserted customer ID

        // Insert new order with the retrieved customer ID
        $insertOrderSql = "INSERT INTO `orders`(`customer_id`, `order_date`, `delivery_date`) VALUES ('$customerId', '$order_date', '$delivery_date')";
        if ($conn->query($insertOrderSql)) {
            // Get the latest inserted order ID
            $latestOrderId = $conn->insert_id;

            // Update the values of the latest inserted row
            $updateSql = "UPDATE customer 
                          JOIN orders ON customer.customer_id = orders.customer_id 
                          SET customer.full_name = '$full_name',
                              customer.phone_no = '$phone_no',
                              customer.address = '$address',
                              orders.order_date = '$order_date',
                              orders.delivery_date = '$delivery_date'
                          WHERE orders.order_id = '$latestOrderId'";
            if ($conn->query($updateSql)) {
                echo "<script>window.location='receipt.php'</script>";
            } else {
                echo "Error updating values: " . $conn->error;
            }
        } else {
            echo "Error inserting order data: " . $conn->error;
        }
    } else {
        echo "Error inserting customer data: " . $conn->error;
    }
}

// Retrieve the latest inserted value for display
$sql = "SELECT * FROM customer 
        JOIN orders ON customer.customer_id = orders.customer_id 
        ORDER BY orders.order_id DESC 
        LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Access the values from $row and display them
} else {
    echo "No orders found.";
}
?>




      <form method="POST" action="update.php">

        <center><img src="images/logo.png" width="100px" alt=""></center>
        <center><h3>Customer Information:</h3></center><br>
    
        <div class="neymm">

        <label>Full Name:</label>
        <input type="text" id="fullname" name="full_name" placeholder="Full Name" value="<?php echo $row['full_name']; ?>" required>
        
        
        <label>Phone Number:</label>
        <input type="text" name="phone_no" maxlength="11" placeholder="Phone Number" value="<?php echo $row['phone_no']; ?>" required>

        <label>Address:</label>
        <input type="text" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" required>

        
        <label>Order Date:</label>
        <input type="date" name="order_date" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo $row['order_date']; ?>" required>

        <label>Delivery Date:</label>
        <input type="date" name="delivery_date" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo $row['delivery_date']; ?>" required>
        
        </div>
        <div class="inp-group">
        
        <button type="submit" id="submit-btn" name="submit">Update</button>
      </form>

</body>
</html>