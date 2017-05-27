<?
	include("confs/auth.php");
	include("confs/config.php");

	#pagination

	$total = mysqli_query($conn, "SELECT id from books");
	$total = mysqli_num_rows($total);

	$start = 0;
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}

	$limit = 3;
	$previous = $start - $limit;
	$next = $start + $limit;
	$result = mysqli_query($conn, "SELECT books.*, categories.name FROM books LEFT JOIN categories ON books.category_id = categories.id ORDER BY created_date DESC LIMIT $start,$limit");
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Book Lists</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Book List</h1>
	<!-- Menu -->
	<ul class="menu">
		<li><a href="book-list.php">Manage Book</a></li>
		<li><a href="cat-list.php">Manage Catagories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>

	<? while($row = mysqli_fetch_assoc($result)): ?>
	<ul class="book-list">
		<li>
			<? if(!is_dir("covers/{$row['cover']}") and file_exists("covers/{$row['cover']}")): ?>
			<img src="covers/<?= $row['cover']; ?>" align="right" height="140">
			<? else: ?>
			<img src="covers/no-cover.gif" align="right" height="140">
			<? endif; ?>
			<h2><?= $row['title']; ?></h2>
			<i>by <?= $row['author']; ?></i>
			<small>(in <?= $row['name']; ?>)</small>
			<span>$<?= $row['price']; ?></span>
			<p><?= $row['summary']; ?></p>

			[<a href="book-del.php?id=<?= $row['id']; ?>" onClick="return confirm('Are You Sure?')" class="del">del</a>]
			[<a href="book-edit.php?id=<?= $row['id']; ?>" class="edit">edit</a>]
		</li>
	</ul>
	<?endwhile;?>
	<a href="book-new.php" class="new">New Book</a>

	<div class="pagination">
		<? if($previous < 0): ?>
			<span>&laquo;Previous</span>
		<? else: ?>
			<a href="?start=<?= $previous; ?>" class="prev">&laquo;Previous</a>
		<?endif;?>
		<? if($next >= $total): ?>
			<span>Next&raquo;</span>
		<? else: ?>
			<a href="?start=<?= $next; ?>" class="next">Next&raquo;</a>
		<?endif;?>
	</div>

	<div style="clear: both;"></div>
</body>
</html>