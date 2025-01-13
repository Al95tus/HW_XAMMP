<?php 

include_once $dbPath .  'db.php';
// new query
/*
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Delete_User'])):	
				   
	$id = array_search("Delete",$_POST['Delete_User']);	 
	
	$sql = "DELETE FROM users WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	header('Location: ../../users.php');
	exit;
endif;
*/

if(isset($_GET['id'])){
  // Вместо удаления сразу можно вывести пользователю вопрос для подтверждения удаления записи. Тогда на странице можно вывести данные записи и кнопку для удаления с методом пост. 
  // Подумайте, как это сделать. 
  delete('users', $_GET['id']);
  header("Location: /?app=$app&view=list");
}
  
/*

$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'acoolname';

// creates a new connection to the database
$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// checks connection
if ($conn->connect_error) {
  die("ERRO: Falha ao conectar. " . $conn->connect_error);
}

// query to delete the user

//Collect the specific user you want to delete from your form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user"])) {
    $username = $_POST["user"];

 // Delete user with the specified username
    $sql = "DELETE FROM users WHERE username = '$username'";

// logout user
if ($conn->query($sql) === true) {
  header("location: logout.php");
}else {
  echo "ERRO: Falha ao conectar. " . $conn->error;
}
  */