<?php
include "db_connection.php";

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $order_date = $_POST['order_date'];
    $delivery_date = $_POST['delivery_date'];

    // Insert new customer and order
    $insertSql = "INSERT INTO `customer`(`full_name`, `phone_no`, `address`) VALUES (?, ?, ?)";
    $insertOrderSql = "INSERT INTO `orders`(`customer_id`, `order_date`, `delivery_date`) VALUES (LAST_INSERT_ID(), ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sss", $full_name, $phone_no, $address);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare($insertOrderSql);
    $stmt->bind_param("ss", $order_date, $delivery_date);
    $stmt->execute();
    $stmt->close();

    // Get the latest inserted order ID
    $latestOrderId = $conn->insert_id;

    // Update the values of the latest inserted row
    $updateSql = "UPDATE customer 
                  JOIN orders ON customer.customer_id = orders.customer_id 
                  SET customer.full_name = ?, customer.phone_no = ?, customer.address = ?, 
                      orders.order_date = ?, orders.delivery_date = ?
                  WHERE orders.order_id = ?";

    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sssssi", $full_name, $phone_no, $address, $order_date, $delivery_date, $latestOrderId);
    if ($stmt->execute()) {
        echo "<script>window.location='receipt.php'</script>";
    } else {
        echo "Error updating values: " . $stmt->error;
    }
    $stmt->close();
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
    echo "Latest inserted order for customer with ID 1 is: Order ID - " . $row["order_id"] . ", Order Date - " . $row["order_date"] . ", Delivery Date - " . $row["delivery_date"];
} else {
    echo "No orders found for customer with ID 1";
}
?>
