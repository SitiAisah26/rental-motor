<center><h3>Rental Motor<h3></center>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <center>
        <table>
                <tr>
                    <td>Nama Pelanggan :</td>
                    <td><input type="text" name="nama" id="nama" size="25"></td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (per hari) :</td>
                    <td><input type="number" name="waktu" id="waktu" size="25"></td>
                </tr>
                <tr>
                    <td>Jenis Motor :</td>
                    <td>
                    <select name="jenis" id="jenis">
                        <option value="Scoopy">Scoopy</option>
                        <option value="Vesmet">Vesmet</option>
                        <option value="Sport">Sport</option>
                        <option value="Vario">Vario</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td><button name="kirim" type="submit">Submit</button></td>
                </tr>
            </table>
            <div style="border: 1px solid black; width: 40%; padding: 10px; margin: 10px;">
            <?php
include "proces.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $proses = new Rental();
        $proses->setHarga(70000, 90000, 90000, 100000);
        
    if (isset($_POST['nama']) && isset($_POST['waktu']) && isset($_POST['jenis'])) {
        $proses->nama = $_POST['nama'];
        $proses->waktu = $_POST['waktu'];
        $proses->jenis = $_POST['jenis'];
        $proses->cetakPembelian();
        } else {
                echo "<center>Silahkan isi form terlebih dahulu</center>";
            }
        }
?>
</div>
           
    </center>
</body>
</html>