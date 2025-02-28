<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM appointments WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevularım</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="randevu_style.css">
</head>
<body>
    <div class="container">
        <h2>Randevularım</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Telefon</th>
                        <th>Randevu Tarihi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo date('l, d F Y', strtotime($row['appointment_date'])); ?></td>
                        </tr>
                        <?php $x++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <button class="back_button" onclick="window.location.href='index.php'">Geri</button>
        <?php else: ?>
            <p>Hiç randevu bulunamadı.</p>
        <?php endif; ?>
    </div>
</body>
</html>