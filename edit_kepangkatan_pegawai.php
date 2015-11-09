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
<h3>Edit Kepangkatan Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);
$nip_peg = $_GET['nip_peg'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Kepangkatan Pegawai Telah Berhasil!!</span></label>
<?php
}
$jabatans = getDataKepangkatan($nip_peg,$id);
//var_dump($diklat_fungsionals);
foreach($jabatans as $row):
?>  
<div>
    <form action="edit_kepangkatan_pegawai_save.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <input type="hidden" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/>
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Jenis Pangkat</label></td>
        <td>:</td>
        <td><input type="text" name="jenis_pangkat" value="<?php echo $row['jenis_pangkat']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Gol.Ruang</label></td>
        <td>:</td>
        <td><input type="text" name="gol_ruang" value="<?php echo $row['gol_ruang']; ?>"/></td>
    </tr>
    <tr>
        <td><label>TMT</label></td>
        <td>:</td>
        <td><input type="text" name="tmt" value="<?php echo $row['tmt']; ?>"/></td>
    </tr>
    <tr>
        <td><label>No. SK</label></td>
        <td>:</td>
        <td><input type="text" name="no_sk" value="<?php echo $row['no_sk']; ?>"/></td>
    </tr>
    <tr>
        <td><label>Tanggal SK</label></td>
        <td>:</td>
        <td><input type="text" name="tgl_sk" id="datepicker" value="<?php echo $row['tgl_sk']; ?>"/></td>
    </tr>
    <input type="hidden" name="path_kepangkatan" value="<?php echo $row['path_kepangkatan']; ?>"/>
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