<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yavuzlar";

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

// Giriş bilgilerini alın
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcıyı veritabanında arayın
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {    
        // Kullanıcı adı mevcut, şifreyi kontrol edin
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Başarılı giriş, yönlendir
            header("Location: admin.html");
            exit();
        } else {
            $error = "Hatalı şifre!";
        }
    } else {
        $error = "Kullanıcı adı bulunamadı!";
    }
}

$conn->close();




?>
