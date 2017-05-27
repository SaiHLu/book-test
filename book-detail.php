<?
	include("admin/confs/config.php");
	$id = $_GET['id'];
	$sql = "SELECT * FROM books WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Book Detail</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Book Detail</h1>

	<a href="index.php" class="back">&laquo; Go Back</a>

	<ul class="books">
		<li>
			<? if(!is_dir("admin/covers/{$row['cover']}") and file_exists("admin/covers/{$row['cover']}")):?>
				<img src="admin/covers/<?= $row['cover']; ?>" align="left">
			<?else:?>
				<img src="admin/covers/no-cover.gif" align="left">
			<?endif;?>
			<b><?= $row['title'];?></b>
			<i>by <?= $row['author'];?></i>
			<span>$<?= $row['price'];?></span>
			<p><?= $row['summary'];?></p>
			<a href="add-to-cart.php" class="add-to-cart">Add to Cart</a>
		</li>
	</ul>
</body>
</html>