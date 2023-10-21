<!DOCTYPE html>
<html>
<head>

  <!--favicon-->
  <link rel="icon" href="images/logo.png" type="image/x-icon">

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
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

<h1>Customer's Lists</h1>

<table id="customers">
  <tr>
    <th>Customer ID:</th>
    <th>Name:</th>
    <th>Phone Number:</th>
    <th>Address:</th>
  </tr>

<?php
include "db_connection.php";
$sql = "SELECT * FROM customer ORDER BY customer_id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $row["customer_id"]; ?></td>
    <td><?php echo $row["full_name"]; ?></td>
    <td><?php echo $row["phone_no"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
  </tr>
  
<?php
  }
}
?>

</table>
<br><br>
<center><a href="Receipt.php" class="btn">Back</a></center><br><br>
</body>
</html>
