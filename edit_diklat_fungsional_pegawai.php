<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>Edit Diklat Fungsional Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);
$nip_peg = $_GET['nip_peg'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Diklat Fungsional "<?php echo $_GET['edit']; ?>" Pegawai Telah Berhasil!!</span></label>
<?php
}
$diklat_fungsionals = getDataDiklatFungsional($nip_peg,$id);
//var_dump($diklat_fungsionals);
foreach($diklat_fungsionals as $row):
?> 

    <form action="edit_diklat_fungsional_pegawai_save.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <input type="hidden" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/>
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Nama Diklat </label></td>
        <td>:</td>
        <td><input type="text" name="nama_diklat" value="<?php echo $row['nama_diklat']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tahun</label></td>
        <td>:</td>
        <td><input type="text" name="tahun" value="<?php echo $row['tahun']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tempat</label></td>
        <td>:</td>
        <td><input type="text" name="tempat" value="<?php echo $row['tempat']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Keterangan</label></td>
        <td>:</td>
        <td><input type="text" name="keterangan" value="<?php echo $row['keterangan']; ?>"/></td>
    </tr>
    <input type="hidden" name="path_diklat_fungsional" value="<?php echo $row['path_diklat_fungsional']; ?>"/>
    <tr>
        <td><label>Ganti Foto??</label><br /><label>Select image to upload:</label></td>
        <td>:</td>
        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
    </tr>
        <tr>
        <td colspan="3"><input type="submit" value="Input" name="submit" /></td>
    </tr>
    </table>
    </div>
    </form>    
</div>
</div>
<?php 
endforeach;
	include "footer.php";
?>