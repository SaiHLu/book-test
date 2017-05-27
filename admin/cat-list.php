<? 
 include("confs/auth.php");
 include("confs/config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Category List</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Category List</h1>
	<!-- Menu -->
	<ul class="menu">
		<li><a href="book-list.php">Manage Book</a></li>
		<li><a href="cat-list.php">Manage Catagories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<ul class="cat-list">

		<? 
		$sql = "SELECT * FROM categories";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)):
		?>

		<li title="<?= $row['remark'] ?>">
			[<a href="cat-del.php?id=<?= $row['id']; ?>" onClick="return confirm('Are You Sure')" class="del">del</a>]
			[<a href="cat-edit.php?id=<?= $row['id']; ?>" class="edit">edit</a>]
			<?= $row['name'];?>
		</li>
		<? endwhile; ?>
	</ul>
	<a href="cat-new.php" class="new">New Category</a>
	<div style="clear: both;"></div>
</body>
</html>