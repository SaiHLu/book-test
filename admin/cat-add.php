<? 
include("confs/config.php"); 
$name = $_POST['name'];
$remark = $_POST['remark'];

$sql = "INSERT into categories (name, remark, created_date, modified_date) VALUES ('$name', '$remark', now(), now())";
mysqli_query($conn, $sql);

header("location: cat-list.php");
?>

