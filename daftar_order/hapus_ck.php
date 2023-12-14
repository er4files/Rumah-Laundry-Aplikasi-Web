<?php 
	require_once('../_header.php');
	$ck_number = $_GET['or_ck_number'];
?>

<?php if (del_or_ck($ck_number) > 0) : ?>
	<!-- Statement 1 -->
	<div class="alert">
		<div class="box">
		<img src="<?=url('_assets/img/berhasil.png')?>" height="68" alt="alert sukses">
			<p>Data Berhasil Di Hapus</p>
			<button onclick="window.location='http://localhost/rumah_laundry/'" class="btn-alert">Ok</button>
		</div>
	</div>
	<?php else : ?>
		<!-- Statement 2 -->
		<div class="alert">
			<div class="box">
			<img src="<?=url('_assets/img/gagal.png')?>" height="68" alt="alert gagal">
				<p>Data Gagal Di Hapus</p>
				<button onclick="window.location='http://localhost/rumah_laundry/'" class="btn-alert">Ok</button>
			</div>
		</div>
<?php endif ?>