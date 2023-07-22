<?php
// MySQL bağlantı bilgilerini burada ayarlayın
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

// Admin kullanıcılar tablosundan verileri çekme
$query_admin_users = "SELECT * FROM kullanici_tablosu";
$result_admin_users = mysqli_query($connection, $query_admin_users);

// İletişim formundan gelen verileri çekme
$query_iletisim_formu = "SELECT * FROM iletisim_formu";
$result_iletisim_formu = mysqli_query($connection, $query_iletisim_formu);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Paneli</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            display: block;
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            width: 100px;
            margin: 20px auto;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
    <h1>Hoş Geldiniz, Admin!</h1>
    <p>YAVUZLAR</p>

    <!-- Admin Kullanıcılar Listesi -->
    <h2>Admin Kullanıcılar</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Kullanıcı Adı</th>
            <th>E-posta</th>
            <th>Şifre</th>
        </tr>
        <?php
        // Verileri admin_users tablosundan çekme ve tablo olarak listeleme
        while ($row = mysqli_fetch_assoc($result_admin_users)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- İletişim Formu Mesajları Listesi -->
    <h2>İletişim Formu Mesajları</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ad Soyad</th>
            <th>E-posta</th>
            <th>Mesaj</th>
        </tr>
        <?php
        // Verileri iletisim_formu tablosundan çekme ve tablo olarak listeleme
        while ($row = mysqli_fetch_assoc($result_iletisim_formu)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['message']."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="logout.php">Çıkış Yap</a>
</body>
</html>
