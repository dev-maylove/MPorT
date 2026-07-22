<?php
require '../app/session.php';
adminOnly();
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body>

<h1>Dashboard Admin</h1>

<p>Selamat datang Administrator</p>

<p><?=htmlspecialchars($_SESSION['user']['fullname'])?></p>

<a href="auth/logout.php">Logout</a>

</body>
</html>
