<?php
// Oturumu sonlandırma işlemi
session_start();
session_destroy();

// Giriş sayfasına yönlendirme
header("Location: login.html");
exit;
?>
