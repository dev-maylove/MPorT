<?php
require '../app/session.php';
auth();
?>
<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
</head>
<body>
<h2>Dashboard Pengguna</h2>

<p>Selamat datang, <?=htmlspecialchars($_SESSION['user']['fullname'])?></p>

<p>Username: <?=htmlspecialchars($_SESSION['user']['username'])?></p>

<p>Role: <?=htmlspecialchars($_SESSION['user']['role'])?></p>

<a href="auth/logout.php">Logout</a>
</body>
</html>
