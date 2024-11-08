<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh sách</title>
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
    <?php
    session_start();
    
    if (!isset($_SESSION['ban'])) {
        $_SESSION['ban'] = array("Tuấn" => 21, "Tú" => 19, "Tâm" => 22, "Tùng" => 20);
    }

    class QuanLyDanhSach {
        private $danhsach;

        public function __construct($ds) {
            $this->danhsach = $ds;
        }

        public function xuatDanhSach() {
            echo "<div class='result'>";
            echo "<h3>Danh sách hiện tại:</h3>";
            foreach ($this->danhsach as $ten => $tuoi) {
                echo "$ten: $tuoi tuổi<br>";
            }
            echo "</div>";
        }

        public function timTheoTen($ten) {
            return isset($this->danhsach[$ten]);
        }

        public function xuatTren20() {
            echo "<div class='result'>";
            echo "<h3>Danh sách người trên 20 tuổi:</h3>";
            foreach ($this->danhsach as $ten => $tuoi) {
                if ($tuoi > 20) {
                    echo "$ten: $tuoi tuổi<br>";
                }
            }
            echo "</div>";
        }

        public function sapXepTheoTuoi() {
            asort($this->danhsach);
            $_SESSION['ban'] = $this->danhsach;
            $this->xuatDanhSach();
        }

        public function themPhanTu($ten, $tuoi) {
            if (!isset($this->danhsach[$ten])) {
                $this->danhsach[$ten] = $tuoi;
                $_SESSION['ban'] = $this->danhsach;
                return true;
            }
            return false;
        }

        public function timTheoTuoi($tuoi) {
            echo "<div class='result'>";
            echo "<h3>Kết quả tìm kiếm theo tuổi $tuoi:</h3>";
            $found = false;
            foreach ($this->danhsach as $ten => $t) {
                if ($t == $tuoi) {
                    echo "$ten: $tuoi tuổi<br>";
                    $found = true;
                }
            }
            if (!$found) {
                echo "Không tìm thấy ai $tuoi tuổi";
            }
            echo "</div>";
        }

        public function xoaTheoTen($ten) {
            if (isset($this->danhsach[$ten])) {
                unset($this->danhsach[$ten]);
                $_SESSION['ban'] = $this->danhsach;
                return true;
            }
            return false;
        }

        public function getDanhSach() {
            return $this->danhsach;
        }
    }

    $quanLy = new QuanLyDanhSach($_SESSION['ban']);
//xu ly cac phuong thuc
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'them':
                if (isset($_GET['ten']) && isset($_GET['tuoi'])) {
                    if ($quanLy->themPhanTu($_GET['ten'], (int)$_GET['tuoi'])) {
                        echo "<div class='result'>Đã thêm thành công!</div>";
                    } else {
                        echo "<div class='result'>Tên đã tồn tại!</div>";
                    }
                }
                break;
            case 'xoa':
                if (isset($_GET['ten'])) {
                    if ($quanLy->xoaTheoTen($_GET['ten'])) {
                        echo "<div class='result'>Đã xóa thành công!</div>";
                    } else {
                        echo "<div class='result'>Không tìm thấy tên để xóa!</div>";
                    }
                }
                break;
            case 'timtuoi':
                if (isset($_GET['tuoi'])) {
                    $quanLy->timTheoTuoi((int)$_GET['tuoi']);
                }
                break;
            case 'tren20':
                $quanLy->xuatTren20();
                break;
            case 'sapxep':
                $quanLy->sapXepTheoTuoi();
                break;
        }
    }
    ?>

    <form method="get">
        <label for="tencantim">Tìm theo tên:</label><br>
        <input type="text" id="tencantim" name="ten">
        <input type="submit" name="action" value="tim">
    </form>

    <form method="get">
        <label for="ten">Thêm người mới:</label><br>
        <input type="text" name="ten" placeholder="Tên">
        <input type="number" name="tuoi" placeholder="Tuổi">
        <input type="submit" name="action" value="them">
    </form>

    <form method="get">
        <label for="tenxoa">Xóa theo tên:</label><br>
        <input type="text" name="ten" placeholder="Tên cần xóa">
        <input type="submit" name="action" value="xoa">
    </form>

    <form method="get">
        <label for="tuoi">Tìm theo tuổi:</label><br>
        <input type="number" name="tuoi" placeholder="Tuổi cần tìm">
        <input type="submit" name="action" value="timtuoi">
    </form>

    <div class="controls">
        <form method="get" style="display: inline;">
            <input type="submit" name="action" value="tren20" style="background-color: #2196F3;">
        </form>
        <form method="get" style="display: inline;">
            <input type="submit" name="action" value="sapxep" style="background-color: #9C27B0;">
        </form>
    </div>

    <?php
    $quanLy->xuatDanhSach();
    ?>

</body>

</html>