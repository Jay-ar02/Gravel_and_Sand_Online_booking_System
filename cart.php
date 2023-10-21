<?php
include"db_connection.php";
?>

<!-- index.php -->
<?php
session_start();

if(isset($_POST['add_to_cart'])) {
    if(isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], 'product_id');
        if(in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added to cart!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple Add to Cart Page using PHP</title>
</head>
<body>
	<h1>Simple Add to Cart Page using PHP</h1>
	<table>
		<tr>
			<th>Product Name</th>
			<th>Price</th>
			<th>Action</th>
		</tr>
		<tr>
			<td>Product 1</td>
			<td>$10</td>
			<td>
				<form method="post" action="cart.php">
					<input type="hidden" name="product_id" value="1">
					<input type="submit" name="add_to_cart" value="Add to Cart">
				</form>
			</td>
		</tr>
		<tr>
			<td>Product 2</td>
			<td>$20</td>
			<td>
				<form method="post" action="cart.php">
					<input type="hidden" name="product_id" value="2">
					<input type="submit" name="add_to_cart" value="Add to Cart">
				</form>
			</td>
		</tr>
		<tr>
			<td>Product 3</td>
			<td>$30</td>
			<td>
				<form method="post" action="cart.php">
					<input type="hidden" name="product_id" value="3">
					<input type="submit" name="add_to_cart" value="Add to Cart">
				</form>
			</td>
		</tr>
	</table>
    <!-- a -->
    <table>
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Subtotal</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if(isset($_SESSION["cart_item"])){
          $total_quantity = 0;
          $total_price = 0;
      ?>	
      <?php foreach ($_SESSION["cart_item"] as $item){ ?>
          <tr>
            <td><?php echo $item["product_name"]; ?></td>
            <td><?php echo $item["quantity"]; ?></td>
            <td><?php echo "$".$item["price"]; ?></td>
            <td><?php echo "$".number_format($item["quantity"]*$item["price"], 2); ?></td>
            <td>
              <a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a>
            </td>
          </tr>
          <?php
              $total_quantity += $item["quantity"];
              $total_price += ($item["price"]*$item["quantity"]);
          } ?>
        <?php } else { ?>
          <tr>
            <td colspan="5" class="empty-cart">Your cart is empty.</td>
          </tr>
      <?php } ?>
    <tr class="total-row">
      <td colspan="2">Total:</td>
      <td><?php echo "$".number_format($total_price, 2); ?></td>
      <td><?php echo $total_quantity; ?></td>
      <td></td>
    </tr>
  </tbody>
</table>

</body>
</html>
