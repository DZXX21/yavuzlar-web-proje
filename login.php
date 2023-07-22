<?php
// MySQL bağlantı bilgilerinizi burada ayarlayın
$host = "localhost";
$username = "root";
$password = "";
$database = "yavuzlar";

// Bağlantı oluşturma
$connection = mysqli_connect($host, $username, $password, $database);

// Bağlantı kontrolü
if (mysqli_connect_errno()) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

// Formdan gelen verileri alınması
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kullanıcıyı veritabanında arama
    $query = "SELECT * FROM kullanici_tablosu WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Şifre doğrulama
        if (password_verify($password, $user['password'])) {
            // Giriş başarılıysa, oturumu başlat
            session_start();
            $_SESSION['username'] = $username;
            header("Location: admin_panel.php");
            exit; // Yönlendirmeden sonra diğer işlemleri durdurmak için
        } else {
            echo "Hatalı kullanıcı adı veya şifre.";
        }
    } else {
        echo "Hatalı kullanıcı adı veya şifre.";
    }
}

// Bağlantıyı kapatma
mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Giriş Sayfası</title>
    <!-- CSS dosyasını ekleyin -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Giriş Yap</h2>
    <form action="login.php" method="post">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>
