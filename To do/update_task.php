<?php
// Ambil data dari form
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];

$conn = new mysqli('localhost', 'root', '1', 'task_tracker');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE tasks SET title = '$title', description = '$description', due_date = '$due_date' WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
