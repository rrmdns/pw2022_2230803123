<?php
$nama_hari = date("1");
switch ($nama_hari){
    case "Monday" :
    case "Tuesday" :
    case "Wednesday" :echo "Hari Kerja";
        break;
    case "Saturday" :
    case "Sunday" : echo "Hari Libur";
        break;
}

?>