<?php
include "db/pdo.php";

$id = $_POST['id'];
$nip_peg = $_POST['nip_peg'];
$pangkat_gol = $_POST['pangkat_gol'];
$tmt = $_POST['tmt'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];
$path_kepangkatan = $_POST['path_kepangkatan'];
$folder = "kepangkatan";


$target_dir = "upload/$nip_peg/$folder/";
$file_name = $_FILES["fileToUpload"]["name"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


if($file_name==""){
    //echo $id;
    //echo $nip_peg;
    //echo $nama_diklat;
    //echo $tahun;
    //echo $tempat;
    //echo $keterangan;
    //echo $path_jabatan;
    
    $edit_kepangkatan = editKepangkatan($id,$nip_peg,$pangkat_gol,$tmt,$jenis,$keterangan,$path_kepangkatan);

} else {
//    echo $id;
//    echo $nip_peg;
//    echo $nama_diklat;
//    echo $tahun;
//    echo $tempat;
//    echo $keterangan;
//    echo $target_file;
//    echo "b";
      
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
    
    if($path_kepangkatan != ""){
        $delete_previous_file = unlink($path_kepangkatan);
    }
    //echo $target_file;

      $edit_kepangkatan = editKepangkatan($id,$nip_peg,$pangkat_gol,$tmt,$jenis,$keterangan,$target_file);

}

if(isset($edit_kepangkatan)){
    //header("Location: $base_url/edit_kepangkatan_pegawai.php?nip_peg=$nip_peg&id=$id&edit=true");
     header("Location: $base_url/pegawai.php?nip_peg=$nip_peg");
}
?>