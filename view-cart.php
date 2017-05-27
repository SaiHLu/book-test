<? 
	session_start();
	include("admin/confs/config.php");
	if(!isset($_SESSION['cart'])){
		unset($_SESSION['cart']);
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<h1>Book Store</h1>

	<div class="sidebar">
		<ul class="cats">
			<li><a href="index.php" class="continue">&laquo; Continue Shopping</a></li>
			<li><a href="clear-cart.php" class="clear">&times; Clear Cart</a></li>
		</ul>
	</div>

	<div class="main">
		<div class="order">
			<table>
				<tr>
					<th>Book Title</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Price</th>
				</tr>

				<? 
					$total = 0;
					foreach($_SESSION['cart'] as $id => $qty):
						$sql = "SELECT title, price FROM books WHERE id = $id";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						$total += $row['price'] * $qty;
				?>
				<tr>
					<td><?= $row['title']; ?></td>
					<td><?= $qty; ?></td>
					<td><?= $row['price'];?></td>
					<td><?= $row['price']* $qty; ?></td>
				</tr>
				<?endforeach;?>
				<tr>
					<td colspan="3" align="right">Total: </td>
					<td><?= $total;?></td>
				</tr>
			</table>

			<br><br><br>
			<h2>Order Now</h2>
			<form action="submit-order.php" method="post">
				<label for="name">Your Name</label>
				<input type="text" id="name" name="name">

				<label for="email">Email</label>
				<input type="email" id="email" name="email">

				<label for="phone">Phone</label>
				<input type="text" name="phone" id="phone">

				<label for="address">Address</label>
				<textarea name="address" id="address"></textarea>

				<br><br>
				<input type="submit" name="order" value="Order">
				<a href="index.php">Continue Shopping</a>
			</form>
		</div>
	</div>

	<div style="clear: both;"></div>
	<div class="footer">
		<p>&copy; <?= date("Y"); ?>. All right reserved.</p>
	</div>

	<div style="clear: both;"></div>

	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script>
		$(function(){
			$("form").validate({
				rules: {
					"name": "required",
					"email": {
						required: true,
						email: true
					},
					"phone": "required",
					"address": "required"
				},
				messages: {
					"name": "Please provide your name",
					"email": {
						required: "Please provide your email",
						email: "Email should be a valid email address"
					},
					"phone": "Please provide your phone number",
					"address": "Please provide your address"
				}
			});
		});
	</script>
</body>
</html>