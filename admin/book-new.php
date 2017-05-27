<? 
  include("confs/auth.php");
  include("confs/config.php"); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>New Book</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>New Book</h1>

	<form action="book-add.php" method="post" enctype="multipart/form-data">
		<label for="title">Book Title</label>
		<input type="text" name="title" id="title">

		<label for="author">Author</label>
		<input type="text" name="author" id="author">

		<label for="summary">Summary</label>
		<textarea name="summary" id="summary"></textarea>

		<label for="price">Price</label>
		<input type="text" name="price" id="price">

		<label for="category_id">Cateogry</label>
		<select id="category_id" name="category_id">
			<option value="0"> -- Choose Category -- </option>

			<?
				$result = mysqli_query($conn, "SELECT * FROM categories");
				while ($row = mysqli_fetch_assoc($result)):
			?>
			<option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
			<? endwhile; ?>
		</select>

		<label for="cover">Cover</label>
		<input type="file" name="cover" id="cover" style="display: block;">

		<input type="submit" name="submit" value="Add">
		<a href="book-list.php" class="back">&laquo;Back</a>
	</form>

	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script>
		$(function(){
			$("form").validate({
				rules: {
					"title": "required",
					"author": "required",
					"summary": "required",
					"price": "required",
					"category_id": "required"
				},
				messages: {
					"title": "Please provide book title",
					"author": "Please provide author name",
					"summary": "Please provide book summary",
					"price": "Please provide book's price",
					"category_id": "Please Choose book's Category"
				}
			})
		});
	</script>
</body>
</html>