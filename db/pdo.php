<?php
// koneksi ke database

session_start();
$base_url = "http://localhost/simpeg_bpkad";

date_default_timezone_set("ASIA/MAKASSAR");


//if(!isset($_SESSION['username'])){
//	$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//	//$_SESSION['actual_link']=$actual_link;
//	if($actual_link != $base_url."/login.php") {
//		header("Location: $base_url/login.php");
//	}
//}


$base_url = "http://localhost/simpeg_bpkad";
function testdb_connect() {
$dbh = new PDO("mysql:host=localhost;dbname=simpeg_bpkad", "root", "");
     return ($dbh);
}

function inputPegawai($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO pegawai (nip_peg,nama_lengkap,tmpt_lahir,tgl_lahir,jenis_kelamin,status_peg,agama,stts_nikah,tgl_nikah,alamat,foto_path) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7,:field8,:field9,:field10,:field11)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h, ':field9' => $i, ':field10' => $j, ':field11' => $k));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputKeluargaPegawai($a,$b,$c,$d,$e,$f,$g,$h) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO keluarga_pegawai (nip_peg,nama_lengkap,tmpt_lahir,tgl_lahir,jenis_kelamin,status,pekerjaan,keterangan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7,:field8)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h));
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

function inputDiklatStruktural($a,$b,$c,$d,$e,$f) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO diklat_struktural (nip_peg,nama_diklat,tahun,tempat,keterangan,path_diklat_struktural) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputJabatan($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO jabatan (nip_peg,jabatan,tmt,golongan,eselon,keterangan,path_jabatan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function inputKepangkatan($a,$b,$c,$d,$e,$f) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO kepangkatan (nip_peg,pangkat_gol,tmt,jenis,keterangan,path_kepangkatan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f));
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
	$stmt = $db->prepare("INSERT INTO pendidikan (nip_peg,tingkat_pendidikan,nama_pendidikan,kualifikasi,tahun_lulus,path_pendidikan) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editPegawai($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE pegawai SET nip_peg=:field2,nama_lengkap=:field3,tmpt_lahir=:field4,tgl_lahir=:field5,jenis_kelamin=:field6,status_peg=:field7,agama=:field8,stts_nikah=:field9,tgl_nikah=:field10,alamat=:field11,foto_path=:field12 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h, ':field9' => $i, ':field10' => $j, ':field11' => $k, ':field12' => $l));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editKeluargaPegawai($a,$b,$c,$d,$e,$f,$g,$h,$i) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE keluarga_pegawai SET nip_peg=:field2,nama_lengkap=:field3,tmpt_lahir=:field4,tgl_lahir=:field5,jenis_kelamin=:field6,status=:field7,pekerjaan=:field8,keterangan=:field9 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h, ':field9' => $i));
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

function editDiklatStruktural($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE diklat_struktural SET nip_peg=:field2,nama_diklat=:field3,tahun=:field4,tempat=:field5,keterangan=:field6,path_diklat_struktural=:field7 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editJabatan($a,$b,$c,$d,$e,$f,$g,$h) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE jabatan SET nip_peg=:field2,jabatan=:field3,tmt=:field4,golongan=:field5,eselon=:field6,keterangan=:field7,path_jabatan=:field8 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g, ':field8' => $h));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function editKepangkatan($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE kepangkatan SET nip_peg=:field2,pangkat_gol=:field3,tmt=:field4,jenis=:field5,keterangan=:field6,path_kepangkatan=:field7 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
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
	$stmt = $db->prepare("UPDATE pendidikan SET nip_peg=:field2,tingkat_pendidikan=:field3,nama_pendidikan=:field4,kualifikasi=:field5,tahun_lulus=:field6,path_pendidikan=:field7 WHERE id=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b, ':field3' => $c, ':field4' => $d, ':field5' => $e, ':field6' => $f, ':field7' => $g));
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

function deleteDiklatStruktural($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM diklat_fungsional WHERE id=:field1");
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

function getDataDiklatFungsional($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat_fungsional WHERE nip_peg=:field1 AND id=:field2");
	$stmt->execute(array(':field1' => $a,':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function getDataDiklatStruktural($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat_struktural WHERE nip_peg=:field1 AND id=:field2");
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

function getDiklatStruktural($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT * FROM diklat_struktural WHERE nip_peg=:field1");
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


?>
