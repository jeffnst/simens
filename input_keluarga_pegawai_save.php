<?php
include "db/pdo.php";

$nama_lengkap = $_POST['nama_lengkap'];
$nama_lengkap_keluarga = $_POST['nama_lengkap_keluarga'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];

//echo $nama_lengkap;
//echo $nama_lengkap_keluarga;
//echo $tmpt_lahir;
//echo $tgl_lahir;
//echo $jenis_kelamin;
//echo $status;
//echo $keterangan;


$nip_pegs = getIdPegawaiByName($nama_lengkap);
$nip_peg = $nip_pegs[0]['nip_peg'];
//echo $nip_peg;
if($nip_peg!=""){
    //echo $nip_peg;
    //echo $nama_lengkap; 

    if($nama_lengkap_keluarga != ""){
        //echo $nama_lengkap_keluarga;
        //echo $tmpt_lahir_keluarga;
        //echo $tgl_lahir_keluarga;
        //echo $jenis_kelamin_keluarga;
        //echo $status_keluarga;
        //echo $pekerjaan_keluarga;
        //echo $keterangan_keluarga;
        $input_keluarga_pagawai = inputKeluargaPegawai($nip_peg,$status,$nama_lengkap_keluarga,$tgl_lahir,$tmpt_lahir,$jenis_kelamin,$keterangan);    
    }
//    $jumlah_anak = $_POST['jumlah_anak'];
    //echo $jumlah_anak;
//    if($jumlah_anak!=""){
//        for ($i=1; $i<=$jumlah_anak; $i++) {
//           if ($_POST['nama_lengkap_anak_'.$i.'']==""){
//                echo "Nama anak ke $i belum diisi<br/>";
//            } else {
//                $nama_lengkap_anak = $_POST['nama_lengkap_anak_'.$i.''];
//                $jenis_kelamin_anak = $_POST['jenis_kelamin_anak_'.$i.''];
//                $tmpt_lahir_anak = $_POST['tmpt_lahir_anak_'.$i.''];
//                $tgl_lahir_anak = $_POST['tgl_lahir_anak_'.$i.''];
//                $status_anak = "anak ke $i";
//                $pekerjaan_anak = $_POST['pekerjaan_anak_'.$i.''];
//                $keterangan_anak = $_POST['keterangan_anak_'.$i.''];
//                echo $nama_lengkap_anak;
//                echo $jenis_kelamin_anak;
//                echo $tmpt_lahir_anak;
//                echo $tgl_lahir_anak;
//                echo $status_anak;
//                echo $pekerjaan_anak;
//                echo $keterangan_anak;
//            }
//        }
//    }
}

if(isset($input_keluarga_pagawai)){
    header("Location: $base_url/pegawai.php?search=$nama_lengkap");
}

?>