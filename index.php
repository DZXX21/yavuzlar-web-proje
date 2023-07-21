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

// Formdan gelen verileri al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adı ve parolanın boş olup olmadığını kontrol et
    if (empty($username) || empty($password)) {
        die("Kullanıcı adı ve parola alanları boş bırakılamaz.");
    }

    // Veritabanında kullanıcıyı ara
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Kullanıcı adı bulundu, şimdi parolayı kontrol edelim
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        if (password_verify($password, $hashedPassword)) {
            echo "Giriş başarılı. Hoş geldiniz, " . $username . "!";
        } else {
            echo "Hatalı şifre. Lütfen tekrar deneyin.";
        }
    } else {
        echo "Kullanıcı bulunamadı. Lütfen kayıt olun.";
    }
}

$conn->close();
?>
