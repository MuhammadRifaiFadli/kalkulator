<?php 
    if (isset($_POST['hitung'])) {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];
        switch ($operasi) {
            case 'tambah':
                $hasil = $bil1 + $bil2;
                break;
            case 'kurang':
                $hasil = $bil1 - $bil2;
                break;
            case 'kali':
                $hasil = $bil1 * $bil2;
                break;
            case 'bagi':
                $hasil = $bil1 / $bil2;
                break;
        }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
    <style>
        body {
            background: #F2F2F2;
            font-family: "Times New Roman", serif;
        }

        .kalkulator {
            width: 335px;
            background: #32a852;
            margin: 100px auto;
            padding: 10px 20px 50px 20px;
            border-radius: 15px;
        }

        .bil {
            width: 300px;
            margin: 5px;
            border: none;
            font-size: 16pt;
            border-radius: 5px;
            padding: 10px;
            font-family: "Times New Roman";
        }

        .opt {
            font-size: 16pt;
            border: none;
            width: 215px;
            margin: 5px;
            border-radius: 5px;
            padding: 10px;
        }

        .tombol {
            background: #EC5159;
            border-top: none;
            border-right: none;
            border-left: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: #eee;
            font-size: 15pt;
            border-bottom: 4px solid #BF3D3D;
            font-family: "Times New Roman";
        }

        .judul {
            text-align: center;
            color: #eee;
            font-weight: normal;
        }
    </style>
    <script>
        function validateForm() {
            var bil1 = document.forms["calculatorForm"]["bil1"].value;
            var bil2 = document.forms["calculatorForm"]["bil2"].value;
            if (bil1 == "" || bil2 == "") {
                alert("Harap isi kedua kolom dengan angka.");
                return false;
            }
            if (isNaN(bil1) || isNaN(bil2)) {
                alert("Harap isi kolom dengan angka saja.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="kalkulator">
        <h2 class="judul">KALKULATOR</h2>
        <form name="calculatorForm" method="post" action="kalkulator.php" onsubmit="return validateForm()">            
            <input type="text" name="bil1" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Pertama">
            <input type="text" name="bil2" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Kedua">
            <select class="opt" name="operasi">
                <option value="tambah">+</option>
                <option value="kurang">-</option>
                <option value="kali">x</option>
                <option value="bagi">:</option>
            </select>
            <input type="submit" name="hitung" value="Hitung" class="tombol">                                            
        </form>
        <?php if (isset($_POST['hitung'])) { ?>
            <input type="text" value="<?php echo $hasil; ?>" class="bil" readonly>
        <?php } else { ?>
            <input type="text" value="0" class="bil">
        <?php } ?>            
    </div>
</body>
</html>
