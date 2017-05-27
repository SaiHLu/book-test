<?
	include("confs/auth.php");
	include("confs/config.php");

	$id = $_GET['id'];
	$sql = "SELECT * FROM categories WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Category</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Edit Category</h1>
	<form action="cat-update.php" method="post">
		<input type="hidden" name="id" value="<?= $row['id']; ?>">

		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?= $row['name']; ?>">

		<label for="remark">Remark</label>
		<textarea id="remark" name="remark"><?= $row['remark']; ?></textarea>

		<input type="submit" value="Update">
	</form>

	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script>
		$(function(){
			$("form").validate({
				rules: {
					"name": "required"
				},
				messages: {
					"name": "Please provide category name"
				}
			});
		});
	</script>
</body>
</html>