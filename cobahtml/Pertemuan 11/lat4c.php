<?php
$asean = [
  "Indonesia" => "Jakarta",
  "Singapura" => "Singapura",
  "Malaysia" => "Kuala Lumpur",
  "Brunei" => "Bandar Sri Begawan",
  "Thailand" => "Bangkok",
  "Laos" => "Vientiane",
  "Filipina" => "Manila",
  "Myanmar" => "Naypyidaw"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ASEAN</title>
</head>

<body>
  <h1>Daftar Negara ASEAN dan Ibukota :</h1>
  <?php foreach ($asean as $s => $j) : ?>
    <li><?= "$s : $j " ?></li>

  <?php endforeach;  ?>
</body>

</html>