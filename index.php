<?php 
	require_once('_header.php'); 
	if (isset($_SESSION['login']) == '') {
		header("Location: login.php");
		exit();
	}
	$jml_karyawan = count(query('SELECT * FROM master LIMIT 20 OFFSET 1'));
?>

	<div id="main" class="main-content">
		<div class="container">
			<div class="baris">
				<div class="selamat-datang">
					<div class="col-header">
						<p class="judul-sm">Selamat Datang <span><?= ucfirst($_SESSION['master']) ?></span></p>
						<h2 class="judul-md">Dashboard</h2>
					</div>

					<div class="col-header txt-right">
						<a href="<?=url('order/order.php')?>" class="btn-lg bg-primary">+ Order Baru</a>
					</div>	
				</div>
			</div>

			<div class="baris">
				<div class="col col-4">
					<div class="card">
						<div class="card-body">
							<div class="card-panel">
								<div class="panel-header">
									<p>Jumlah Karyawan</p>
									<h2><?= $jml_karyawan ?></h2>
								</div>
								<div class="panel-icon">
									<img src="<?=url('_assets/img/team.png')?>" alt="karyawan" height="48">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col col-4">
					<div class="card">
						<div class="card-body">
							<div class="card-panel">
								<div class="panel-header">
									<p>Total Order</p>
									<h2><?= jmlOrder(); ?></h2>
								</div>
								
								<div class="panel-icon">
									<img src="<?=url('_assets/img/total_order.png')?>" alt="order" height="48">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col col-4">
					<div class="card">
						<div class="card-body">
							<div class="card-panel">
								<div class="panel-header">
									<p>Jumlah Paket Tersedia</p>
									<h2><?= jmlPaket(); ?></h2>
								</div>

								<div class="panel-icon">
									<img src="<?=url('_assets/img/jumlah_paket.png')?>" alt="paket" height="48">
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<!-- Daftar Order Cuci Komplit -->
			<div class="baris">
				<?php require_once('daftar_order/daf_or_ck.php');?>
			</div>

			<!-- Daftar Order Cuci Kering/Dry Clean -->
			<div class="baris">
				<?php require_once('daftar_order/daf_or_dc.php');?>
			</div>

			<!-- Daftar Order Cuci Satuan -->
			<div class="baris">
				<?php require_once('daftar_order/daf_or_cs.php');?>
			</div>

		</div>
	</div>

<?php require_once('_footer.php'); ?>