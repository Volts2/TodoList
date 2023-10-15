<?php
// Mulai sesi untuk mengidentifikasi pengguna yang login
session_start();
$user_id = $_SESSION['user_id']; // Dapatkan user_id pengguna yang login

// Ambil ID tugas dari URL
$id = $_GET['id'];

$conn = new mysqli('localhost', 'root', '1', 'task_tracker');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data tugas berdasarkan ID dan user_id
$sql = "SELECT * FROM tasks WHERE id = $id AND user_id = $user_id"; // Pastikan hanya tugas pengguna yang sedang login yang dapat diedit
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = isset($row['title']) ? $row['title'] : '';
    $description = isset($row['description']) ? $row['description'] : '';
    $due_date = isset($row['due_date']) ? $row['due_date'] : '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data yang diubah dari formulir
        $new_title = $_POST['title'];
        $new_description = $_POST['description'];
        $new_due_date = $_POST['due_date'];

        // Perbarui data tugas
        $update_sql = "UPDATE tasks SET title = '$new_title', description = '$new_description', due_date = '$new_due_date' WHERE id = $id AND user_id = $user_id";
        if ($conn->query($update_sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating task: " . $conn->error;
        }
    }
    
    // Menampilkan formulir pengeditan tugas
    ?>
    <form action="edit_task.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Title: <input type="text" name="title" value="<?php echo $title; ?>"><br>
        Description: <textarea name="description"><?php echo $description; ?></textarea><br>
        Due Date: <input type="date" name="due_date" value="<?php echo $due_date; ?>"><br>
        <input type="submit" value="Save Changes">
    </form>
    <?php
} else {
    echo "Task not found or you don't have permission to edit it.";
}

$conn->close();
?>
