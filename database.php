<?php
$host = "localhost";
$username = "root";
$password = "1";
$database = "login";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM tb_user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        header("Location: To do\index.php");
        exit();
    } else {
        header("Location: index.php?error=Login failed. Please check your email and password.");
    }    
}

mysqli_close($conn);
?>
