<?
 include("confs/auth.php");
 include("confs/config.php");
 $id = $_GET['id'];
 $sql = "SELECT * FROM books WHERE id = $id";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Book</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Edit Book</h1>

	<form action="book-update.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $row['id']; ?>">

		<label for="title">Book Title</label>
		<input type="text" name="title" id="title" value="<?= $row['title']; ?>">

		<label for="author">Author</label>
		<input type="text" name="author" id="author" value="<?= $row['author']; ?>">

		<label for="summary">Summary</label>
		<textarea name="summary" id="summary"><?= $row['summary']; ?></textarea>

		<label for="price">Price</label>
		<input type="text" name="price" id="price" value="<?= $row['price']; ?>">

		<label for="category_id">Cateogry</label>
		<select id="category_id" name="category_id">
			<option value="0"> -- Choose Category -- </option>

			<?
				$categories = mysqli_query($conn, "SELECT id, name FROM categories");
				while($cat = mysqli_fetch_assoc($categories)):
			?>

			<option value="<?= $cat['id']; ?>"
			 <? if($cat['id'] == $row['category_id']) echo "selected"; ?> >
			 	<?= $cat['name']; ?>
			 </option>

			<? endwhile; ?>
		</select>

		<? if(!is_dir("covers/{$row['cover']}") and file_exists("covers/{$row['cover']}") ): ?>
			<img src="covers/<?= $row['cover']; ?>" alt="" height=140>
		<? else: ?>
			<img src="covers/no-cover.gif" alt="" height="140">
		<? endif; ?>
		<label for="cover">Change Cover</label>
		<input type="file" name="cover" id="cover" value="<?= $row['cover']; ?>" style="display: block;">

		<input type="submit" name="submit" value="Update">
		<a href="book-list.php" class="back">&laquo;Back</a>
	</form>		
</body>
</html>