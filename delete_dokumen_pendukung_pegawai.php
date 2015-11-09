<?php
include "db/pdo.php";

$id = $_GET['id'];
$nip_peg = $_GET['nip_peg'];

  
$delete_dokumen = deleteDokumen($id);



if(isset($delete_dokumen)){
    //header("Location: $base_url/edit_jabatan_pegawai.php?nip_peg=$nip_peg&id=$id&edit=true");
     header("Location: $base_url/pegawai.php?search=$nip_peg");
}

?>