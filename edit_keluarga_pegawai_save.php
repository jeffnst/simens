<?php
include "db/pdo.php";

$id = $_POST['id'];
$nip_peg = $_POST['nip_peg'];
$nama_lengkap_keluarga = $_POST['nama_lengkap_keluarga'];
$tmpt_lahir_keluarga = $_POST['tmpt_lahir_keluarga'];
$tgl_lahir_keluarga = $_POST['tgl_lahir_keluarga'];
$jenis_kelamin_keluarga = $_POST['jenis_kelamin_keluarga'];
$status_keluarga = $_POST['status_keluarga'];
$pekerjaan_keluarga = $_POST['pekerjaan_keluarga'];
$keterangan_keluarga = $_POST['keterangan_keluarga'];


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
    $edit_keluarga_pegawai = editKeluargaPegawai($id,$nip_peg,$nama_lengkap_keluarga,$tmpt_lahir_keluarga,$tgl_lahir_keluarga,$jenis_kelamin_keluarga,$status_keluarga,$pekerjaan_keluarga,$keterangan_keluarga);
}

if(isset($edit_keluarga_pegawai)){
    //header("Location: $base_url/edit_keluarga_pegawai.php?nip_peg=$nip_peg&id=$id&edit=true");
     header("Location: $base_url/pegawai.php?nip_peg=$nip_peg");
}




?>