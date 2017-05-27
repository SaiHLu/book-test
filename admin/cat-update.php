<? 
	include("confs/config.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$remark = $_POST['remark'];

	mysqli_query($conn, "UPDATE categories SET name='$name', remark='$remark', modified_date=now() WHERE id=$id");

	header("location: cat-list.php");
?>