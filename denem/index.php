<!DOCTYPE html>
<html>
<head>
    <title>Admin Giriş Sayfası</title>
</head>
<body>
    <h2>Admin Girişi</h2>
    <form action="login.php" method="post">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>
