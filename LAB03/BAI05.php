<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Diện Tích và Thể Tích</title>
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

    input[type="number"] {
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
        text-align: center;
        min-width: 200px;
    }

    .value-line {
        margin: 10px 0;
    }
    </style>
</head>

<body>
    <h2>Tính Diện Tích và Thể Tích Hình Lập Phương</h2>

    <form method="get" action="#">
        <label for="chieudai">Chiều dài:</label><br>
        <input type="number" name="chieudai" id="chieudai" min="0"><br><br>

        <label for="chieurong">Chiều rộng:</label><br>
        <input type="number" name="chieurong" id="chieurong" min="0"><br><br>

        <label for="chieucao">Chiều cao:</label><br>
        <input type="number" name="chieucao" id="chieucao" min="0"><br><br>

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
            return 2 * ($this->dai + $this->rong);
        }
    }
    class HinhLapPhuong extends HinhChuNhat {
        private $cao;
        public function __construct($d, $r, $c) {
            parent::__construct($d, $r);
            $this->cao = $c;
        }
        public function DienTich() {
            $dienTichMotMat = parent::DienTich();
            return 6 * $dienTichMotMat;
        }
        public function TheTich() {
            return parent::DienTich() * $this->cao;
        }
    }

    if (isset($_GET['Submit'])) {
        $dai = (float)$_GET['chieudai'];
        $rong = (float)$_GET['chieurong'];
        $cao = (float)$_GET['chieucao'];


        if ($dai <= 0 || $rong <= 0 || $cao <= 0) {
            echo "<div class='result'>Vui lòng nhập các số dương.</div>";
        } else {
            $h1 = new HinhLapPhuong($dai, $rong, $cao);
            $dientich = $h1->DienTich();
            $thetich = $h1->TheTich();
            echo "<div class='result'>";
            echo "<h3>Kết quả:</h3>";
            echo "<div class='value-line'>Diện tích: " . $dientich . " đơn vị vuông</div>";
            echo "<div class='value-line'>Thể tích: " . $thetich . " đơn vị khối</div>";
            echo "</div>";
        }
    }
    ?>
</body>

</html>