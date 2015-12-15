<?php
include "db/pdo.php";

$nama_lengkap = $_POST['nama_lengkap'];
$nama_lengkap_keluarga = $_POST['nama_lengkap_keluarga'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status = $_POST['status'];
$folder = "keluarga";

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
    
    $target_dir = "upload/$nip_peg/$folder/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    
    if($target_file == $target_dir){
        $target_file = "";               
    }
    
            
    if($nama_lengkap_keluarga != ""){
        //echo $nama_lengkap_keluarga;
        //echo $tmpt_lahir_keluarga;
        //echo $tgl_lahir_keluarga;
        //echo $jenis_kelamin_keluarga;
        //echo $status_keluarga;
        //echo $pekerjaan_keluarga;
        //echo $keterangan_keluarga;
        $input_keluarga_pagawai = inputKeluargaPegawai($nip_peg,$status,$nama_lengkap_keluarga,$tgl_lahir,$tmpt_lahir,$jenis_kelamin,$target_file);
        
        if($imageFileType != ""){
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "JPG"&&$imageFileType != "jpg"&&$imageFileType != "PNG"&&$imageFileType != "png"&&$imageFileType != "JPEG"&&$imageFileType != "jpeg"&&$imageFileType != "GIF"&&$imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }    
        }
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