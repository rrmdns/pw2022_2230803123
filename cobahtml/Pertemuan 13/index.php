<?php
require 'function.php';
//ORDER BY id ASC dari kecil ke besar
//DESC DARI BESAR KEKECIL
//where nrp = '2230803135'
$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa </a>
    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Data Pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>


    </form>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Mau DiHapus?');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="50" </td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>



    </table>
</body>

</html>