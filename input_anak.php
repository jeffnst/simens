<?php
$jumlah_anak = $_GET['jumlah_anak'];

for ($i=1; $i<=$jumlah_anak; $i++) {

?>
<script type="text/javascript">
    $(function() {
        $( "#datepicker<?php echo $i;?>" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: "yy-mm-dd"
        });
        
      });

</script>
<?php
}
for ($i=1; $i<=$jumlah_anak; $i++) {

?>
    <div id='anak-$i'><span>Anak ke <?php echo $i;?> : </span>
    <div><label>Nama Lengkap Anak ke <?php echo $i; ?></label> : <input type="text" name="nama_lengkap_anak_<?php echo $i;?>"/></div>
	<div><label>Jenis Kelamin</label> : <input type="radio" name="jenis_kelamin_anak_<?php echo $i;?>" value="laki-laki">Laki-laki <input type="radio" name="jenis_kelamin_anak_<?php echo $i;?>" value="perempuan">Female</div>
    <div><label>Tempat Lahir</label> : <input type="text" name="tmpt_lahir_anak_<?php echo $i;?>"/>  <label>Tanggal Lahir</label> : <input type="text" name="tgl_lahir_anak_<?php echo $i;?>" id="datepicker<?php echo $i;?>"/></div>
    <div><label>Pekerjaan</label> : <input type="text" name="pekerjaan_anak_<?php echo $i;?>"/></div>
    <div><label>Keterangan</label> : <input type="text" name="keterangan_anak_<?php echo $i;?>"/></div>
	</div>

<?php 
}

?>
<input type="hidden" name="jumlah_anak" value="<?php echo $jumlah_anak;?>"/>