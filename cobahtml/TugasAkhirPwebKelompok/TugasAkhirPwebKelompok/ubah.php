<?php 
require 'koneksi.php';

//ambil data di URL
$id = $_GET["id"];


//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM data_pengaduan WHERE id = $id")[0];


//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){

    //cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'admin.php';
        </script>
    ";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Input Data</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">WELCOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
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

      <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
      <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
      <p><table style="margin-left:280px; font-family: 'Times New Roman'">
            
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>" style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>" style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                <td>JABATAN</td>
                <td>:</td>
                <td><input type="text" name="jabatan" id="jabatan" required value="<?= $mhs["jabatan"]; ?>" style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                <td>KRITIK</td>
                <td>:</td>
                <td><input type="text" name="kritik" id="kritik" required value="<?= $mhs["kritik"]; ?>" style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                <td>SARAN</td>
                <td>:</td>
                <td><input type="text" name="saran" id="saran" required value="<?= $mhs["saran"]; ?>" style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                <td>GAMBAR</td>
                <td>:</td>
                <td><img src="img/<?= $mhs['gambar']; ?>" width="80"><br><input type="file" name="gambar" id="gambar" ></td>
            </tr>
            
        </table></p>
        <button type="submit" name="submit" style="margin-left:800px" class="btn btn-primary">UBAH</button>
        </form>
              
        
        <hr style="width: 90%; background-color: rgb(9, 9, 10); height: 4px;">
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>By Hamba Allah</p>
</div>

</body>
</html>