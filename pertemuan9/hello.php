<?php
//echo "Hello World!";

/*$nama = "Ren";
$nim = "2311104065";
$hobi = "makan";

echo "Nama : " . $nama . "<br>";
echo "NIM : " . $nim . "<br>";
echo "Hobi : " . $hobi . "<br>";*/

/* define("NAMA", "Ren");
define("NIM", "2311104065");
define("ASAL", "Klaten");

echo "Nama : " . NAMA . "<br>";
echo "NIM :  " . NIM . "<br>";
echo "Asal : " . ASAL. "<br>"; */

/*$nilai = 45;

if ($nilai > 50) {
    echo "Nilai Anda adalah " . $nilai . ". Selamat, Anda lulus";
} else {
    echo "Nilai Anda adalah " . $nilai . ". Maaf, Anda tidak lulus";
}*/

/*$nilai = 60;

switch (true) {
    case ($nilai > 50 && $nilai <= 60):
        echo "Nilai Anda adalah $nilai. Indeks nilai Anda C";
        break;

    case ($nilai > 60 && $nilai <= 70):
        echo "Nilai Anda adalah $nilai. Indeks nilai Anda BC";
        break;

    case ($nilai > 70 && $nilai <= 75):
        echo "Nilai Anda adalah $nilai. Indeks nilai Anda B";
        break;

    case ($nilai > 75 && $nilai <= 80):
        echo "Nilai Anda adalah $nilai. Indeks nilai Anda AB";
        break;

    case ($nilai > 80 && $nilai <= 100):
        echo "Nilai Anda adalah $nilai. Indeks nilai Anda A";
        break;

    default:
        echo "Nilai Anda adalah $nilai. Maaf, Anda tidak lulus";
        break;
}*/

/*echo "Ini adalah contoh perulangan for";
echo "<br>";

for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}

echo "<br><br>";

echo "Ini adalah contoh perulangan while";
echo "<br>";

$i = 1;
while ($i <= 20) {
    echo $i . " ";
    $i += 2;
}

echo "<br><br>";

echo "Ini adalah contoh perulangan do-while";
echo "<br>";

$i = 1;
do {
    echo $i . " ";
    $i += 3;
} while ($i < 30);*/



/*function cetakGenap($awal, $akhir)
{
    for ($i = $awal; $i <= $akhir; $i++) {
        if ($i % 2 == 0) {
            echo "$i ";
        }
    }
}

//pemanggilan fungsi
$a = 10;
$b = 50;

echo "Bilangan genap dari $a sampai $b adalah : <br>";
cetakGenap($a, $b); 

function luasSegitiga($alas, $tinggi)
{
    return 0.5 * $alas * $tinggi;
}

// pemanggilan fungsi
$a = 10;
$t = 50 ;
echo "<br>";
echo "Luas Segitiga dengan alas $a dan tinggi $t adalah : " . luasSegitiga($a, $t);*/

$arrKendaraan = ["Mobil", "Pesawat", "Kereta Api", "Kapal Laut", "Sepeda"];

echo $arrKendaraan[0] . "<br>"; // Mobil
echo $arrKendaraan[2] . "<br>"; // Kereta Api
echo $arrKendaraan[4] . "<br>"; // Kereta Api

$arrKota = [];
$arrKota[] = "Jakarta";
$arrKota[] = "Medan";
$arrKota[] = "Bandung";
$arrKota[] = "Malang";
$arrKota[] = "Sulawesi";

echo $arrKota[1] . "<br>"; // Medan
echo $arrKota[2] . "<br>"; // Bandung
echo $arrKota[4] . "<br>"; // Sulawesi */


$arrAlamat = [
    "Rona" => "Banjarmasin",
    "Dhiva" => "Bandung",
    "Ilham" => "Medan",
    "Oku" => "Hongkong",
];

echo $arrAlamat["Dhiva"] . "<br>"; // Bandung
echo $arrAlamat["Oku"] . "<br>";   // Hongkong

$arrNim = [];
$arrNim["Rona"]    = "11011112";
$arrNim["Dhiva"]   = "11011101";
$arrNim["Ilham"]   = "11011309";
$arrNim["Oku"]     = "11014765";
$arrNim["Fadhlan"] = "11011113";

echo $arrNim["Ilham"] . "<br>";    // 11011309
echo $arrNim["Fadhlan"] . "<br>";  // 11011113


?>


