<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <title>Login</title>
</head>
<script>
    <?php
        if (isset($_GET['error'])) {
    ?>
        var errorMessage = "<?php echo $_GET['error']; ?>";
        if (errorMessage !== "") {
            var errorDiv = document.getElementById("error-message");
            errorDiv.innerText = errorMessage;
            errorDiv.style.display = "block";
        }
    <?php
        }
    ?>
</script>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
            <form action="database.php" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label> <a href="forget.php">Forget Password</a> </label>
                      
                    </div>
                    <button id="loginButton" type="submit">Login</button>
                    <div class="register">
                        <p>Don't have a account <a href="Register.php">Register</a></p>
                    </div>
                    <div id="error-message" class="error-message" style="display:none;">
                    Login failed. Please check your email and password.
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>