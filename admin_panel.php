<?php
session_start();

// Yetkilendirme kontrolü (Dikkat: Daha güvenli yöntemler kullanılmalıdır)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Paneli</title>
</head>
<body>
    <h2>Hoş Geldiniz, Admin!</h2>
    <p>Burada admin paneline ait içerikler bulunabilir.</p>
    <a href="logout.php">Çıkış Yap</a>
</body>
</html>
