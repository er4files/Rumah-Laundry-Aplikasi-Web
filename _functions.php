<?php 

session_start();

// Koneksi Ke database
$host	= 'localhost';
$user = 'root';
$pass	= '';
$db	= 'laundry_app';

// Koneksi ke Database
$koneksi = mysqli_connect($host,$user,$pass,$db);

// Fungsi untuk menampilkan semua query dari database
function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// Fungsi Absolute URL
// Absolute url merupakan Serangkaian alamat yang menunjukkan suatu dokumen atau direktori, dengan menyertakan alamat domain atau host
function url($url = null){
	$url_utama = "http://localhost/rumah_laundry";
	if ($url != null) {
		return $url_utama . '/' . $url;
	}else{
		return $url_utama;
	}
}

// CRUD (Management Karyawan)
function add_kary($karyawan){
	global $koneksi;

	$nama			= htmlspecialchars($karyawan['nama']);
	$username	= htmlspecialchars($karyawan['username']);
	$email		= htmlspecialchars($karyawan['email']);
	$password	= stripcslashes(htmlspecialchars($karyawan['password']));
	$level		= $karyawan['level'];

	// Cek apakah username dan email sudah tersedia
	$master = mysqli_query($koneksi,"SELECT * FROM master WHERE username='$username' OR email='$email'");
	if (mysqli_num_rows($master) > 0) {
		echo "
			<script>
				alert('Username atau Email Sudah Terdaftar')
			</script>
		";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	$insert = "INSERT INTO master VALUES ('','$nama','$email','$username','$password','$level')";
	mysqli_query($koneksi,$insert);

	return mysqli_affected_rows($koneksi);
}

function update_kary($up_kary){
	global $koneksi;

	$id_user 	= $up_kary['id_user'];
	$nama 		= htmlspecialchars($up_kary['nama']);
	$username 	= htmlspecialchars($up_kary['username']);
	$email 		= htmlspecialchars($up_kary['email']);

	$up_query = "UPDATE master SET 
		nama 		= '$nama', 
		username = '$username', 
		email 	= '$email' 
		WHERE id_user = '$id_user'
	";

	mysqli_query($koneksi,$up_query);
	return mysqli_affected_rows($koneksi);
}

function del_kary($id_kary){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM master WHERE id_user = '$id_kary'");
	return mysqli_affected_rows($koneksi);
}



// CRUD Paket Cuci Komplit
function add_ck($data_ck){
	global $koneksi;
	$nama_pkt_ck 	= htmlspecialchars($data_ck['nama_paket_ck']);
	$waktu_krj_ck 	= htmlspecialchars($data_ck['waktu_kerja_ck']);
	$qty_ck 			= htmlspecialchars($data_ck['kuantitas_ck']);
	$tarif_ck 		= htmlspecialchars($data_ck['tarif_ck']);

	$query_ck = "INSERT INTO tb_cuci_komplit VALUES (
		'','$nama_pkt_ck','$waktu_krj_ck','$qty_ck','$tarif_ck'
	)";
	mysqli_query($koneksi,$query_ck);
	return mysqli_affected_rows($koneksi);
}

function edit_ck($edit_ck){
	global $koneksi;

	$id_ck 			= $edit_ck['id_ck'];
	$nama_pkt_ck 	= htmlspecialchars($edit_ck['nama_paket_ck']);
	$waktu_krj_ck	= htmlspecialchars($edit_ck['waktu_kerja_ck']);
	$qty_ck 			= htmlspecialchars($edit_ck['kuantitas_ck']);
	$tarif_ck 		= htmlspecialchars($edit_ck['tarif_ck']);

	mysqli_query($koneksi,"UPDATE tb_cuci_komplit SET
		nama_paket_ck = '$nama_pkt_ck',
		waktu_kerja_ck = '$waktu_krj_ck',
		kuantitas_ck = '$qty_ck',
		tarif_ck = '$tarif_ck'
		WHERE id_ck = '$id_ck'
	");
	return mysqli_affected_rows($koneksi);
}

function del_ck($del_ck){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM tb_cuci_komplit WHERE id_ck = '$del_ck'");
	return mysqli_affected_rows($koneksi);
}

function add_dc($data_dc){
	global $koneksi;

	$nama_pkt_dc = htmlspecialchars($data_dc['nama_paket_dc']);
	$waktu_krj_dc = htmlspecialchars($data_dc['waktu_kerja_dc']);
	$qty_dc = htmlspecialchars($data_dc['kuantitas_dc']);
	$tarif_dc = htmlspecialchars($data_dc['tarif_dc']);

	$query_dc = "INSERT INTO tb_dry_clean VALUES (
		'','$nama_pkt_dc','$waktu_krj_dc','$qty_dc','$tarif_dc'
	)";
	mysqli_query($koneksi,$query_dc);
	return mysqli_affected_rows($koneksi);
}

function edit_dc($edit_dc){
	global $koneksi;

	$id_dc = $edit_dc['id_dc'];
	$nama_pkt_dc = htmlspecialchars($edit_dc['nama_paket_dc']);
	$waktu_krj_dc = htmlspecialchars($edit_dc['waktu_kerja_dc']);
	$qty_dc = htmlspecialchars($edit_dc['kuantitas_dc']);
	$tarif_dc = htmlspecialchars($edit_dc['tarif_dc']);

	mysqli_query($koneksi,"UPDATE tb_dry_clean SET
		nama_paket_dc = '$nama_pkt_dc',
		waktu_kerja_dc = '$waktu_krj_dc',
		kuantitas_dc = '$qty_dc',
		tarif_dc = '$tarif_dc'
		WHERE id_dc = '$id_dc'
	");
	return mysqli_affected_rows($koneksi);
}

function del_dc($del_dc){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM tb_dry_clean WHERE id_dc = '$del_dc'");
	return mysqli_affected_rows($koneksi);
}

function add_cs($data_cs){
	global $koneksi;

	$nama_pkt_cs = htmlspecialchars($data_cs['nama_cs']);
	$waktu_krj_cs = htmlspecialchars($data_cs['waktu_kerja_cs']);
	$qty_cs = htmlspecialchars($data_cs['kuantitas_cs']);
	$tarif_cs = htmlspecialchars($data_cs['tarif_cs']);
	$ket_cs = htmlspecialchars($data_cs['keterangan_cs']);

	$query_cs = "INSERT INTO tb_cuci_satuan VALUES (
		'','$nama_pkt_cs','$waktu_krj_cs','$qty_cs','$tarif_cs','$ket_cs'
	)";

	mysqli_query($koneksi,$query_cs);
	return mysqli_affected_rows($koneksi);
}

function edit_cs($edit_cs){
	global $koneksi;

	$id_cs = $edit_cs['id_cs'];
	$nama_pkt_cs = htmlspecialchars($edit_cs['nama_cs']);
	$waktu_krj_cs = htmlspecialchars($edit_cs['waktu_kerja_cs']);
	$qty_cs = htmlspecialchars($edit_cs['kuantitas_cs']);
	$tarif_cs = htmlspecialchars($edit_cs['tarif_cs']);
	$ket_cs = htmlspecialchars($edit_cs['keterangan_cs']);

	mysqli_query($koneksi,"UPDATE tb_cuci_satuan SET
		nama_cs = '$nama_pkt_cs',
		waktu_kerja_cs = '$waktu_krj_cs',
		kuantitas_cs = '$qty_cs',
		tarif_cs = '$tarif_cs',
		keterangan_cs = '$ket_cs'
		WHERE id_cs = '$id_cs'
	");
	return mysqli_affected_rows($koneksi);
}

function del_cs($del_cs){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM tb_cuci_satuan WHERE id_cs = '$del_cs'");
	return mysqli_affected_rows($koneksi);	
}

// Order
function order_ck($order_ck){
	global $koneksi;

	$nama_pel = htmlspecialchars($order_ck['nama_pel_ck']);
	$no_telp = htmlspecialchars($order_ck['no_telp_ck']);
	$alamat = htmlspecialchars($order_ck['alamat_ck']);
	$jns_pkt = htmlspecialchars($order_ck['jenis_paket_ck']);
	$berat_qty = htmlspecialchars($order_ck['berat_qty_ck']);
	$tgl_masuk = htmlspecialchars($order_ck['tgl_masuk_ck']);
	$tgl_keluar = htmlspecialchars($order_ck['tgl_keluar_ck']);
	$ket = htmlspecialchars($order_ck['keterangan_ck']);

	// Ambil data dari tabel daftar paket cuci komplit
	$pkt_ck = mysqli_query($koneksi,"SELECT * FROM tb_cuci_komplit WHERE nama_paket_ck = '$jns_pkt'");

	if (mysqli_num_rows($pkt_ck) === 1) {

		$result_ck = mysqli_fetch_assoc($pkt_ck);

		$wkt_kerja_ck = $result_ck['waktu_kerja_ck'];
		$tarif_perkilo = $result_ck['tarif_ck'];
		$total_bayar = $berat_qty * $result_ck['tarif_ck'];

		/* Generate nomor order */
		$str = uniqid();
		$limitNum = substr($str, 0,7);
		$orderNum = 'CK-' . strtoupper($limitNum);
	}
	
	$insert_ck = "INSERT INTO tb_order_ck VALUES( 
		'','$orderNum','$nama_pel','$no_telp','$alamat',
		'$jns_pkt','$wkt_kerja_ck','$berat_qty','$tarif_perkilo',
		'$tgl_masuk','$tgl_keluar','$total_bayar',
		'$ket' )";
	mysqli_query($koneksi,$insert_ck);
	return mysqli_affected_rows($koneksi);
}

// Batal/Hapus Daftar Orderan Cuci Komplit
function del_or_ck($or_numb_ck){
	global $koneksi;
	$del_query_ck = "DELETE FROM tb_order_ck WHERE or_ck_number='$or_numb_ck'";
	mysqli_query($koneksi, $del_query_ck);
	return mysqli_affected_rows($koneksi);
}

function order_dc($order_dc){
	global $koneksi;

	$nama_pel_dc = htmlspecialchars($order_dc['nama_pel_dc']);
	$no_telp = htmlspecialchars($order_dc['no_telp_dc']);
	$alamat_dc = htmlspecialchars($order_dc['alamat_dc']);
	$jns_paket = htmlspecialchars($order_dc['jenis_paket_dc']);
	$berat_dc = htmlspecialchars($order_dc['berat_qty_dc']);
	$tgl_msk_dc = htmlspecialchars($order_dc['tgl_masuk_dc']);
	$tgl_kel_dc = htmlspecialchars($order_dc['tgl_keluar_dc']);
	$ket_dc = htmlspecialchars($order_dc['keterangan_dc']);

	$pkt_dc = mysqli_query($koneksi, "SELECT * FROM tb_dry_clean WHERE nama_paket_dc = '$jns_paket'");

	if (mysqli_num_rows($pkt_dc) === 1) {
		$result_dc = mysqli_fetch_assoc($pkt_dc);

		$wkt_kerja_dc = $result_dc['waktu_kerja_dc'];
		$trf_dc = $result_dc['tarif_dc'];
		$tot_bayar_dc = $result_dc['tarif_dc'] * $berat_dc;

		// Generate Nomor Order
		$no_dc = uniqid();
		$limitNum = substr($no_dc, 0,7);
		$orderNum_dc = 'DC-' . strtoupper($limitNum);
	}

	$query_dc = "INSERT INTO tb_order_dc VALUES (
		'','$orderNum_dc','$nama_pel_dc','$no_telp','$alamat_dc','$jns_paket','$wkt_kerja_dc',
		'$berat_dc','$trf_dc','$tgl_msk_dc','$tgl_kel_dc','$tot_bayar_dc','$ket_dc'
	)";

	mysqli_query($koneksi,$query_dc);
	return mysqli_affected_rows($koneksi);

}

// Batal/Hapus Daftar Orderan Cuci Kering
function del_or_dc($or_numb_dc){
	global $koneksi;
	$del_query_dc = "DELETE FROM tb_order_dc WHERE or_dc_number='$or_numb_dc'";
	mysqli_query($koneksi, $del_query_dc);
	return mysqli_affected_rows($koneksi);
}

function order_cs($order_cs){
	global $koneksi;

	$nama_pel_cs = htmlspecialchars($order_cs['nama_pel_cs']);
	$no_telp_cs = htmlspecialchars($order_cs['no_telp_cs']);
	$alamat_cs = htmlspecialchars($order_cs['alamat_cs']);
	$jenis_pkt_cs = htmlspecialchars($order_cs['jenis_paket_cs']);
	$jml_pcs = htmlspecialchars($order_cs['jml_pcs']);
	$tgl_msk_cs = htmlspecialchars($order_cs['tgl_masuk_cs']);
	$tgl_kel_cs = htmlspecialchars($order_cs['tgl_keluar_cs']);
	$ket_cs = htmlspecialchars($order_cs['keterangan_cs']);

	$pkt_cs = mysqli_query($koneksi,"SELECT * FROM tb_cuci_satuan WHERE nama_cs = '$jenis_pkt_cs'");
	if (mysqli_num_rows($pkt_cs) === 1) {
		$result_cs = mysqli_fetch_assoc($pkt_cs);

		$wkt_krj_cs = $result_cs['waktu_kerja_cs'];
		$trf_cs = $result_cs['tarif_cs'];
		$totBayar_cs = $result_cs['tarif_cs'] * $jml_pcs;

		// Generate Nomor Order
		$noCs = uniqid();
		$limitNo_cs = substr($noCs, 0,7);
		$orderNum_cs = 'CS-' . strtoupper($limitNo_cs);
	}

	$query_cs = "INSERT INTO tb_order_cs VALUES (
		'','$orderNum_cs','$nama_pel_cs','$no_telp_cs','$alamat_cs','$jenis_pkt_cs',
		'$wkt_krj_cs','$jml_pcs','$trf_cs','$tgl_msk_cs','$tgl_kel_cs','$totBayar_cs','$ket_cs'
	)";
	mysqli_query($koneksi,$query_cs);
	return mysqli_affected_rows($koneksi);
}

// Batal/Hapus Daftar Orderan Cuci Satuan
function del_or_cs($or_numb_cs){
	global $koneksi;
	$del_query_cs = "DELETE FROM tb_order_cs WHERE or_cs_number='$or_numb_cs'";
	mysqli_query($koneksi, $del_query_cs);
	return mysqli_affected_rows($koneksi);
}

// Hitung total order semua paket
function jmlOrder(){
	$jml_ck = count(query("SELECT * FROM tb_order_ck"));
	$jml_dc = count(query("SELECT * FROM tb_order_dc"));
	$jml_cs = count(query("SELECT * FROM tb_order_cs"));
	$total_order = $jml_ck + $jml_dc + $jml_cs;
	return $total_order;
}

// hitung semua paket yang tersedia
function jmlPaket(){
	$jml_pkt_ck = count(query("SELECT * FROM tb_cuci_komplit"));
	$jml_pkt_cs = count(query("SELECT * FROM tb_cuci_satuan"));
	$jml_pkt_dc = count(query("SELECT * FROM tb_dry_clean"));
	$jmlPkt = $jml_pkt_ck + $jml_pkt_cs + $jml_pkt_dc;
	return $jmlPkt;
}

// fungsi untuk merubah format tanggah
function formatDate($tgl){
	$tgl = explode('-', $tgl);

	if ($tgl[1] == '01') {
		$tgl[1] = "Januari";
	}else if ($tgl[1] == '02') {
		$tgl[1] = "Februari";
	}else if ($tgl[1] == '03') {
		$tgl[1] = "Maret";
	}else if ($tgl[1] == '04') {
		$tgl[1] = "April";
	}else if ($tgl[1] == '05') {
		$tgl[1] = "Mei";
	}else if ($tgl[1] == '06') {
		$tgl[1] = "Juni";
	}else if ($tgl[1] == '07') {
		$tgl[1] = "Juli";
	}else if ($tgl[1] == '08') {
		$tgl[1] = "Agustus";
	}else if ($tgl[1] == '09') {
		$tgl[1] = "September";
	}else if ($tgl[1] == '10') {
		$tgl[1] = "Oktober";
	}else if ($tgl[1] == '11') {
		$tgl[1] = "November";
	}else if ($tgl[1] == '12') {
		$tgl[1] = "Desember";
	}

	$tgl = $tgl[2] . ' ' . $tgl[1] . ' ' .$tgl[0];
	return $tgl;
}

// Transaksi Bayar
function transaksi_ck($trans_ck){
	global $koneksi;

	$or_number = htmlspecialchars($trans_ck['or_number']);
	$pelanggan = htmlspecialchars($trans_ck['pelanggan']);
	$no_telp = htmlspecialchars($trans_ck['no_telp']);
	$alamat = htmlspecialchars($trans_ck['alamat']);
	$jns_paket = htmlspecialchars($trans_ck['j_paket']);
	$wkt_kerja = htmlspecialchars($trans_ck['wkt_kerja']);
	$berat = htmlspecialchars($trans_ck['berat']);
	$h_perkilo = htmlspecialchars($trans_ck['h_perkilo']);
	$tgl_msk = htmlspecialchars(formatDate($trans_ck['tgl_msk']));
	$tgl_klr = htmlspecialchars(formatDate($trans_ck['tgl_klr']));
	$total = htmlspecialchars($trans_ck['total']);
	$keterangan = htmlspecialchars($trans_ck['keterangan']);
	$nominal_bayar = htmlspecialchars($trans_ck['nominal']);

	if ($nominal_bayar < $total) {
		echo "<script>
			alert('Nominal tidak mencukupi');
		</script>";
		return false;
	}

	// Menghitung kembalian
	if ($nominal_bayar > $total) {
		$kembalian = $nominal_bayar - $total;
		$status = "Sukses";
	}else if ($nominal_bayar == $total) {
		$kembalian  = 0;
		$status = "Sukses";
	}

	$query_insert_ck = "INSERT INTO tb_riwayat_ck VALUES (
		'',
		'$or_number',
		'$pelanggan',
		'$no_telp',
		'$alamat',
		'$jns_paket',
		'$wkt_kerja',
		'$berat',
		'$h_perkilo',
		'$tgl_msk',
		'$tgl_klr',
		'$total',
		'$nominal_bayar',
		'$kembalian',
		'$status',
		'$keterangan'
	)";

	mysqli_query($koneksi, $query_insert_ck);
	return mysqli_affected_rows($koneksi);
}

function transaksi_cs($trans_cs){
	global $koneksi;

	$or_number 		= htmlspecialchars($trans_cs['or_number']);
	$pelanggan 		= htmlspecialchars($trans_cs['pelanggan']);
	$no_telp 		= htmlspecialchars($trans_cs['no_telp']);
	$alamat 			= htmlspecialchars($trans_cs['alamat']);
	$jns_paket 		= htmlspecialchars($trans_cs['j_paket']);
	$wkt_kerja 		= htmlspecialchars($trans_cs['wkt_kerja']);
	$jml_pcs 		= htmlspecialchars($trans_cs['jml_pcs']);
	$h_perpcs 		= htmlspecialchars($trans_cs['h_perpcs']);
	$tgl_msk 		= htmlspecialchars(formatDate($trans_cs['tgl_msk']));
	$tgl_klr 		= htmlspecialchars(formatDate($trans_cs['tgl_klr']));
	$total 			= htmlspecialchars($trans_cs['total']);
	$keterangan 	= htmlspecialchars($trans_cs['keterangan']);
	$nominal_bayar = htmlspecialchars($trans_cs['nominal']);

	if ($nominal_bayar < $total) {
		echo "<script>
			alert('Nominal tidak mencukupi');
		</script>";
		return false;
	}

	// Menghitung kembalian
	if ($nominal_bayar > $total) {
		$kembalian = $nominal_bayar - $total;
		$status = "Sukses";
	}else if ($nominal_bayar == $total) {
		$kembalian  = 0;
		$status = "Sukses";
	}

	$query_insert_cs = "INSERT INTO tb_riwayat_cs VALUES (
		'',
		'$or_number',
		'$pelanggan',
		'$no_telp',
		'$alamat',
		'$jns_paket',
		'$wkt_kerja',
		'$jml_pcs',
		'$h_perpcs',
		'$tgl_msk',
		'$tgl_klr',
		'$total',
		'$nominal_bayar',
		'$kembalian',
		'$status',
		'$keterangan'
	)";

	mysqli_query($koneksi, $query_insert_cs);
	return mysqli_affected_rows($koneksi);

}

function transaksi_dc($trans_dc){
	global $koneksi;

	$or_number = htmlspecialchars($trans_dc['or_number']);
	$pelanggan = htmlspecialchars($trans_dc['pelanggan']);
	$no_telp = htmlspecialchars($trans_dc['no_telp']);
	$alamat = htmlspecialchars($trans_dc['alamat']);
	$jns_paket = htmlspecialchars($trans_dc['j_paket']);
	$wkt_kerja = htmlspecialchars($trans_dc['wkt_kerja']);
	$berat = htmlspecialchars($trans_dc['berat']);
	$h_perkilo = htmlspecialchars($trans_dc['h_perkilo']);
	$tgl_msk = htmlspecialchars(formatDate($trans_dc['tgl_msk']));
	$tgl_klr = htmlspecialchars(formatDate($trans_dc['tgl_klr']));
	$total = htmlspecialchars($trans_dc['total']);
	$keterangan = htmlspecialchars($trans_dc['keterangan']);
	$nominal_bayar = htmlspecialchars($trans_dc['nominal']);

	if ($nominal_bayar < $total) {
		echo "<script>
			alert('Nominal tidak mencukupi');
		</script>";
		return false;
	}

	// Menghitung kembalian
	if ($nominal_bayar > $total) {
		$kembalian = $nominal_bayar - $total;
		$status = "Sukses";
	}else if ($nominal_bayar == $total) {
		$kembalian  = 0;
		$status = "Sukses";
	}

	$query_insert_dc = "INSERT INTO tb_riwayat_dc VALUES (
		'',
		'$or_number',
		'$pelanggan',
		'$no_telp',
		'$alamat',
		'$jns_paket',
		'$wkt_kerja',
		'$berat',
		'$h_perkilo',
		'$tgl_msk',
		'$tgl_klr',
		'$total',
		'$nominal_bayar',
		'$kembalian',
		'$status',
		'$keterangan'
	)";

	mysqli_query($koneksi, $query_insert_dc);
	return mysqli_affected_rows($koneksi);
}