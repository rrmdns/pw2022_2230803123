<?php 
$koneksi = mysqli_connect("localhost","root","", "multi_user");
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $kritik = htmlspecialchars($data["kritik"]);
	$saran = htmlspecialchars($data["saran"]);

    //upload gambar
    $gambar= upload();
    if(!$gambar){
        return false;
    }

    //query insert data
    $query = "INSERT INTO data_pengaduan VALUES
              ('','$nama','$nim','$jabatan','$kritik','$saran','$gambar')";
    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM data_pengaduan WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}


function ubah($data){
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $kritik = htmlspecialchars($data["kritik"]);
	$saran = htmlspecialchars($data["saran"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] == 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    //query insert data
    $query = "UPDATE data_pengaduan SET
              nama = '$nama',
              nim = '$nim',
              jabatan = '$jabatan',
              kritik = '$kritik',
			  saran = '$saran',
              gambar = '$gambar'
              
              WHERE id= $id
              ";
    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function cari($keyword){
    $query="SELECT * FROM data_pengaduan WHERE 
    nim LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    jabatan LIKE '%$keyword%' OR
    kritik LIKE '%$keyword%' OR
	saran LIKE '%$keyword%'
    "; 
    return query($query);
}

function upload(){

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if($error == 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
              </script>
        ";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                alert('File yang anda upload bukan gambar!');
              </script>
        ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if($ukuranFile > 1000000){

        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>
        ";
        return false;

    }

    //lolos pengecekkan, gambar siap diupload
    //generate nama gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;



    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

    return $namaFileBaru;
   
}


?>