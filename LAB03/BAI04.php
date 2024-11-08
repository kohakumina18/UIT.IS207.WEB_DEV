<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DienTich_ChuVi_HCN_OOP</title>
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
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        display: inline-block;
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
        <input type="submit" value="Tính" name="Submit">
    </form>

    <?php
    class HinhChuNhat {
        private $dai, $rong;

        public function __construct($d, $r) {
            $this->dai = $d;
            $this->rong = $r;
        }
        public function DienTich() {
            return $this->dai * $this->rong;
        }
        public function ChuVi() {
            return ($this->dai + $this->rong) * 2;
        }
    }

    if (isset($_GET['Submit']) && ($_GET['Submit'] == "Tính")) {
        $dai = (float)$_GET['chieudai'];
        $rong = (float)$_GET['chieurong'];

    if ($dai > 0 && $rong > 0) {
        $h1 = new HinhChuNhat($dai, $rong);
        $dientich = $h1->DienTich();
        $chuvi = $h1->ChuVi();

        echo "<div class='result'>";
        echo "<h3>Kết quả:</h3>";
        echo "<div class='value-line'>Diện tích: " . $dientich . " đơn vị vuông</div>";
        echo "<div class='value-line'>Chu vi: " . $chuvi . " đơn vị</div>";
        echo "</div>";
    } else {
        echo "<div class='result'>Hãy nhập các chỉ số hợp lệ!</div>";
    }
}
    ?>
</body>

</html>