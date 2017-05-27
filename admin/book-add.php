<?
	include("confs/config.php");

	$title = $_POST['title'];
	$author = $_POST['author'];
	$summary = $_POST['summary'];
	$price = $_POST['price'];
	$category_id = $_POST['category_id'];
	$cover = $_FILES['cover']['name'];
	$tmp_name = $_FILES['cover']['tmp_name'];

	if($cover){
		move_uploaded_file($tmp_name, "covers/$cover");
	}

	mysqli_query($conn, "INSERT INTO books (title, author, summary, price, category_id, cover, created_date, modified_date) VALUES('$title', '$author', '$summary', '$price', '$category_id', '$cover', now(), now())");

	header("location: book-list.php");
?>