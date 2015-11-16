<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">

<script type="text/javascript">
   
    $(function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: "yy-mm-dd"
        });
        
      });
      
</script>

<h3>Input Biodata Keluarga Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);

if(isset($_GET['input'])){
?>
    <label><span style="color: green;">Input Keluarga Pegawai dengan nama pegawai <?php echo $_GET['input']; ?> Telah Berhasil!!</span></label>
<?php
}

?>   
<div>
<div> <!--label>Jumlah Anak : </label><input type='text' name='total_anak' id='totalAnak' onkeydown="if (event.keyCode == 13) totalAnak()"/> <button id="click" onclick="totalAnak()">Input Anak</button></div-->
    
    <form action="input_keluarga_pegawai_save.php" method="POST">
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
        <td><label>Nama Lengkap keluarga</label></td>
        <td>:</td>
        <td><input type="text" name="nama_lengkap_keluarga"/></td>
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
        <td><label>Status Keluarga</label></td>
        <td>:</td>
        <td>
            <select name="status">
                <option value=""></option>
                <option value="Orang Tua">Orang Tua</option>
                <option value="Suami">Suami</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
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