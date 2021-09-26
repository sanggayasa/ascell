<?php 
$koneksi = mysqli_connect("localhost","u5356758_sanggayasa","1T1nd0sch00l56","u5356758_logats");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
