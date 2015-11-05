<?php 
	include "header.php";
    
    $nip_peg = $_GET['nip_peg'];
    $pegawais =  getDataPegawaiById($nip_peg);
    foreach($pegawais as $row):
    
    $jabatans = getJabatanDisplay($nip_peg);
    $pangkats = getKepangkatanDisplay($nip_peg);
    
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h2>DAFTAR RIWAYAT HIDUP</h2>
<div>
    <div>
        <h3>DETAIL KETERANGAN PERORANGAN</h3>
        <div class="tbl-no-border data-diri">
            <table id="left" border="0">
                <tr>
                    <td>1.</td>
                    <td>Nama </td>
                    <td>:</td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_pegawai.php?nip_peg=<?php echo $nip_peg;?>"><?php }?><?php echo $row['nama_lengkap'] ?></a></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Pangkat </td>
                    <td>:</td>
                    <td><?php echo $pangkats[0]['pangkat_gol'] ?></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>NIP </td>
                    <td>:</td>
                    <td><?php echo $row['nip_peg'] ?></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Unit Kerja </td>
                    <td>:</td>
                    <td>BPKAD Kabupaten Banjar, Kalimantan Selatan</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Jabatan, TMT </td>
                    <td>:</td>
                    <td><?php echo $jabatans[0]['jabatan'] ?> , <?php echo $jabatans[0]['tmt'] ?></td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Pangkat/Gol.Ruang, TMT </td>
                    <td>:</td>
                    <td><?php echo $pangkats[0]['pangkat_gol'] ?> , <?php echo $pangkats[0]['tmt'] ?></td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Jenis Kepegawaian </td>
                    <td>:</td>
                    <td><?php echo $row['status_peg'] ?></td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Tempat, Tgl.Lahir </td>
                    <td>:</td>
                    <td><?php echo $row['tmpt_lahir'] ?>, <?php echo $row['tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <td>9.</td>
                    <td>Jenis Kelamin </td>
                    <td>:</td>
                    <td><?php echo $row['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>Agama </td>
                    <td>:</td>
                    <td><?php echo $row['agama'] ?></td>
                </tr>
                <tr>
                    <td>11.</td>
                    <td>Status, Tgl.Kawin </td>
                    <td>:</td>
                    <td><?php echo $row['stts_nikah'] ?>, <?php echo $row['tgl_nikah'] ?></td>
                </tr>
                <tr>
                    <td>12.</td>
                    <td>Alamat </td>
                    <td>:</td>
                    <td><?php echo $row['alamat'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="image""><img height="100" src="<?php echo $base_url; ?>/<?php echo $row['foto_path'] ?>" title="<?php echo $row['nama_lengkap']; ?>"/></div>
    <div class="clearfix"></div>
    <div>
        <h3>PENDIDIKAN DAN PELATIHAN</h3>
        <div>
            <h4>Pendidikan Umum</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Tingkat</th>
                    <th>Nama</th>
                    <th>Kualifikasi</th>
                    <th>Tahun Lulus</th>
                    <th>View</th>
                </tr>
                <?php
                $pendidikans = getPendidikan($nip_peg);
                $n = 0;
                foreach($pendidikans as $pend):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_pendidikan_pegawai.php?nip_peg=<?php echo $nip_peg;?>&id=<?php echo $pend['id'] ?>"><?php } ?><?php echo $pend['tingkat_pendidikan']; ?></a></td>
                    <td><?php echo $pend['nama_pendidikan']; ?></td>
                    <td><?php echo $pend['kualifikasi']; ?></td>
                    <td><?php echo $pend['tahun_lulus']; ?></td>
                    <td>coming soon</td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
        <div>
            <h4>Diklat Struktural</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Diklat</th>
                    <th>Tahun</th>
                    <th>Tempat</th>
                    <th>Keterangan</th>
                    <th>View</th>
                </tr>
                <?php
                $dik_struks = getDiklatStruktural($nip_peg);
                $n = 0;
                foreach($dik_struks as $dik_struk):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_diklat_struktural_pegawai.php?nip_peg=<?php echo $nip_peg;?>&id=<?php echo $dik_struk['id'] ?>"><?php } ?><?php echo $dik_struk['nama_diklat']; ?></a></td>
                    <td><?php echo $dik_struk['tahun']; ?></td>
                    <td><?php echo $dik_struk['tempat']; ?></td>
                    <td><?php echo $dik_struk['keterangan']; ?></td>
                    <td>coming soon</td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
        <div>
            <h4>Diklat Fungsional</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Diklat</th>
                    <th>Tahun</th>
                    <th>Tempat</th>
                    <th>Keterangan</th>
                    <th>View</th>
                </tr>
                <?php
                $dik_fungs = getDiklatFungsional($nip_peg);
                $n = 0;
                foreach($dik_fungs as $dik_fung):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_diklat_fungsional_pegawai.php?nip_peg=<?php echo $nip_peg;?>&id=<?php echo $dik_fung['id'] ?>"><?php } ?><?php echo $dik_fung['nama_diklat']; ?></a></td>
                    <td><?php echo $dik_fung['tahun']; ?></td>
                    <td><?php echo $dik_fung['tempat']; ?></td>
                    <td><?php echo $dik_fung['keterangan']; ?></td>
                    <td>coming soon</td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
    </div>
    <div>
        <h3>JABATAN DAN KEPANGKATAN</h3>
        <div>
            <h4>Riwayat Jabatan</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>TMT</th>
                    <th>Gol.</th>
                    <th>Eselon</th>
                    <th>Keterangan</th>
                    <th>View</th>
                </tr>
                <?php
                $jabatans = getJabatan($nip_peg);
                $n = 0;
                foreach($jabatans as $jab):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_jabatan_pegawai.php?nip_peg=<?php echo $nip_peg;?>&id=<?php echo $jab['id'] ?>"><?php } ?><?php echo $jab['jabatan']; ?></a></td>
                    <td><?php echo $jab['tmt']; ?></td>
                    <td><?php echo $jab['golongan']; ?></td>
                    <td><?php echo $jab['eselon']; ?></td>
                    <td><?php echo $jab['keterangan']; ?></td>
                    <td>coming soon</td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
        <div>
            <h4>Riwayat Kepangkatan</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Pangkat/Gol. Ruang</th>
                    <th>TMT</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>View</th>
                </tr>
                <?php
                $kepangkatans = getKepangkatan($nip_peg);
                $n = 0;
                foreach($kepangkatans as $kep):
                    $n++;
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_kepangkatan_pegawai.php?nip_peg=<?php echo $nip_peg;?>&id=<?php echo $kep['id'] ?>"><?php } ?><?php echo $kep['pangkat_gol']; ?></a></td>
                    <td><?php echo $kep['tmt']; ?></td>
                    <td><?php echo $kep['jenis']; ?></td>
                    <td><?php echo $kep['keterangan']; ?></td>
                    <td>coming soon</td>
                </tr>
                <?php
                 endforeach;
                ?>
            </table>
        </div>
    </div>
    <div>
        <h3>DATA KELUARGA</h3>
        <?php
        $keluargas = getKeluargaPegawai($nip_peg);
        ?>
        <div>
            <h4>Istri/Suami</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tmpt. Lahir</th>
                    <th>Tgl. Lahir</th>
                    <th>Pekerjaan</th>
                    <th>Keterangan</th>
                    <th>View</th>
                </tr>
                <?php
                $n = 0;
                foreach($keluargas as $kel):
                $n++;
                if($kel['status']=="suami" || $kel['status']=="istri"):    
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_keluarga_pegawai.php?nip_peg=<?php echo $nip_peg;?>&id=<?php echo $kel['id'] ?>"><?php } ?><?php echo $kel['nama_lengkap']; ?></a></td>
                    <td><?php echo $kel['tmpt_lahir']; ?></td>
                    <td><?php echo $kel['tgl_lahir']; ?></td>
                    <td><?php echo $kel['pekerjaan']; ?></td>
                    <td><?php echo $kel['keterangan']; ?></td>
                    <td>coming soon</td>
                </tr>
                <?php
                endif;
                endforeach;
                ?>
            </table>
        </div>
        <div>
            <h4>Anak</h4>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tmpt. Lahir</th>
                    <th>Tgl. Lahir</th>
                    <th>Pekerjaan</th>
                    <th>Keterangan</th>
                    <th>View</th>
                </tr>
                <?php
                $n = 0;
                foreach($keluargas as $kel):
                $n++;
                if($kel['status']=="anak"):    
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php if(isset($_SESSION['username'])){?><a href="<?php echo $base_url;?>/edit_keluarga_pegawai.php?nip_peg=<?php echo $nip_peg;?>&id=<?php echo $kel['id'] ?>"><?php } ?><?php echo $kel['nama_lengkap']; ?></a></td>
                    <td><?php echo $kel['jenis_kelamin']; ?></td>
                    <td><?php echo $kel['tmpt_lahir']; ?></td>
                    <td><?php echo $kel['tgl_lahir']; ?></td>
                    <td><?php echo $kel['pekerjaan']; ?></td>
                    <td><?php echo $kel['keterangan']; ?></td>
                    <td>coming soon</td>
                </tr>
                <?php
                endif;
                endforeach;
                ?>
            </table>
        </div>
    </div>

</div>
</div>
<?php 
endforeach;
	include "footer.php";
?>