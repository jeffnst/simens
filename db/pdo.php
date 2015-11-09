<?php
// koneksi ke database

session_start();
$base_url = "http://92.222.71.15/simens";

date_default_timezone_set("ASIA/MAKASSAR");


//if(!isset($_SESSION['username'])){
//	$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//	//$_SESSION['actual_link']=$actual_link;
//	if($actual_link != $base_url."/login.php") {
//		header("Location: $base_url/login.php");
//	}
//}


$base_url = "http://92.222.71.15/simens";
function testdb_connect() {
$dbh = new PDO("mysql:host=localhost;dbname=simpeg_bpkad", "root", "");
     return ($dbh);
}

function inputPegawai($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO pegawai (nip_peg,nama_lengkap,tmpt_lahir,tgl_lahir,jenis_kelamin,status_peg,agama,stts_nikah,tgl_nikah,alamat,no_karpeg,no_npwp,no_askes,foto_path) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7,:field8,:field9,:field10,:field11,:field12,:field13,:field14)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h, ':field9' => $i, ':field10' => $j, ':field11' => $k, ':field12' => $l, ':field13' => $m, ':field14' => $n));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputKeluargaPegawai($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO keluarga_pegawai (nip_peg,status,nama_lengkap,tgl_lahir,tmpt_lahir,jenis_kelamin,keterangan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

//function inputAnakPegawai($a,$b,$c,$d,$e,$f,$g,$h) {
//	$db = testdb_connect();
//	$stmt = $db->prepare("INSERT INTO keluarga_pegawai (nip_peg,nama_lengkap,tmpt_lahir,tgl_lahir,jenis_kelamin,status,pekerjaan,keterangan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7,:field8)");
//	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h));
//	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//	return($affected_rows);
//}

function inputDiklatFungsional($a,$b,$c,$d,$e,$f) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO diklat_fungsional (nip_peg,nama_diklat,tahun,tempat,keterangan,path_diklat_fungsional) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputDiklat($a,$b,$c,$d,$e,$f) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO diklat (nip_peg,jenis_diklat,nama_diklat,tempat,tahun,path_diklat) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputJabatan($a,$b,$c,$d,$e,$f) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO jabatan (nip_peg,no_sk,tgl_sk,nama_jabatan,unit_kerja,path_jabatan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputKepangkatan($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO kepangkatan (nip_peg,jenis_pangkat,gol_ruang,tmt,no_sk,tgl_sk,path_kepangkatan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputPelatihan($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO pelatihan (nip_peg,nama_pelatihan,lama_pelatihan,ijazah_pelatihan,tempat_pelatihan,keterangan_pelatihan,path_pelatihan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputPendidikan($a,$b,$c,$d,$e,$f) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO pendidikan (nip_peg,jenjang_pendidikan,nama_sekolah,no_ijazah,tahun_lulus,path_pendidikan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputDokumen($a,$b,$c) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO dokumen (nip_peg,jenis_dokumen,path_dokumen) VALUES(:field1,:field2,:field3)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editPegawai($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE pegawai SET nip_peg=:field2,nama_lengkap=:field3,tmpt_lahir=:field4,tgl_lahir=:field5,jenis_kelamin=:field6,status_peg=:field7,agama=:field8,stts_nikah=:field9,tgl_nikah=:field10,alamat=:field11,no_karpeg=:field12,no_npwp=:field13,no_askes=:field14,foto_path=:field15 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h, ':field9' => $i, ':field10' => $j, ':field11' => $k, ':field12' => $l, ':field13' => $m, ':field14' => $n, ':field15' => $o));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editKeluargaPegawai($a,$b,$c,$d,$e,$f,$g,$h) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE keluarga_pegawai SET nip_peg=:field2,status=:field3,nama_lengkap=:field4,tgl_lahir=:field5,tmpt_lahir=:field6,jenis_kelamin=:field7,keterangan=:field8 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editDiklatFungsional($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE diklat_fungsional SET nip_peg=:field2,nama_diklat=:field3,tahun=:field4,tempat=:field5,keterangan=:field6,path_diklat_fungsional=:field7 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editDiklat($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE diklat SET nip_peg=:field2,jenis_diklat=:field3,nama_diklat=:field4,tempat=:field5,tahun=:field6,path_diklat=:field7 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editJabatan($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE jabatan SET nip_peg=:field2,no_sk =:field3,tgl_sk=:field4,nama_jabatan=:field5,unit_kerja=:field6,path_jabatan=:field7 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editKepangkatan($a,$b,$c,$d,$e,$f,$g,$h) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE kepangkatan SET nip_peg=:field2,jenis_pangkat=:field3,gol_ruang=:field4,tmt=:field5,no_sk=:field6,tgl_sk=:field7,path_kepangkatan=:field8 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editPelatihan($a,$b,$c,$d,$e,$f,$g,$h) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE pelatihan SET nip_peg=:field2,nama_pelatihan=:field3,lama_pelatihan=:field4,ijazah_pelatihan=:field5,tempat_pelatihan=:field6,keterangan_pelatihan=:field7,path_pelatihan=:field8 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editPendidikan($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE pendidikan SET nip_peg=:field2,jenjang_pendidikan=:field3,nama_sekolah=:field4,no_ijazah=:field5,tahun_lulus=:field6,path_pendidikan=:field7 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editDokumen($a,$b,$c,$d) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE dokumen SET nip_peg=:field2,jenis_dokumen=:field3,path_dokumen=:field4 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deletePegawai($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM pegawaiWHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deleteKeluargaPegawai($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM keluarga_pegawai WHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deleteDiklatFungsional($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM diklat_fungsional WHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deleteDiklat($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM diklat WHERE id=:field1");
	$stmt->execute(array(':field1' => $a,));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deleteJabatan($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM jabatan WHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deleteKepangkatan($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM kepangkatan WHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deletePelatihan($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM pelatihan WHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deletePendidikan($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM pendidikan WHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function deleteDokumen($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM dokumen WHERE id=:field1");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function getNamaPegawai() {
	$db = testdb_connect();
	$stmt = $db->query("SELECT nip_peg,nama_lengkap FROM pegawai Order By id ASC");
	//$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getIdPegawaiByName($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT nip_peg FROM pegawai WHERE nama_lengkap=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataPegawaiById($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM pegawai WHERE nip_peg=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getSearchPegawai($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM pegawai WHERE nip_peg = :field1 OR nama_lengkap = :field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataDiklatFungsional($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat_fungsional WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataDiklat($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataJabatan($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM jabatan WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataKeluargaPegawai($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM keluarga_pegawai WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataKepangkatan($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM kepangkatan WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataPelatihan($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM pelatihan WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataPendidikan($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM pendidikan WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataDokumen($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM dokumen WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getKepangkatanDisplay($a){
    $db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM kepangkatan WHERE nip_peg=:field1 ORDER BY id DESC LIMIT 1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getJabatanDisplay($a){
    $db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM jabatan WHERE nip_peg=:field1 ORDER BY id DESC LIMIT 1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDiklatStrukturalDisplay($a){
    $db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat_struktural WHERE nip_peg=:field1 ORDER BY id DESC LIMIT 1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getPendidikanDisplay($a){
    $db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM pendidikan WHERE nip_peg=:field1 ORDER BY id DESC LIMIT 1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getPendidikan($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM pendidikan WHERE nip_peg=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDiklat($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat WHERE nip_peg=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDiklatFungsional($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat_fungsional WHERE nip_peg=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getJabatan($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM jabatan WHERE nip_peg=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getKepangkatan($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM kepangkatan WHERE nip_peg=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getKeluargaPegawai($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM keluarga_pegawai WHERE nip_peg=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDokumen($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM dokumen WHERE nip_peg=:field1 AND jenis_dokumen=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function parseTtl($a) {
    $parse_tgl = explode("-",$a);
    $result = $parse_tgl[2]."-".$parse_tgl[1]."-".$parse_tgl[0];
    return($result);
    
}


?>
