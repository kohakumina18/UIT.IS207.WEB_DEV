<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải phương trình bậc 2</title>
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
        margin: 10px;
    }

    input[type="text"],
    input[type="number"] {
        width: 150px;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"],
    button {
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        margin: 5px;
    }

    input[type="submit"]:hover,
    button:hover {
        background-color: #45a049;
    }

    .result {
        margin-top: 20px;
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        display: inline-block;
    }

    .controls {
        margin: 20px 0;
    }
    </style>
</head>

<body>
    <form method="get" action="">
        <table>
            <tr>
                <td>Hệ số a:</td>
                <td><input type="text" name="a"></td>
            </tr>
            <tr>
                <td>Hệ số b:</td>
                <td><input type="text" name="b"></td>
            </tr>
            <tr>
                <td>Hệ số c:</td>
                <td><input type="text" name="c"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Giải"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
        $a = (float)$_GET['a'];
        $b = (float)$_GET['b'];
        $c = (float)$_GET['c'];

        echo '<div class="result">';
        echo "Phương trình: " . $a . "x² + " . $b . "x + " . $c . " = 0<br><br>";
        $delta = $b * $b - 4 * $a * $c;

        if ($delta < 0) {
            echo "Phương trình vô nghiệm";
        } elseif ($delta == 0) {
            $x = -$b / (2 * $a);
            echo "Phương trình có nghiệm kép: x = " . $x;
        } else {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            echo "Phương trình có hai nghiệm phân biệt: x1 = " . $x1 . ", x2 = " . $x2;
        }
        echo '</div>';
    }
    ?>
</body>

</html>