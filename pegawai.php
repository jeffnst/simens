<?php 
	include "header.php";
?>
<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = divID;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

      
    }
</script>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>DAFTAR RIWAYAT HIDUP</h3>
<?php
    $search = $_GET['search'];
    $pegawais =  getSearchPegawai($search);
    
    foreach($pegawais as $row):
    
    $jabatandisplays = getJabatanDisplay($row['nip_peg']);
    $pangkatdisplays = getKepangkatanDisplay($row['nip_peg']);
    $pendidikandisplays = getPendidikanDisplay($row['nip_peg']);
    $diks = getDiklat($row['nip_peg']);
    $kepangkatans = getKepangkatan($row['nip_peg']);
    $jabatans = getJabatan($row['nip_peg']);
    $pendidikans = getPendidikan($row['nip_peg']);
    $keluargas = getKeluargaPegawai($row['nip_peg']);
   // var_dump($row);
?>
<div>
    <div>
        <h4>IDENTITAS PEGAWAI</h4>
        <div class="tbl-no-border data-diri">
            <table id="left" border="0">
                <tr>
                    <td>1.</td>
                    <td>Nama </td>
                    <td>:</td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>"><?php }?><?php echo $row['nama_lengkap'] ?></a></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>NIP </td>
                    <td>:</td>
                    <td><?php echo $row['nip_peg'] ?></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Tempat, Tgl.Lahir </td>
                    <td>:</td>
                    <td><?php echo $row['tmpt_lahir'] ?>, <?php echo parseTtl($row['tgl_lahir']) ?></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Alamat / No. Telp</td>
                    <td>:</td>
                    <td><?php echo $row['alamat'] ?></td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Jenis Kelamin </td>
                    <td>:</td>
                    <td><?php echo $row['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Agama </td>
                    <td>:</td>
                    <td><?php echo $row['agama'] ?></td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Pangkat / Gol.Ruang</td>
                    <td>:</td>
                    <td><?php echo $pangkatdisplays[0]['jenis_pangkat'] ?> / <?php echo $pangkatdisplays[0]['gol_ruang'] ?></td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Pendidikan Terakhir </td>
                    <td>:</td>
                    <td><?php echo $pendidikandisplays[0]['jenjang_pendidikan'] ?></td>
                </tr>
                <tr>
                    <td>9.</td>
                    <td>Jabatan, TMT </td>
                    <td>:</td>
                    <td><?php echo $jabatandisplays[0]['nama_jabatan'] ?> , <?php echo $pangkatdisplays[0]['tmt'] ?></td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>No. Karpeg </td>
                    <td>:</td>
                    <td><?php echo $row['no_karpeg'] ?></td>
                </tr>
                <tr>
                    <td>11.</td>
                    <td>No. NPWP </td>
                    <td>:</td>
                    <td><?php echo $row['no_npwp'] ?></td>
                </tr>
                <tr>
                    <td>12.</td>
                    <td>No. Askes </td>
                    <td>:</td>
                    <td><?php echo $row['no_askes'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="image"><img height="200" src="<?php echo $base_url; ?>/<?php echo $row['foto_path'] ?>" title="<?php echo $row['nama_lengkap']; ?>"/></div>
    <div class="clearfix"></div>
    <div>
        <div>
            <h4>RIWAYAT KEPANGKATAN</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Jenis Pangkat</th>
                    <th>Pangkat/Gol. Ruang</th>
                    <th>TMT</th>
                    <th>No. SK</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $n = 0;
                foreach($kepangkatans as $kep):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_kepangkatan_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kep['id'] ?>"><?php } ?><?php echo $kep['jenis_pangkat']; ?></a></td>
                    <td><?php echo $kep['gol_ruang']; ?></td>
                    <td><?php echo $kep['tmt']; ?></td>
                    <td><?php echo $kep['no_sk']; ?></td>
                    <td><?php echo parseTtl($kep['tgl_sk']); ?></td>
                    <td><?php if($kep['path_kepangkatan']!= "") {?> <a target="_blank" href="<?php echo $base_url."/".$kep['path_kepangkatan'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$kep['path_kepangkatan'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_kepangkatan_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kep['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
        <div>
            <h4>RIWAYAT JABATAN</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>No. SK</th>
                    <th>Tanggal</th>
                    <th>Nama Jabatan</th>
                    <th>Unit Kerja</th>
                    <th>Keterangan</th>

                </tr>
                <?php
                $n = 0;
                foreach($jabatans as $jab):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_jabatan_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $jab['id'] ?>"><?php } ?><?php echo $jab['no_sk'];?></a></td>
                    <td><?php echo $jab['tgl_sk'] ?></td>
                    <td><?php echo $jab['nama_jabatan']; ?></td>
                    <td><?php echo $jab['unit_kerja'] ?></td>
                    <td><?php if($jab['path_jabatan']!= "") {?> <a target="_blank" href="<?php echo $base_url."/".$jab['path_jabatan'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$jab['path_jabatan'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_jabatan_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $jab['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
    </div>
    <div>
        <div>
            <h4>RIWAYAT PENDIDIKAN</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Jenjang Pendidikan</th>
                    <th>Nama Sekolah</th>
                    <th>No. Ijazah</th>
                    <th>Tahun Lulus</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $n = 0;
                foreach($pendidikans as $pend):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_pendidikan_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $pend['id'] ?>"><?php } ?><?php echo $pend['jenjang_pendidikan'] ?></a></td>
                    <td><?php echo $pend['nama_sekolah'] ?></td>
                    <td><?php echo $pend['no_ijazah'] ?></td>
                    <td><?php echo $pend['tahun_lulus'] ?></td>
                    <td><?php if($pend['path_pendidikan']!= "") {?> <a target="_blank" href="<?php echo $base_url."/".$pend['path_pendidikan'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$pend['path_pendidikan'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_pendidikan_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $pend['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
        <div>
            <h4>RIWAYAT DIKLAT</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Jenis Diklat</th>
                    <th>Nama Diklat</th>
                    <th>Tempat</th>
                    <th>Tahun</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $n = 0;
                foreach($diks as $dik):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_diklat_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $dik['id'] ?>"><?php } ?><?php echo $dik['jenis_diklat'] ?></a></td>
                    <td><?php echo $dik['nama_diklat'] ?></td>
                    <td><?php echo $dik['tempat'] ?></td>
                    <td><?php echo $dik['tahun'] ?></td>
                    <td><?php if($dik['path_diklat']!= "") {?> <a target="_blank" href="<?php echo $base_url."/".$dik['path_diklat'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$dik['path_diklat'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_diklat_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $dik['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
    </div>
    <div>
        <h4>RIWAYAT KELUARGA</h4>
        <div>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Nama</th>
                    <th>Tgl. Lahir</th>
                    <th>Tmpt. Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $n = 0;
                foreach($keluargas as $kel):
                if($kel['status']=="Orang Tua"):    
                $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_keluarga_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kel['id'] ?>"><?php } ?><?php echo $kel['status'] ?></a></td>
                    <td><?php echo $kel['nama_lengkap'] ?></td>
                    <td><?php echo parseTtl($kel['tgl_lahir']) ?></td>
                    <td><?php echo $kel['tmpt_lahir'] ?></td>
                    <td><?php echo $kel['jenis_kelamin'] ?></td>
                    <td><?php if($kel['keterangan']!= "") {?> <a target="_blank" href="<?php echo $base_url."/".$kel['keterangan'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$kel['keterangan'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_diklat_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kel['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endif;
                endforeach;
                foreach($keluargas as $kel):
                if($kel['status']=="Suami" || $kel['status']=="Istri"):    
                $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_keluarga_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kel['id'] ?>"><?php } ?><?php echo $kel['status'] ?></a></td>
                    <td><?php echo $kel['nama_lengkap'] ?></td>
                    <td><?php echo parseTtl($kel['tgl_lahir']) ?></td>
                    <td><?php echo $kel['tmpt_lahir'] ?></td>
                    <td><?php echo $kel['jenis_kelamin'] ?></td>
                    <td><?php if($kel['keterangan']!= "") {?> <a target="_blank" href="<?php echo $base_url."/".$kel['keterangan'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$kel['keterangan'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_diklat_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kel['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endif;
                endforeach;
                foreach($keluargas as $kel):
                if($kel['status']=="Anak"): 
                $n++;   
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_keluarga_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kel['id'] ?>"><?php } ?><?php echo $kel['status'] ?></a></td>
                    <td><?php echo $kel['nama_lengkap'] ?></td>
                    <td><?php echo parseTtl($kel['tgl_lahir']) ?></td>
                    <td><?php echo $kel['tmpt_lahir'] ?></td>
                    <td><?php echo $kel['jenis_kelamin'] ?></td>
                    <td><?php if($kel['keterangan']!= "") {?> <a target="_blank" href="<?php echo $base_url."/".$kel['keterangan'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$kel['keterangan'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_diklat_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kel['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endif;
                endforeach;
                ?>
            </table>
        </div>
    </div>
     <div>
        <h4>DOKUMEN PENDUKUNG</h4>
        <?php
        $keluargas = getKeluargaPegawai($nip_peg);
        ?>
        <div>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                //$n = 0;
                //foreach($keluargas as $kel):
                //$n++;
                //if($kel['status']=="suami" || $kel['status']=="istri"):    
                ?>
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'Konversi NIP');
                if($dokumens[0]!=''){
                foreach($dokumens as $kn):
                ?>
                <tr>
                    <td>1</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($kn['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kn['id'] ?>"><?php } ?><?php echo $kn['jenis_dokumen'] ?></a></td>
                    <td><?php if($kn['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$kn['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$kn['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kn['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>1</td>
                    <td>Konversi NIP</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'Karpeg Biasa');
                if($dokumens[0]!=''){
                foreach($dokumens as $kb):
                ?>
                <tr>
                    <td>2</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($kb['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kb['id'] ?>"><?php } ?><?php echo $kb['jenis_dokumen'] ?></a></td>
                    <td><?php if($kb['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$kb['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$kb['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kb['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>2</td>
                    <td>Karpeg Biasa</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'Karpeg Elektronik');
                if($dokumens[0]!=''){
                foreach($dokumens as $ke):
                ?>
                <tr>
                    <td>3</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($ke['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ke['id'] ?>"><?php } ?><?php echo $ke['jenis_dokumen'] ?></a></td>
                    <td><?php if($ke['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$ke['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$ke['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ke['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>3</td>
                    <td>Karpeg Elektronik</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'SK Berkala');
                if($dokumens[0]!=''){
                foreach($dokumens as $skb):
                ?>
                <tr>
                    <td>4</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($skb['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $skb['id'] ?>"><?php } ?><?php echo $skb['jenis_dokumen'] ?></a></td>
                    <td><?php if($skb['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$skb['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$skb['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $skb['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>4</td>
                    <td>SK Berkala</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'SK Tugas Belajar');
                if($dokumens[0]!=''){
                foreach($dokumens as $sktb):
                ?>
                <tr>
                    <td>5</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($sktb['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $sktb['id'] ?>"><?php } ?><?php echo $sktb['jenis_dokumen'] ?></a></td>
                    <td><?php if($sktb['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$sktb['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$sktb['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $sktb['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>5</td>
                    <td>SK Tugas Belajar</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'SK Ijin Belajar');
                if($dokumens[0]!=''){
                foreach($dokumens as $skib):
                ?>
                <tr>
                    <td>6</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($skib['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $skib['id'] ?>"><?php } ?><?php echo $skib['jenis_dokumen'] ?></a></td>
                    <td><?php if($skib['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$skib['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$skib['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $skib['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>6</td>
                    <td>SK Ijin Belajar</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'Berita Acara Sumpah Janji PNS');
                if($dokumens[0]!=''){
                foreach($dokumens as $bas):
                ?>
                <tr>
                    <td>7</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($bas['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $bas['id'] ?>"><?php } ?><?php echo $bas['jenis_dokumen'] ?></a></td>
                    <td><?php if($bas['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$bas['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$bas['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $bas['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>7</td>
                    <td>Berita Acara Sumpah Janji PNS</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'KTP');
                if($dokumens[0]!=''){
                foreach($dokumens as $ktp):
                ?>
                <tr>
                    <td>8</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($ktp['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ktp['id'] ?>"><?php } ?><?php echo $ktp['jenis_dokumen'] ?></a></td>
                    <td><?php if($ktp['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$ktp['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$ktp['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ktp['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>8</td>
                    <td>KTP</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'NPWP');
                if($dokumens[0]!=''){
                foreach($dokumens as $npwp):
                ?>
                <tr>
                    <td>9</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($npwp['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $npwp['id'] ?>"><?php } ?><?php echo $npwp['jenis_dokumen'] ?></a></td>
                    <td><?php if($npwp['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$npwp['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$npwp['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $npwp['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>9</td>
                    <td>NPWP</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'Akte Kelahiran');
                if($dokumens[0]!=''){
                foreach($dokumens as $ak):
                ?>
                <tr>
                    <td>10</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($ak['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ak['id'] ?>"><?php } ?><?php echo $ak['jenis_dokumen'] ?></a></td>
                    <td><?php if($ak['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$ak['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$ak['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ak['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>10</td>
                    <td>Akte Kelahiran</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'Askes');
                if($dokumens[0]!=''){
                foreach($dokumens as $ask):
                ?>
                <tr>
                    <td>11</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($ask['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ask['id'] ?>"><?php } ?><?php echo $ask['jenis_dokumen'] ?></a></td>
                    <td><?php if($ask['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$ask['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$ask['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $ask['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>11</td>
                    <td>Askes</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'Kartu Keluarga');
                if($dokumens[0]!=''){
                foreach($dokumens as $kk):
                ?>
                <tr>
                    <td>12</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($kk['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kk['id'] ?>"><?php } ?><?php echo $kk['jenis_dokumen'] ?></a></td>
                    <td><?php if($kk['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$kk['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$kk['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $kk['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /></a><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>12</td>
                    <td>Kartu Keluarga</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                <?php 
                $dokumens = getDokumen($row['nip_peg'],'SKP');
                if($dokumens[0]!=''){
                foreach($dokumens as $skp):
                ?>
                <tr>
                    <td>13</td>
                    <td><?php if(isset($_SESSION['username'])&&isset($skp['jenis_dokumen'])){?><a href="<?php echo $base_url;?>/edit_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $skp['id'] ?>"><?php } ?><?php echo $skp['jenis_dokumen'] ?></a></td>
                    <td><?php if($skp['path_dokumen']!= ""){?> <a target="_blank" href="<?php echo $base_url."/".$skp['path_dokumen'] ?>"><img width="32" src="<?php echo $base_url ?>/view.png" title="view" /></a>  |  <img width="32" src="<?php echo $base_url ?>/print.png" title="cetak" style="cursor:pointer;" onclick="javascript:printDiv('<?php echo $base_url."/".$skp['path_dokumen'] ?>')" /> <?php } ?> <?php if(isset($_SESSION['username'])){ ?>| <a href="<?php echo $base_url;?>/delete_dokumen_pendukung_pegawai.php?nip_peg=<?php echo $row['nip_peg'];?>&id=<?php echo $skp['id']?>"><img width="32" src="<?php echo $base_url ?>/delete.png" title="delete" /><?php } ?></td>
                </tr>
                <?php
                endforeach;
                }else {
                ?>
                <tr>
                    <td>13</td>
                    <td>SKP</td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                
                <?php
                //endif;
                //endforeach;
                ?>
            </table>
        </div>
    </div>

</div>
<?php endforeach;?>
</div>
<?php 
	include "footer.php";
?>