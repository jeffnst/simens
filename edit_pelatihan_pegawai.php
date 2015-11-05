<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>Edit Pelatihan Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);
$nip_peg = $_GET['nip_peg'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Pelatihan PegawaiTelah Berhasil!!</span></label>
<?php
}
$pelatihans = getDataPelatihan($nip_peg,$id);
//var_dump($diklat_fungsionals);
foreach($pelatihans as $row):
?>  
<div>
    <form action="edit_pelatihan_pegawai_save.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <input type="hidden" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/>
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Nama Pelatihan</label></td>
        <td>:</td>
        <td><input type="text" name="nama_pelatihan" value="<?php echo $row['nama_pelatihan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Lama Pelatihan</label></td>
        <td>:</td>
        <td><input type="text" name="lama_pelatihan" value="<?php echo $row['lama_pelatihan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Ijazah pelatihan</label></td>
        <td>:</td>
        <td><input type="text" name="ijazah_pelatihan" value="<?php echo $row['ijazah_pelatihan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tempat pelatihan</label></td>
        <td>:</td>
        <td><input type="text" name="tempat_pelatihan" value="<?php echo $row['tempat_pelatihan']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Keterangan</label></td>
        <td>:</td>
        <td><input type="text" name="keterangan_pelatihan" value="<?php echo $row['keterangan_pelatihan']; ?>"/></td>
    </tr>
    <input type="hidden" name="path_pelatihan" value="<?php echo $row['path_pelatihan']; ?>"/>
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