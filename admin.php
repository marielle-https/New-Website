<?php
session_start();

$conn = new mysqli("localhost", "root", "", "admin_db");
if ($conn->connect_error) { die("Connection failed"); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $_SESSION["admin"] = $username;
        header("Location: admin_home.php");
        exit();
    } else {
        $error = "Invalid admin login";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
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
    width: 350px;
    text-align: center;
}
h1 { margin-bottom: 30px; }
input { width: 100%; padding: 12px; margin: 10px 0; border-radius: 6px; border: 1px solid #ccc; }
input[type="submit"] { background:#007bff; color:#fff; border:none; cursor:pointer; margin-top:15px; }
input[type="submit"]:hover { background:#0056b3; }
.error { color: red; margin-bottom: 10px; }
</style>
</head>
<body>
<div class="admin-container">
<h1>Admin Login</h1>
<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
<form method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<input type="submit" value="Login">
</form>
</div>
</body>
</html>