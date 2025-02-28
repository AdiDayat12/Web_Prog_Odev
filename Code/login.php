<?php
include 'config.php';
session_start();

if (isset($_COOKIE['userid'])) {
    $user_id = $_COOKIE['userid'];

   
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit();
    }
}

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['user_id'] = $user['id'];

        // Set cookie
        if (isset($_POST['remember-me'])) {
            setcookie('userid', $user['id'], time() + 86400, "/"); 
        }

        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login_style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">E-posta:</label>
                <input type="email" id="email" name="email" required><br>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required><br>
            </div>
            <div class="form-group remember-me">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember Me</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <a href="register.php" class="link">Hesabınız yok mu? Buradan kayıt olun</a>
    </div>
</body>
</html>
