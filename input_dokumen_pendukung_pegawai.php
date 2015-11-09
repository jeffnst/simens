<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>Input Dokumen Pendukung Pegawai</h3>

<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);

if(isset($_GET['input'])){
?>
    <label><span style="color: green;">Input Jabatan Pegawai dengan nama pegawai <?php echo $_GET['input']; ?> Telah Berhasil!!</span></label>
<?php
}

?> 
<div>
    <form action="input_dokumen_pendukung_pegawai_save.php" method="POST"  enctype="multipart/form-data">
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
        <td><label>Jenis Dokumen</label></td>
        <td>:</td>
        <td>
            <select name="jenis_dokumen">
                <option value=""></option>
                <option value="Konversi NIP">Konversi NIP</option>
                <option value="Karpeg Biasa">Karpeg Biasa</option>
                <option value="Karpeg Elektronik">Karpeg Elektronik</option>
                <option value="SK Berkala">SK Berkala</option>
                <option value="SK Tugas Belajar">SK Tugas Belajar</option>
                <option value="SK Ijin Belajar">SK Ijin Belajar</option>
                <option value="Berita Acara Sumpah Janji PNS">Berita Acara Sumpah Janji PNS</option>
                <option value="KTP">KTP</option>
                <option value="NPWP">NPWP</option>
                <option value="Akte Kelahiran">Akte Kelahiran</option>
                <option value="Askes">Askes</option>
                <option value="Kartu Keluarga">Kartu Keluarga</option>
                <option value="SKP">SKP</option>
            </select>
        </td>
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