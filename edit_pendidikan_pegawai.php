<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>Edit Pendidikan Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);
$nip_peg = $_GET['nip_peg'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Pelatihan Pegawai Telah Berhasil!!</span></label>
<?php
}
$jabatans = getDataPendidikan($nip_peg,$id);
//var_dump($diklat_fungsionals);
foreach($jabatans as $row):
?>  
<div>
    <form action="edit_pendidikan_pegawai_save.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <input type="hidden" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/>
    
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Tingkat Pendidikan </label></td>
        <td>:</td>
        <td><input type="text" name="tingkat_pendidikan" value="<?php echo $row['tingkat_pendidikan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Nama Pendidikan</label></td>
        <td>:</td>
        <td><input type="text" name="nama_pendidikan" value="<?php echo $row['nama_pendidikan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Kualifikasi</label></td>
        <td>:</td>
        <td><input type="text" name="kualifikasi" value="<?php echo $row['kualifikasi']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tahun Lulus</label></td>
        <td>:</td>
        <td><input type="text" name="tahun_lulus" value="<?php echo $row['tahun_lulus']; ?>"/></td>
    </tr>
    <input type="hidden" name="path_pendidikan" value="<?php echo $row['path_pendidikan']; ?>"/>
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