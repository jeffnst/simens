<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">

<h3>Edit Dokumen Pendukung Pegawai</h3>
<?php
$pegawais = getNamaPegawai();
//var_dump($pegawais);
$nip_peg = $_GET['nip_peg'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
?>
    <label><span style="color: green;">Edit Jabatan Pegawai Telah Berhasil!!</span></label>
<?php
}
$dokumens = getDataDokumen($nip_peg,$id);
//var_dump($diklat_fungsionals);
foreach($dokumens as $row):
?>  
<div>
    <form action="edit_dokumen_pendukung_pegawai_save.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <input type="hidden" name="nip_peg" value="<?php echo $row['nip_peg']; ?>"/>
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Jenis Dokumen</label></td>
        <td>:</td>
        <td>
            <select name="jenis_dokumen">
                <option value=""></option>
                <option value="Konversi NIP" <?php if($row['jenis_dokumen']=="Konversi NIP"){echo "selected";} ?>>Konversi NIP</option>
                <option value="Karpeg Biasa" <?php if($row['jenis_dokumen']=="Karpeg Biasa"){echo "selected";} ?>>Karpeg Biasa</option>
                <option value="Karpeg Elektronik" <?php if($row['jenis_dokumen']=="Karpeg Elektronik"){echo "selected";} ?>>Karpeg Elektronik</option>
                <option value="SK Berkala" <?php if($row['jenis_dokumen']=="SK Berkala"){echo "selected";} ?>>SK Berkala</option>
                <option value="SK Tugas Belajar" <?php if($row['jenis_dokumen']=="SK Tugas Belajar"){echo "selected";} ?>>SK Tugas Belajar</option>
                <option value="SK Ijin Belajar" <?php if($row['jenis_dokumen']=="SK Ijin Belajar"){echo "selected";} ?>>SK Ijin Belajar</option>
                <option value="Berita Acara Sumpah Janji PNS" <?php if($row['jenis_dokumen']=="Berita Acara Sumpah Janji PNS"){echo "selected";} ?>>Berita Acara Sumpah Janji PNS</option>
                <option value="KTP" <?php if($row['jenis_dokumen']=="KTP"){echo "selected";} ?>>KTP</option>
                <option value="NPWP" <?php if($row['jenis_dokumen']=="NPWP"){echo "selected";} ?>>NPWP</option>
                <option value="Akte Kelahiran" <?php if($row['jenis_dokumen']=="Akte Kelahiran"){echo "selected";} ?>>Akte Kelahiran</option>
                <option value="Askes" <?php if($row['jenis_dokumen']=="Askes"){echo "selected";} ?>>Askes</option>
                <option value="Kartu Keluarga" <?php if($row['jenis_dokumen']=="Kartu Keluarga"){echo "selected";} ?>>Kartu Keluarga</option>
                <option value="SKP" <?php if($row['jenis_dokumen']=="SKP"){echo "selected";} ?>>SKP</option>
            </select>
        </td>
    </tr>
    <input type="hidden" name="path_dokumen" value="<?php echo $row['path_dokumen']; ?>"/>
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