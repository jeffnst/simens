<?php

include "db/pdo.php";

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
$no_karpeg = $_POST['no_karpeg'];
$no_npwp = $_POST['no_npwp'];
$no_askes = $_POST['no_askes'];

echo $nip_peg;


if (isset($nip_peg)){
    $create_folder = mkdir("upload/".$nip_peg.'/diklat', 0777, true);
    $create_folder = mkdir("upload/".$nip_peg.'/pendidikan', 0777, true);
    $create_folder = mkdir("upload/".$nip_peg.'/jabatan', 0777, true);
    $create_folder = mkdir("upload/".$nip_peg.'/kepangkatan', 0777, true);
    $create_folder = mkdir("upload/".$nip_peg.'/dokumen', 0777, true);
    $create_folder = mkdir("upload/".$nip_peg.'/keluarga', 0777, true);
    
    
}

$target_dir = "upload/$nip_peg/";
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

//echo $nama_lengkap;
//echo $nip_peg;
//echo $tmpt_lahir;
//echo $tgl_lahir;
//echo $jenis_kelamin;
//echo $status_peg;
//echo $agama;
//echo $stts_nikah;
//echo $tgl_nikah;
//echo $alamat;
//echo $target_file;

$input_pegawai = inputPegawai($nip_peg,$nama_lengkap,$tmpt_lahir,$tgl_lahir,$jenis_kelamin,$status_peg,$agama,$stts_nikah,$tgl_nikah,$alamat,$no_karpeg,$no_npwp,$no_askes,$target_file);


if(isset($input_pegawai)){
    header("Location: $base_url/pegawai.php?seach=$nama_lengkap");
}

?>