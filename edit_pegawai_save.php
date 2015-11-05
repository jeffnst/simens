<?php

include "db/pdo.php";

$id = $_POST['id'];
$nama_lengkap = $_POST['nama_lengkap'];
$nip_peg = $_POST['nip_peg'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status_peg = $_POST['status_peg'];
$agama = $_POST['agama'];
$stts_nikah = $_POST['stts_nikah'];
$tgl_nikah = $_POST['tgl_nikah'];
$alamat = $_POST['alamat'];
$foto_path = $_POST['foto_path'];

$target_dir = "upload/$nip_peg/";
$file_name = $_FILES["fileToUpload"]["name"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//echo $file_name;

if($file_name==""){
    //echo $id;
    //echo $nama_lengkap;
    //echo $nip_peg;
    //echo $tmpt_lahir;
    //echo $tgl_lahir;
    //echo $jenis_kelamin;
    //echo $status_peg;
    //echo $agama ;
    //echo $stts_nikah;
    //echo $tgl_nikah;
    //echo $alamat;
    //echo $foto_path;
    $edit_pegawai = editPegawai($id,$nip_peg,$nama_lengkap,$tmpt_lahir,$tgl_lahir,$jenis_kelamin,$status_peg,$agama,$stts_nikah,$tgl_nikah,$alamat,$foto_path);
} else {
    //echo $id;
    //echo $nama_lengkap;
    //echo $nip_peg;
    //echo $tmpt_lahir;
    //echo $tgl_lahir;
    //echo $jenis_kelamin;
    //echo $status_peg;
    //echo $agama ;
    //echo $stts_nikah;
    //echo $tgl_nikah;
    //echo $alamat;
    //echo $target_file;
    
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    
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
    if($imageFileType != "JPG"&&$imageFileType != "PNG"&&$imageFileType != "JPEG"&&$imageFileType != "GIF") {
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
    
    $delete_previous_file = unlink($foto_path);
    
    if($delete_previous_file==1){
        $edit_pegawai = editPegawai($id,$nip_peg,$$nama_lengkapc,$tmpt_lahir,$tgl_lahir,$jenis_kelamin,$status_peg,$agama,$stts_nikah,$tgl_nikah,$alamat,$target_file);
    }
}   

if(isset($edit_pegawai)){
    //header("Location: $base_url/edit_pegawai.php?nip_peg=$nip_peg&edit=$nama_lengkap");
     header("Location: $base_url/pegawai.php?nip_peg=$nip_peg");
}

