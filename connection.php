<?php 

$con = mysqli_connect("localhost","root","","cms-php");
$con->set_charset("utf8");
if($con) {
   // echo "Kết nối thành công";
}
else {
    echo "Kết nối thất bại";
}
?>