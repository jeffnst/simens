<?php
include "db/pdo.php";

$id = $_POST['id'];
$nip_peg = $_POST['nip_peg'];
$nama_lengkap = $_POST['nama_lengkap'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];


//echo $id;
//echo $nip_peg;
//echo $nama_lengkap_keluarga;
//echo $tmpt_lahir_keluarga;
//echo $tgl_lahir_keluarga;
//echo $jenis_kelamin_keluarga;
//echo $status_keluarga;
//echo $pekerjaan_keluarga;
//echo $keterangan_keluarga;

if($id != ""){
    $edit_keluarga_pegawai = editKeluargaPegawai($id,$nip_peg,$status,$nama_lengkap,$tgl_lahir,$tmpt_lahir,$jenis_kelamin,$keterangan);
}

if(isset($edit_keluarga_pegawai)){
    //header("Location: $base_url/edit_keluarga_pegawai.php?nip_peg=$nip_peg&id=$id&edit=true");
     header("Location: $base_url/pegawai.php?search=$nip_peg");
}




?>