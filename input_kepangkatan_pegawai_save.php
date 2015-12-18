<?php
include "db/pdo.php";

$nama_lengkap = $_POST['nama_lengkap'];
$jenis_pangkat = $_POST['jenis_pangkat'];
$gol_ruang = $_POST['gol_ruang'];
$tmt = $_POST['tmt'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$folder = "kepangkatan";

//echo $nama_lengkap;
//echo $pangkat_gol;
//echo $tmt;
//echo $jenis;
//echo $keterangan;

$nip_pegs = getIdPegawaiByName($nama_lengkap);
$nip_peg = $nip_pegs[0]['nip_peg'];

$target_dir = "upload/$nip_peg/$folder/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


if($target_file == $target_dir){
    $target_file = "";               
}
// Check if image file is a actual image or fake image

if($imageFileType != ""){
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//       // echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
//    if ($_FILES["fileToUpload"]["size"] > 500000) {
//        echo "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }
    // Allow certain file formats
    if($imageFileType != "JPG"&&$imageFileType != "jpg"&&$imageFileType != "PNG"&&$imageFileType != "png"&&$imageFileType != "JPEG"&&$imageFileType != "jpeg"&&$imageFileType != "GIF"&&$imageFileType != "gif"&&$imageFileType != "PDF"&&$imageFileType != "pdf") {
        echo "Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.";
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

if($uploadOk != 0) {
    $input_kepangkatan = inputKepangkatan($nip_peg,$jenis_pangkat,$gol_ruang,$tmt,$no_sk,$tgl_sk,$target_file);
}    

if(isset($input_kepangkatan)){
    header("Location: $base_url/pegawai.php?search=$nama_lengkap");
}



?>