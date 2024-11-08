<!-- dangnhap.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập hệ thống xem điểm</title>
    <meta charset="utf-8">
    <style>
    body {
        background-color: #f4f4f9;
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 20px;
    }

    form {
        display: inline-block;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    input[type="text"],
    input[type="password"] {
        width: 150px;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .result {
        margin-top: 20px;
    }

    table {
        margin: 0 auto;
    }

    td {
        padding: 5px;
        text-align: left;
    }
    </style>
</head>

<body>
    <form method="post" action="bangdiem.php">
        <h2>Đăng nhập hệ thống xem điểm</h2>
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Đăng nhập">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>