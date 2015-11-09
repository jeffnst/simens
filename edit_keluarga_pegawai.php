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

<h3>Edit Biodata Keluarga Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);
$nip_peg = $_GET['nip_peg'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Keluarga Pegawai Telah Berhasil!!</span></label>
<?php
}
$keluargas = getDataKeluargaPegawai($nip_peg,$id);
//var_dump($diklat_fungsionals);
foreach($keluargas as $row):
?>  
<div>
    
    <form action="edit_keluarga_pegawai_save.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <input type="hidden" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/>
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Nama Lengkap keluarga</label></td>
        <td>:</td>
        <td><input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>"/></td>
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
        <td><input type="radio" name="jenis_kelamin" value="laki-laki" <?php if($row['jenis_kelamin']=="laki-laki"){echo "checked";} ?>> Laki-laki <input type="radio" name="jenis_kelamin" value="perempuan" <?php if($row['jenis_kelamin']=="perempuan"){echo "checked";} ?>> Perempuan</td>
    </tr>
    <tr>
        <td><label>Status Keluarga</label></td>
        <td>:</td>
        <td>
            <select name="status">
                <option value=""></option>
                <option value="Orang Tua" <?php if($row['status']=="Orang Tua"){echo "selected";} ?>>Orang Tua</option>
                <option value="Suami" <?php if($row['status']=="Suami"){echo "selected";} ?>>Suami</option>
                <option value="Istri" <?php if($row['status']=="Istri"){echo "selected";} ?>>Istri</option>
                <option value="Anak" <?php if($row['status']=="Anak"){echo "selected";} ?>>Anak</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><label>Keterangan</label></td>
        <td>:</td>
        <td><input type="text" name="keterangan" value="<?php echo $row['keterangan']; ?>"/></td>
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