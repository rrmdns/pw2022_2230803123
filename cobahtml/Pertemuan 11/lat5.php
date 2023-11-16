<?php
$mahasiswa =
  [
    [
      "nama" => "Rahel",
      "nim" => "234515",
      "jurusan" => "Teknik Informatika",
      "email" => "rahel@gmail.com",
      "gambar" => "gambar4.jpg"
    ],
    [
      "nama" => "Purnama",
      "nim" => "987654",
      "jurusan" => "Sistem Komputer",
      "email" => "purnama@gmail.com",
      "gambar" => "gambar3.jpg"
    ],
    [
      "nama" => "Dewi Apriani",
      "nim" => "023249",
      "jurusan" => "Teknik Komputer",
      "email" => "dewi@gmail.com",
      "gambar" => "gambar5.jpg"
    ]
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
      <li>
        <img src="img/<?= $mhs["gambar"];?>">

      </li>
      <li>Nama :<?= $mhs["nama"]; ?></li>
      <li>Nim :<?= $mhs["nim"]; ?></li>
      <li>Jurusan :<?= $mhs["jurusan"]; ?></li>
      <li>Email :<?= $mhs["email"]; ?></li>

    </ul>
  <?php endforeach; ?>
</body>

</html>