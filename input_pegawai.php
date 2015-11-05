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
<h3>Input Biodata Pegawai</h3>
<div> 
<?php
if(isset($_GET['input'])){
?>
    <label><span style="color: green;">Input Pegawai dengan nama <?php echo $_GET['input']; ?> Telah Berhasil!!</span></label>
<?php
}

?>   
    <form action="input_pegawai_save.php" method="POST"  enctype="multipart/form-data">
	<div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Nama Lengkap</label></td>
        <td>:</td>
        <td><input type="text" name="nama_lengkap"/></td>
    </tr>
    <tr>
        <td><label>Nomor Identifikasi Pegawai</label></td>
        <td>:</td>
        <td><input type="text" name="nip_peg"/></td>
    </tr>
    <tr>
        <td><label>Tempat Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tmpt_lahir"/></td>
    </tr>
    <tr>
        <td><label>Tanggal Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tgl_lahir" id="datepicker"/></td>
    </tr>
    <tr>
        <td><label>Jenis Kelamin</label></td>
        <td>:</td>
        <td><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</td>
    </tr>
    <tr>
        <td><label>Status Pegawai</label></td>
        <td>:</td>
        <td><input type="text" name="status_peg"/></td>
    </tr>
    <tr>
        <td><label>Agama</label></td>
        <td>:</td>
        <td><input type="text" name="agama"/></td>
    </tr>
    <tr>
        <td><label>Status Pernikahan</label></td>
        <td>:</td>
        <td><input type="text" name="stts_nikah"/></td>
    </tr>
    <tr>
        <td><label>Tanggal Pernikahan</label></td>
        <td>:</td>
        <td><input type="text" name="tgl_nikah" id="datepicker2"/></td>
    </tr>
    <tr>
        <td><label>Alamat Tempat Tinggal</label></td>
        <td>:</td>
        <td><input type="text" name="alamat"/></td>
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