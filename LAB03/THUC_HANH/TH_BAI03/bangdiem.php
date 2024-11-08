<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
}

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: dangnhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bảng điểm</title>
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

    table {
        border-collapse: collapse;
        margin: 20px auto;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
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
        <h2>BẢNG ĐIỂM</h2>
        <p>Tên: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên môn</th>
                <th>Điểm</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Cơ sở dữ liệu</td>
                <td>7</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Phát triển ứng dụng web</td>
                <td>8</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Lập trình Java</td>
                <td>7.5</td>
            </tr>
        </table>
        <a href="thongtinsinhvien.php">Xem thông tin sinh viên</a>
    </div>
</body>

</html>