<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DienTich_ChuVi_HCN</title>
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

    input[type="text"] {
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
    </style>
</head>

<body>
    <h2>Giải đáp chu vi và diện tích</h2>
    <form method="get" action="">
        <label for="chieudai">Chiều dài:</label><br>
        <input type="text" name="chieudai" id="chieudai" required><br><br>
        <label for="chieurong">Chiều rộng:</label><br>
        <input type="text" name="chieurong" id="chieurong" required><br><br>
        <input type="submit" value="Calculate" name="Submit">
    </form>

    <?php
    if (isset($_GET['Submit']) && ($_GET['Submit'] == "Calculate")) {
        $dai = (float)$_GET['chieudai'];
        $rong = (float)$_GET['chieurong'];

        if ($dai > 0 && $rong > 0) {
            $dientich = $dai * $rong;
            $chuvi = 2 * ($dai + $rong);

            echo "<div class='result'>";
            echo "<h3>Results:</h3>";
            echo "Diện tích: " . $dientich . " đơn vị vuông<br>";
            echo "Chu vi: " . $chuvi . " đơn vị";
            echo "</div>";
        } else {
            echo "<div class='result'>Hãy nhập các chỉ số hợp lệ!</div>";
        }
    }
    ?>
</body>

</html>