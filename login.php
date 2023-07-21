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

// Form gönderildiğinde işleme başlayalım
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan kullanıcı adı ve şifre alınması
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Veritabanında kullanıcıyı sorgulama
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Şifreyi doğrulayın (password_verify ile şifreli parolayı doğrulayın)
        if (password_verify($_POST["password"], $row["password"])) {
            // Giriş başarılı, kullanıcıyı ana sayfaya yönlendirin veya başka bir işlem yapın.
            echo "Giriş başarılı!";
            // Örnek olarak giriş başarılı olduğunda ana sayfaya yönlendirelim
            header("Location: ana_sayfa.php");
            exit();
        } else {
            // Giriş başarısız, kullanıcıyı login sayfasına geri yönlendirin veya hata mesajı gösterin.
            echo "Kullanıcı adı veya şifre hatalı!";
        }
    } else {
        // Kullanıcı adı bulunamadı, giriş başarısız
        echo "Kullanıcı adı veya şifre hatalı!";
    }
}
?>
