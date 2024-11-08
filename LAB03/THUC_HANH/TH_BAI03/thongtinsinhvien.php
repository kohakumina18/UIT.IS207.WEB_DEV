<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: dangnhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thông tin sinh viên</title>
    <meta charset="utf-8">
    <style>
    body {
        background-color: #f4f4f9;
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 20px;
    }

    .container {
        display: inline-block;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .info {
        text-align: left;
        margin: 10px 0;
    }

    h2 {
        color: #333;
    }

    a {
        display: inline-block;
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 15px;
    }

    a:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Thông tin sinh viên</h2>
        <div class="info">
            <p>Tên: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p>Mật khẩu: <?php echo htmlspecialchars($_SESSION['password']); ?></p>
        </div>
        <a href="bangdiem.php">Quay lại bảng điểm</a>
    </div>
</body>

</html>