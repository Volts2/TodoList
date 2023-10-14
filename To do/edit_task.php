<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
<h1>Edit Task</h1>
<?php
$id = $_GET['id'];

$conn = new mysqli('localhost', 'root', '1', 'task_tracker');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tasks WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<form action="update_task.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
    Description: <textarea name="description"><?php echo $row['description']; ?></textarea><br>
    Due Date: <input type="date" name="due_date" value="<?php echo $row['due_date']; ?>"><br>
    <input type="submit" value="Save Changes">
</form>
<a href="index.php">Back to Task List</a>
</body>
</html>
