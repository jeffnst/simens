<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
  <script>
    $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"
    });
  });
  </script>
<div class="col-md-9">
<h3>Input Kepangkatan Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);

if(isset($_GET['input'])){
?>
    <label><span style="color: green;">Input Kepangkatan Pegawai dengan nama pegawai <?php echo $_GET['input']; ?> Telah Berhasil!!</span></label>
<?php
}

?> 
<div>
    <form action="input_kepangkatan_pegawai_save.php" method="POST"  enctype="multipart/form-data">
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
        <td><label>Jenis Pangkat</label></td>
        <td>:</td>
        <td><input type="text" name="jenis_pangkat"/></td>
    </tr>
    <tr>
        <td><label>Gol.Ruang</label></td>
        <td>:</td>
        <td><input type="text" name="gol_ruang"/></td>
    </tr>
    <tr>
        <td><label>TMT</label></td>
        <td>:</td>
        <td><input type="text" name="tmt"/></td>
    </tr>
    <tr>
        <td><label>No. SK</label></td>
        <td>:</td>
        <td><input type="text" name="no_sk"/></td>
    </tr>
    <tr>
        <td><label>Tanggal SK</label></td>
        <td>:</td>
        <td><input type="text" name="tgl_sk" id="datepicker"/></td>
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