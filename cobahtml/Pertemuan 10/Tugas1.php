<?php
// Fungsi untuk mengecek apakah suatu bilangan prima
function isPrima($angka) {
    if ($angka < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($angka); $i++) {
        if ($angka % $i == 0) {
            return false;
        }
    }
    return true;
}
//Menampilkan Judul
echo "Pengulangan untuk mencari kategori bilangan : <br><br>";

// Pengulangan untuk mengecek setiap bilangan dari 1 hingga 20
for ($angka = 1; $angka <= 20; $angka++) {
    if ($angka % 2 == 0) {
        echo " - Angka $angka adalah bilangan genap ";
    } else {
        echo " - Angka $angka adalah bilangan ganjil ";
    }

    if (isPrima($angka)) {
        echo "sekaligus bilangan prima<br>";
    } else {
        echo "<br>";
    }
}
?>