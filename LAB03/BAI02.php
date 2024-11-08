<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Số Ngày Từ Đầu Năm</title>
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
    <form method="get" action="#">
        <table border="1" cellspacing="0">
            <tr>
                <td>Ngày </td>
                <td><input type="input" name="ngay"></td>
            </tr>
            <tr>
                <td>Tháng </td>
                <td><input type="input" name="thang"></td>
            </tr>
            <tr>
                <td>Năm </td>
                <td><input type="input" name="nam"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Tổng" name="Submit">
                </td>
            </tr>
        </table>
    </form>

    <?php
    function KTNN($nam) {
        if ((($nam % 4 == 0) && ($nam % 100 != 0)) || ($nam % 400 == 0)) {
            return true;
        } else {
            return false;
        }
    }


    if (isset($_GET['Submit']) && ($_GET['Submit'] == "Tổng")) {
        $ngay = (int)$_GET['ngay'];
        $thang = (int)$_GET['thang'];
        $nam = (int)$_GET['nam'];
        $s = $ngay;

        for ($i = 1; $i < $thang; $i++) {
            switch ($i) {
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                    $s += 31;
                    break;
                case 4: case 6: case 9: case 11:
                    $s += 30;
                    break;
                case 2:
                    if (KTNN($nam)) {
                        $s += 29; 
                    } else {
                        $s += 28; 
                    }
                    break;
            }
        }

        
        echo "<div class='centered-output'>Tổng số ngày từ đầu năm: " . $s . "</div>";
    }
    ?>
</body>

</html>