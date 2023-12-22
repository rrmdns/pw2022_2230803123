<?php

include 'koneksi.php';

session_start();

if(!isset($_SESSION['user'])){
   header('location:login.php');
}
if(isset($_POST["submit"])){




    //cek apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'form.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'form.php';
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
    <a class="navbar-brand" href="javascript:void(0)">WELCOME <?php echo $_SESSION['user'] ?></a>
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

      <form action="" method="post" enctype="multipart/form-data">
      <p><table style="margin-left:280px; font-family: 'Times New Roman'">
            
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required style="background-color:whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" required style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                
                <td>JABATAN</td>
                <td>:</td>
                <td><input type="text" name="jabatan" id="jabatan" required style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></td>
            </tr>
            <tr>
                <td>KRITIK</td>
                <td>:</td>
                <td><textarea rows="5" type="text" name="kritik" id="kritik" required style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>SARAN</td>
                <td>:</td>
                <td><textarea rows="5" name="saran" id="saran" required style="background-color: whitesmoke; border-color: black; width:400px;" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>GAMBAR</td>
                <td>:</td>
                <td><input type="file" name="gambar" id="gambar" ></td>
            </tr>
            
        </table></p>
        <button type="submit" name="submit" style="margin-left:800px" class="btn btn-primary">SIMPAN</button>
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