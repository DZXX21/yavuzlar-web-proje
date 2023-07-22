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

    // Şifreyi güvenli bir şekilde hashleme
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Kullanıcıyı veritabanına ekleme
    $query = "INSERT INTO kullanici_tablosu (username, password) VALUES ('$username', '$hashed_password')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Kullanıcı başarıyla kaydedildi.";
    } else {
        echo "Kullanıcı kaydedilirken bir hata oluştu: " . mysqli_error($connection);
    }
}

// Bağlantıyı kapatma
mysqli_close($connection);
?>
