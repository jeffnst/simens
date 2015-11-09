<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<script>
    $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"
    });
  });
  </script>
<h3>Edit Biodata Pegawai</h3>

<?php
if(isset($_GET['nip_peg'])){
    $nip_peg = $_GET['nip_peg'];
}

$pegawais = getDataPegawaiById($nip_peg);
foreach($pegawais as $row){
?>
<div>
<?php
if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Pegawai dengan nama <?php echo $_GET['edit']; ?> Telah Berhasil!!</span></label>
<?php
}

?>   
    <form action="edit_pegawai_save.php" method="POST"  enctype="multipart/form-data"  enctype="multipart/form-data">
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Nama Lengkap</label></td>
        <td>:</td>
        <td><input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Nomor Identifikasi Pegawai</label></td>
        <td>:</td>
        <td><input type="text" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tempat Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tmpt_lahir" value="<?php echo $row['tmpt_lahir']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tanggal Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tgl_lahir" id="datepicker" value="<?php echo $row['tgl_lahir']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Jenis Kelamin</label></td>
        <td>:</td>
        <td><input type="radio" name="jenis_kelamin" value="laki-laki" <?php if($row['jenis_kelamin']=="laki-laki"){echo "checked";} ?>> Laki-laki <input type="radio" name="jenis_kelamin" value="perempuan" <?php if($row['jenis_kelamin']=="perempuan"){echo "checked";} ?>> Female</td>
    </tr>
    <tr>
        <td><label>Status Pegawai</label></td>
        <td>:</td>
        <td><input type="text" name="status_peg" value="<?php echo $row['status_peg']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Agama</label></td>
        <td>:</td>
        <td><input type="text" name="agama" value="<?php echo $row['agama']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Status Pernikahan</label></td>
        <td>:</td>
        <td><input type="text" name="stts_nikah" value="<?php echo $row['stts_nikah']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tanggal Pernikahan</label></td>
        <td>:</td>
        <td><input type="text" name="tgl_nikah" id="datepicker2" value="<?php echo $row['tgl_nikah']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Alamat Tempat Tinggal</label></td>
        <td>:</td>
        <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Nomor Karpeg</label></td>
        <td>:</td>
        <td><input type="text" name="no_karpeg" value="<?php echo $row['no_karpeg']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Nomor NPWP</label></td>
        <td>:</td>
        <td><input type="text" name="no_npwp" value="<?php echo $row['no_npwp']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Nomor Askes</label></td>
        <td>:</td>
        <td><input type="text" name="no_askes" value="<?php echo $row['no_askes']; ?>"/></td>
    </tr>
    <input type="hidden" name="foto_path" value="<?php echo $row['foto_path']; ?>"/>
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
}
	include "footer.php";
?>