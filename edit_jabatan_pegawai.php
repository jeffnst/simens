<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>Edit Jabatan Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);
$nip_peg = $_GET['nip_peg'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Jabatan Pegawai Telah Berhasil!!</span></label>
<?php
}
$jabatans = getDataJabatan($nip_peg,$id);
//var_dump($diklat_fungsionals);
foreach($jabatans as $row):
?>  
<div>
    <form action="edit_jabatan_pegawai_save.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <input type="hidden" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/>
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Jabatan</label></td>
        <td>:</td>
        <td><input type="text" name="jabatan" value="<?php echo $row['jabatan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>TMT</label></td>
        <td>:</td>
        <td><input type="text" name="tmt" value="<?php echo $row['tmt']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Golongan</label></td>
        <td>:</td>
        <td><input type="text" name="golongan" value="<?php echo $row['golongan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Eselon</label></td>
        <td>:</td>
        <td><input type="text" name="eselon" value="<?php echo $row['eselon']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Keterangan</label></td>
        <td>:</td>
        <td><input type="text" name="keterangan" value="<?php echo $row['keterangan']; ?>"/></td>
    </tr>
    <input type="hidden" name="path_jabatan" value="<?php echo $row['path_jabatan']; ?>"/>
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