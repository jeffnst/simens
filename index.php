<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<?php
//if(isset($_SESSION['username'])){
//    echo "logged in";
//} else {
//    echo "logged off";
//}

?>
<h3>Data Pegawai</h3>
<div>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Pangkat <br/>Gol Ruang / TMT</th>
        <th>Eselon TMT</th>
        <th>Jabatan Unit Kerja</th>
        <th>Diklat Terakhir</th>
        <th>Pendidikan Terakhir</th>
    </tr>
    <?php  
    $pegawais = getNamaPegawai();
    $n = 0;
    foreach($pegawais as $row):
    $n++;
    ?>
    <tr>
        <td><?php echo $n; ?></td>
        <td><a href="<?php echo $base_url;?>/pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>"><?php echo $row['nama_lengkap']; ?></a></td>
        <?php 
        $kepangkatans = getKepangkatanDisplay($row['nip_peg']);
        foreach($kepangkatans as $row2):
        ?>
        <td><?php echo $row2['pangkat_gol']; ?> - <?php echo $row2['tmt']; ?></td>
        <?php 
        endforeach;
        ?>
        <?php 
        $kepangkatans = getJabatanDisplay($row['nip_peg']);
        foreach($kepangkatans as $row3):
        ?>
        <td><?php echo $row3['eselon']; ?> - <?php echo $row3['tmt']; ?></td>
        <td><?php echo $row3['jabatan']; ?></td>
        <?php 
        endforeach;
        ?>
        <?php 
        $kepangkatans = getDiklatStrukturalDisplay($row['nip_peg']);
        foreach($kepangkatans as $row4):
        ?>
        <td><?php echo $row4['nama_diklat']; ?> - <?php echo $row4['tahun']; ?></td>
        <?php 
        endforeach;
        ?>
        <?php 
        $kepangkatans = getPendidikanDisplay($row['nip_peg']);
        foreach($kepangkatans as $row5):
        ?>
        <td><?php echo $row5['tingkat_pendidikan']; ?> <?php echo $row5['kualifikasi']; ?> - <?php echo $row5['tahun_lulus']; ?></td>
        <?php 
        endforeach;
        ?>
    </tr>
    <?php  
    endforeach;
    ?>
</table>
</div>
</div>

<?php 
	include "footer.php";
?>