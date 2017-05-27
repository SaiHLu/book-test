<?  include("confs/auth.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>New Category</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>New Category</h1>
	<form action="cat-add.php" method="post">
		<label for="name">Name</label>
		<input type="text" placeholder="Please Enter Category Name" id="name" name="name">

		<label for="remark">Remark</label>
		<textarea placeholder="Enter Your Remark here!" id="remark" name="remark"></textarea>

		<input type="submit" name="submit" value="Add" class="add">
	</form>

	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("form").validate({
				rules: {
					"name": "required",
				},
				messages: {
					"name": "Please provide cateogry name"
				}
			});
		});
	</script>
</body>
</html>