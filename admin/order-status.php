<?
	include("confs/config.php");

	$status = $_GET['status'];
	$id = $_GET['id'];
	mysqli_query($conn, "UPDATE orders SET status=$status, modified_date=now() WHERE id=$id");

	header("location: orders.php");