<?php
$angka = isset($_GET['angka']) ? intval($_GET['angka']) : 10;

$angka = max(1, min($angka, 10));

for ($i = 1; $i <= $angka; $i++) {
    for ($j = 1; $j <= $angka - $i + 1; $j++) {
        echo $j . ' ';
    }
    echo "<br>";
}
?>