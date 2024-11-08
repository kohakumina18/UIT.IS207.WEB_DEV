<!DOCTYPE html>
<html>

<head>
    <title>Tìm kiếm tên trong mảng</title>
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
    <form method="get">
        <label for="tencantim">Nhập tên cần tìm:</label>
        <input type="text" id="tencantim" name="tencantim">
        <input type="submit" value="Tìm">
    </form>

    <?php
    $ban = array("Tuấn" => 21, "Tú" => 19, "Tâm" => 22, "Tùng" => 20);

    function printArray($array) {
        foreach ($array as $ten => $tuoi) {
            echo "$ten\t$tuoi<br>";
        }
    }

    function searchInArray($array, $str) {
        foreach ($array as $ten => $tuoi) {
            if ($ten === $str) {
                return true;
            }
        }
        return false;
    }

    if (isset($_GET['tencantim'])) {
        $ten = $_GET['tencantim'];
        if (searchInArray($ban, $ten)) {
            echo "Tìm thấy $ten trong mảng<br>";
        } else {
            echo "Không tìm thấy $ten<br>";
        }

        echo "<h3>Xuất mảng</h3>";
        printArray($ban);
    }
    ?>
</body>

</html>