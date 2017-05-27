<? 
	session_start();
	include("admin/confs/config.php");

	$cart = 0;
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $qty){
			$cart += $qty;
		}
	}

	if(isset($_GET['cart'])){
		$id = $_GET['cart'];
		$books = mysqli_query($conn, "SELECT * FROM books WHERE category_id = $id");
	}else{
		$books = mysqli_query($conn, "SELECT * FROM books");
	}

	$cat = mysqli_query($conn, "SELECT * FROM categories");

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

	<div class="info">
		<a href="view-cart.php">(<?= $cart; ?>) books in your cart</a>
	</div>

	<div class="sidebar">
		<ul class="cats">
			<li class="all"><a href="index.php">All Books</a></li>
			<? while($row = mysqli_fetch_assoc($cat)): ?>
			<li><a href="?cart=<?= $row['id']; ?>"><?= $row['name']; ?></a></li>
			<?endwhile;?>
		</ul>

		<form action="search.php" class="search" method="post">
			<input type="text" placeholder="search by title" name="search">

			<input type="submit" name="search_btn" value="">
		</form>
	</div>

	<div class="main">
		<ul class="books">
			<? while($row = mysqli_fetch_assoc($books)): ?>
			<li>
				<?if(!is_dir("admin/covers/{$row['cover']}") and file_exists("admin/covers/{$row['cover']}")): ?>
				<img src="admin/covers/<?= $row['cover']; ?>" alt="" height="150">
				<?else:?>
				<img src="admin/covers/no-cover.gif" alt="" height="150">
				<?endif;?>
				<b><a href="book-detail.php?id=<?= $row['id'];?>"><?= $row['title']; ?></a></b>
				<i>$<?= $row['price']; ?></i>

				<a href="add-to-cart.php?id=<?= $row['id']; ?>" class="add-to-cart">Add to Cart</a>
			</li>
			<?endwhile;?>
		</ul>
	</div>

	<div class="footer">
		<p>&copy; <?= date("Y"); ?>. All right reserved.</p>
	</div>
</body>
</html>