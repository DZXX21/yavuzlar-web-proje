<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan verileri alma
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yavuzlar";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantı kontrolü
    if ($conn->connect_error) {
        die("Veritabanına bağlanılamadı: " . $conn->connect_error);
    }

    // Veritabanına veri ekleme
    $sql = "INSERT INTO contact_form (fullname, email, subject, message) VALUES ('$fullname', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Mesajınız başarıyla gönderildi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    // Veritabanı bağlantısını kapatma
    $conn->close();
}
?>
