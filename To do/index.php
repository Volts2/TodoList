<!DOCTYPE html>
<html>
<head>
    <title>Task Tracker</title>
</head>
<body>
<h1>Task List</h1>

<h2>Add Task</h2>
<form action="index.php" method="post">
    Title: <input type="text" name="title"><br>
    Description: <textarea name="description"></textarea><br>
    Due Date: <input type="date" name="due_date"><br>
    <input type="submit" name="newTask" value="Add Task">
</form>

<ul>
<?php
    $conn = new mysqli('localhost', 'root', '1', 'task_tracker');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['newTask'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $due_date = $_POST['due_date'];

        $sql = "INSERT INTO tasks (title, description, due_date) VALUES ('$title', '$description', '$due_date')";
        $conn->query($sql);
    }

    if (isset($_POST['updateStatus'])) {
        $task_id = $_POST['task_id'];
        $new_status = $_POST['new_status'];

        $sql = "UPDATE tasks SET status = '$new_status' WHERE id = $task_id";
        $conn->query($sql);
    }

    if (isset($_GET['delete'])) {
        $task_id = $_GET['delete'];

        $sql = "DELETE FROM tasks WHERE id = $task_id";
        $conn->query($sql);
    }

    $sql = "SELECT * FROM tasks ORDER BY status ASC, due_date ASC";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo '<li>';
        echo '<strong>' . $row['title'] . '</strong><br>';
        echo 'Description: ' . $row['description'] . '<br>';
        echo 'Due Date: ' . $row['due_date'] . '<br>';
        echo 'Status: ' . $row['status'] . '<br>';

        echo '<form method="post" action="index.php">';
        echo '<input type="hidden" name="task_id" value="' . $row['id'] . '">';
        echo '<select name="new_status">';
        echo '<option value="Not Started">Not Started</option>';
        echo '<option value="In Progress">In Progress</option>';
        echo '<option value="Waiting On">Waiting On</option>';
        echo '<option value="Done">Done</option>';
        echo '</select>';
        echo '<input type="submit" name="updateStatus" value="Update Status">';
        echo '</form>';

        echo '<a href="edit_task.php?id=' . $row['id'] . '">Edit</a> | ';
        echo '<a href="index.php?delete=' . $row['id'] . '">Delete</a>';
        echo '</li>';
    }

    $conn->close();
    ?>
</ul>
</body>
</html>
