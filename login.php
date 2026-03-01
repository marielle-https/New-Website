<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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

    .login-container {
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        width: 350px;
        text-align: center;
    }

    h1 {
        margin-bottom: 30px;
        font-size: 32px;
        color: #333;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        border: none;
        border-radius: 6px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-top: 15px;
        transition: background 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .register-link {
        margin-top: 15px;
        display: block;
        font-size: 14px;
    }

    .register-link a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="login-container">
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "user_db");
    if ($conn->connect_error) {
        die("Connection failed");
    }

    $username_input = $_POST["username"];
    $password_input = $_POST["password"];

    // Direct SQL (VULNERABLE)
    $sql = "SELECT * FROM users 
            WHERE username = '$username_input' 
            AND password = '$password_input'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username_input;
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Invalid login.');</script>";
    }

    $conn->close();
}
?>

<h1>Login</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<input type="submit" value="Login">
</form>

<span class="register-link">
    Don't have an account? <a href="register.php">Register</a>
</span>

</div>
</body>
</html>