<?php
include "db/pdo.php";

$id = $_POST['id'];
$nip_peg = $_POST['nip_peg'];
$jenis_diklat = $_POST['jenis_diklat'];
$nama_diklat = $_POST['nama_diklat'];
$tempat = $_POST['tempat'];
$tahun = $_POST['tahun'];
$keterangan = $_POST['keterangan'];
$path_diklat = $_POST['path_diklat'];
$folder = "diklat";


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
    //echo $path_diklat_fungsional;
    
    $edit_diklat = editDiklat($id,$nip_peg,$jenis_diklat,$nama_diklat,$tempat,$tahun,$path_diklat);

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
    
    if($path_diklat != ""){
        $delete_previous_file = unlink($path_diklat);
    }
    

    $edit_diklat = editDiklat($id,$nip_peg,$jenis_diklat,$nama_diklat,$tempat,$tahun,$target_file);

}

if(isset($edit_diklat)){
    //header("Location: $base_url/edit_diklat_struktural_pegawai.php?nip_peg=$nip_peg&id=$id&edit=$nama_diklat");
     header("Location: $base_url/pegawai.php?search=$nip_peg");
}
?>