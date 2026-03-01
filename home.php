<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<!-- Google Fonts: League Spartan -->
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'League Spartan', sans-serif;
        background: #f0f2f5;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .home-container {
        text-align: center;
        animation: slideUp 1s ease-out forwards;
        opacity: 0;
    }

    @keyframes slideUp {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    h1 {
        font-size: 48px;
        color: #333;
        margin-bottom: 20px;
    }

    .logout-btn {
        display: inline-block;
        padding: 12px 25px;
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.3s;
    }

    .logout-btn:hover {
        background-color: #b02a37;
    }
</style>
</head>
<body>
<div class="home-container">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>
</body>
</html>