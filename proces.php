<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
<?php
class Motor {
    public $nama,
            $waktu,
            $diskon,
            $jenis;
    protected $pajak;
    private $Scoopy, 
            $Vesmet, 
            $Sport, 
            $Vario;
    protected $listMember = ['Aisah', 'Malika', 'Tiara', 'Nadia', 'Nadila', 'Shayma'];
    public function __construct (){
        $this->pajak = 10000;
    }

    public function setHarga ($jenis1, $jenis2, $jenis3, $jenis4) {
        $this->Scoopy = $jenis1;
        $this->Vesmet = $jenis2;
        $this->Sport = $jenis3;
        $this->Vario = $jenis4;
    }

    public function getHarga () {
        $data["Scoopy"] = $this->Scoopy;
        $data["Vesmet"] = $this->Vesmet;
        $data["Sport"] = $this->Sport;
        $data["Vario"] = $this->Vario;
        return $data;
    }
}
class Rental extends Motor {
    public function setMember() {
        $member = in_array($this->nama, $this->listMember) ? "Member" : "Non Member";
        return $member;
    }

    public function getDiskon(){
        $diskon = ($this->setMember() == "Member") ? "5" : "0";
        return $diskon;
    }

    public function TotalBayar(){
        $dataHarga = $this->getHarga();
        $waktu = floatval($this->waktu);
        $hargaMotor = floatval($dataHarga[$this->jenis]);
        $hargaRental = $waktu * $hargaMotor;
        $hargaPPN = floatval($this->pajak);
        $hargaBayar = $hargaRental + $hargaPPN;
        $diskonMember = $hargaBayar * 0.05;
        if($this->setMember() == "Member") {
            $totalBayar = $hargaBayar - $diskonMember;
        } else {
            $totalBayar = $hargaBayar;
        }
        return $totalBayar;
    }

    public function cetakPembelian(){
        echo "<center>";
        echo $this->nama . " anda berstatus sebagai " . $this->setMember() . " Rental Motor, maka anda mendapatkan diskon sebesar " . $this->getDiskon() . "%" . "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari" . "<br>";
        echo "Harga rental perharinya: Rp. " . number_format($this->getHarga()[$this->jenis], 0, '', '.') . "<br>";
        echo "<br>";
        echo "Besar yang harus dibayar adalah Rp" . number_format($this->TotalBayar(), 0, '', '.');
        echo "</center>";
    }
}
?>
</body>
</html>