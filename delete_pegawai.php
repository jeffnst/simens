<?php
include "db/pdo.php";

$id = $_GET['id'];
$nip_peg = $_GET['nip_peg'];

  
$delete_pegawai = deletePegawai($id);



if(isset($delete_pegawai)){
    //header("Location: $base_url/edit_jabatan_pegawai.php?nip_peg=$nip_peg&id=$id&edit=true");
     header("Location: $base_url");
}

?>