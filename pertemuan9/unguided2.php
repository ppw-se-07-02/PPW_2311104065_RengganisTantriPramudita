<?php
$total = 750000;
$diskon = 0;

if ($total >= 1000000) {
    $diskon = 0.30;
} elseif ($total >= 500000) {
    $diskon = 0.20;
} elseif ($total >= 100000) {
    $diskon = 0.10;
}

$jumlahDiskon = $total * $diskon;
$totalBayar = $total - $jumlahDiskon;

echo "Total Belanja: Rp " . number_format($total, 0, ',', '.') . "<br>";
echo "Diskon: Rp " . number_format($jumlahDiskon, 0, ',', '.') . "<br>";
echo "Total Bayar: Rp " . number_format($totalBayar, 0, ',', '.') . "<br>";
?>
