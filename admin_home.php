<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Home</title>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'League Spartan', sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.admin-container {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 400px;
    text-align: center;
    opacity: 0;
    transform: translateY(50px);
    animation: slideUp 1s forwards;
}
@keyframes slideUp {
    to { opacity: 1; transform: translateY(0); }
}
h1 { font-size: 32px; margin-bottom: 20px; }
p { font-size: 18px; margin-bottom: 30px; }
a {
    text-decoration: none;
    color: white;
    background-color: #007bff;
    padding: 12px 20px;
    border-radius: 6px;
    font-size: 16px;
    display: inline-block;
}
a:hover { background-color: #0056b3; }
</style>
</head>
<body>
<div class="admin-container">
<h1>Welcome Admin</h1>
<p>Hello, <?php echo $_SESSION["admin"]; ?>! You are logged in as an administrator.</p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>