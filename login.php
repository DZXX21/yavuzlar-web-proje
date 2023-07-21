<?php
// Veritabanı bağlantısı
$servername = "localhost"; // Veritabanı sunucu adı (genellikle "localhost" olur)
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı kullanıcı parolası
$dbname = "yavuzlar"; // Veritabanı adı

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

// Kullanıcı adını alın
$username = $_POST['username'];

// Şifreyi alın ve güvenli bir şekilde şifreleyin (password_hash ile şifreleme)
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Admin kullanıcısını veritabanına ekleyin
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Admin kullanıcısı başarıyla oluşturuldu.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
