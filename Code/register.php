<?php
include 'config.php';
session_start();

$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    // Kullanıcı adı veya e-postanın zaten kayıtlı olup olmadığını kontrol edin
    $kayitli_isim = mysqli_query($conn, "SELECT * FROM users WHERE name='$name'");
    $kayitli_eposta = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_fetch_assoc($kayitli_isim) || mysqli_fetch_assoc($kayitli_eposta)) {
        $error_message = 'Kullanıcı adı veya e-posta zaten kayıtlı';
    } elseif ($pass1 != $pass2) {
        $error_message = 'Şifre doğrulama eşleşmiyor';
    } else {
        $password = password_hash($pass1, PASSWORD_BCRYPT);

        //Bir SQL ifadesi hazırlayın
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Kayıt başarılı. <a href='login.php'>Buradan giriş yapın</a>";
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Hata: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="register_style.css">
</head>
<body>
    <?php if ($error_message): ?>
        <script>alert('<?php echo $error_message; ?>');</script>
    <?php endif; ?>

    <div class="container">
        <h2>Kayıt Ol</h2>
        <form action="" method="post">
            <label for="name">İsim:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password1">Şifre:</label>
            <input type="password" id="password1" name="password1" required><br>
            <label for="password2">Şifreyi Doğrula:</label>
            <input type="password" id="password2" name="password2" required><br>
            <button type="submit">Kayıt Ol</button>
        </form>
        <a href="login.php" class="link">Zaten bir hesabınız var mı? Buradan giriş yapın</a>
    </div>
</body>
</html>