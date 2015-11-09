<?php
include "db/pdo.php";

$nama_lengkap = $_POST['nama_lengkap'];
$jenjang_pendidikan = $_POST['jenjang_pendidikan'];
$nama_sekolah = $_POST['nama_sekolah'];
$no_ijazah = $_POST['no_ijazah'];
$tahun_lulus = $_POST['tahun_lulus'];
$folder = "pendidikan";

//echo $nama_lengkap;
//echo $tingkat_pendidikan;
//echo $nama_pendidikan;
//echo $kualifikasi;
//echo $tahun_lulus;

$nip_pegs = getIdPegawaiByName($nama_lengkap);
$nip_peg = $nip_pegs[0]['nip_peg'];

$target_dir = "upload/$nip_peg/$folder/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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


$input_pendidikan = inputPendidikan($nip_peg,$jenjang_pendidikan,$nama_sekolah,$no_ijazah,$tahun_lulus,$target_file);

if(isset($input_pendidikan)){
    header("Location: $base_url/pegawai.php?search=$nama_lengkap");
}

?>