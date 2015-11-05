<?php
$nip = $_POST['nip'];
$diklat_fungsional = $_POST['diklat_fungsional'];
$diklat_struktural = $_POST['diklat_struktural'];
$pelatihan = $_POST['pelatihan'];
$pendidikan = $_POST['pendidikan'];
$jabatan = $_POST['jabatan'];
$kepangkatan = $_POST['kepangkatan'];


$create_folder = mkdir("upload/".$nip.'/'.$diklat_struktural, 0777, true);
$create_folder = mkdir("upload/".$nip.'/'.$diklat_fungsional, 0777, true);
$create_folder = mkdir("upload/".$nip.'/'.$pelatihan, 0777, true);
$create_folder = mkdir("upload/".$nip.'/'.$pendidikan, 0777, true);
$create_folder = mkdir("upload/".$nip.'/'.$jabatan, 0777, true);
$create_folder = mkdir("upload/".$nip.'/'.$kepangkatan, 0777, true);
if(isset($create_folder)){
    echo "folder telah dibuat";
}

?>