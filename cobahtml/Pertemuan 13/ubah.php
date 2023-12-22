<?php
require 'function.php';

//ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id nya
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {




    //cek apakah data berhasil ditambahkan atau tidak
    //var_dump(mysqli_affected_rows($conn));
    //if (mysqli_affected_rows($conn) > 0 ) {
    //    echo "berhasil";
    //} else {
    //    echo "gagal";
    //    echo "<br>";
    //    echo mysqli_error($conn);
    //}

    //if ( tambah($_POST) > 0 ) {
    //    echo "data berhasil ditambahkan";
    //} else {
    //    echo "Data gagal Ditambahkan";
    //}

    //cek apakah data berhasill diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal diubah');
            document.location.href = 'index.php';
         </script>
        ";
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Ubah Data Mahasiswa</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar :</label><br>
                <img src="img/<?= $mhs['gambar']; ?>" width="80"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>



    </form>
</body>

</html>