<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>Input Diklat Fungsional Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);

if(isset($_GET['input'])){
?>
    <label><span style="color: green;">Input Nama Diklat "<?php echo $_GET['input']; ?>" Pegawai dengan nama pegawai <?php echo $_GET['nama']; ?> Telah Berhasil!!</span></label>
<?php
}

?> 

    <form action="input_diklat_fungsional_pegawai_save.php" method="POST"  enctype="multipart/form-data">
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
    <tr>
        <td><label>Nama Lengkap Pegawai</label></td>
        <td>:</td>
        <td>
            <input type="text" name="nama_lengkap" id="srch" list="datalist1">
            <datalist id="datalist1">
            <?php
            foreach($pegawais as $row):
            ?>
              <option value="<?php echo $row['nama_lengkap']; ?>">
            <?php
            endforeach;
            ?>
            </datalist>
        </td>
    </tr>
    <tr>
        <td><label>Nama Diklat </label></td>
        <td>:</td>
        <td><input type="text" name="nama_diklat"/></td>
    </tr>
    <tr>
        <td><label>Tahun</label></td>
        <td>:</td>
        <td><input type="text" name="tahun"/></td>
    </tr>
    <tr>
        <td><label>Tempat</label></td>
        <td>:</td>
        <td><input type="text" name="tempat"/></td>
    </tr>
    <tr>
        <td><label>Keterangan</label></td>
        <td>:</td>
        <td><input type="text" name="keterangan"/></td>
    </tr>
    <tr>
        <td><label>Select image to upload:</label></td>
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
	include "footer.php";
?>