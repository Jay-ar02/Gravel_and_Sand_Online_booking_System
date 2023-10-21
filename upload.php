<?php
include "db_connection.php";

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $order_date = $_POST['order_date'];
    $delivery_date = $_POST['delivery_date'];

    $sql = "INSERT INTO `customer`(`full_name`, `phone_no`, `address`) VALUES ('$full_name', '$phone_no', '$address'); 
            INSERT INTO `orders`(`customer_id`, `order_date`, `delivery_date`) VALUES (LAST_INSERT_ID(), '$order_date', '$delivery_date')";

    if ($conn->multi_query($sql)) {
        echo "<script>window.location='receipt.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
