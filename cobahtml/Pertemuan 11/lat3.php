<?php
$mahasiswa = [
  ["Joni", "123456", "Sistem Informasi", "joni@gmail.com"],
  ["Budi", "65413", "Teknik Informatika", "budi@gmail.com"],
  ["Angga", "789654", "Ilmu Komputer", "angga@gmail.com"],
  ["896546", "Rio", "Teknik Jaringan", "rio@gmail.com"]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>
  <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
      <li>Nama :<?= $mhs[0]; ?></li>
      <li>Nim :<?= $mhs[1]; ?></li>
      <li>Jurusan :<?= $mhs[2]; ?></li>
      <li>Email :<?= $mhs[3]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>