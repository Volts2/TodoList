<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <title>Daftar</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" required name="username" id="username">
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email" id="email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password" id="password">
                        <label for="">Password</label>
                    </div>
                    <button id="registerButton" type="submit">Register</button>
                    <div class="register">
                        <p>have an account <a href="index.php">Login</a></p>
                    </div>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                }
                ?>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
