<?php

include 'koneksi.php';
$pengaduan = query("SELECT * FROM data_pengaduan");

//tombol cari ditekan
if(isset($_POST["cari"])){
    $pengaduan = cari($_POST["keyword"]);
}
session_start();

if(!isset($_SESSION['admin'])){
   header('location:login.php');
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Halaman pengaduan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">WELCOME <?php echo $_SESSION['admin'] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="mynavbar">
      <form action="" method="post" class="d-flex">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Search">
        <button class="btn btn-primary" type="submit" name="cari">Search</button>
      </form>
    </div>
    <a href="login.php" style="margin-left:60px" class="btn btn-primary">LOGOUT</a>
  </div>
</nav>

<div class="container" style="margin-top:35px">
  <div class="jumbotron" style="background-color:lightgrey;">
    <div class="col-sm-13">
      <h2 style="font-family: 'Times New Roman'"><center>PENGADUAN SARANA DAN PRASARANA</center></h2>
      <h1 style="font-family: 'Times New Roman'"><center>Fakultas Sains Dan Teknologi</center></h1>
      <hr style="width: 90%; background-color: rgb(9, 9, 10); height: 4px;"> 
    </br>

      <p><table class="table-dark" style="margin-left:30px; margin-right:10px; font-family: 'Times New Roman'" border="2" cellpadding="6" cellspacing="0">
         
            <tr >
                <th>NO.</th>
                <th>GAMBAR</th>
                <th>NAMA</th>
                <th>NIM</th>
                <th>JABATAN</th>
                <th>KRITIK</th>
				        <th>SARAN</th>
                <th>AKSI</th>
            </tr>
        

    <?php $i = 1; ?>
    <?php foreach($pengaduan as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="100"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["jabatan"]; ?></td>
            <td><?= $row["kritik"]; ?></td>
			      <td><?= $row["saran"]; ?></td>
            <td>
                <a type="button" class="btn btn-primary btn-sm btn-block" href="ubah.php?id=<?= $row["id"]; ?>">UBAH</a>
                <a type="button" class="btn btn-danger btn-sm btn-block" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data tersebut?');">HAPUS</a>
            </td>
        </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </table></p>
        <hr style="width: 90%; background-color: rgb(9, 9, 10); height: 4px;">
      
    </div>
    
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>By Hamba Allah</p>
</div>

</body>
</html>


