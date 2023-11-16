<?php
$mahasiswa = ["Ramdan","2230803123","Sistem Informasi","rmdncbn31@gmail.com"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li><?=$mhs;?></li>
            <?php endforeach;?>
</body> 
</html>