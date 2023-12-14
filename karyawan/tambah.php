<?php require_once('../_header.php') ?>

	<?php if (isset($_POST['tambah_karyawan'])) : ?>
		<?php if (add_kary($_POST) > 0) : ?>
			<!-- Statement 1 -->
			<div class="alert">
				<div class="box">
				<img src="<?=url('_assets/img/berhasil.png')?>" height="68" alt="alert sukses">
					<p>Data Berhasil Di Tambahkan</p>
					<button onclick="window.location='http://localhost/rumah_laundry/karyawan/karyawan.php'" class="btn-alert">Ok</button>
				</div>
			</div>
			<?php else : ?>
			<!-- statement 2 -->
			<div class="alert">
				<div class="box">
				<img src="<?=url('_assets/img/gagal.png')?>" height="68" alt="alert gagal">
					<p>Data Gagal Di Tambahkan</p>
					<button onclick="window.location='http://localhost/rumah_laundry/karyawan/karyawan.php'" class="btn-alert">Ok</button>
				</div>
			</div>
		<?php endif ?>
	<?php endif ?>
	
	<div id="tambah_karyawan" class="main-content">
		<div class="container">
			<div class="baris">
				<div class="col mt-2">
					<div class="card">
						<div class="card-title card-flex">
							<div class="card-col">
								<h2>Tambah Data Karyawan</h2>	
							</div>
							<div class="card-col txt-right">
								<a href="<?=url('karyawan/karyawan.php')?>" class="btn-xs bg-primary">Kembali</a>
							</div>
						</div>

						<div class="card-body">
							<form action="" method="post" class="form-input">
								<input type="hidden" name="level" value="Karyawan">
								<div class="form-grup">
									<label for="nama">Nama Karyawan</label>
									<input type="text" name="nama" placeholder="Nama lengkap" autocomplete="off" id="nama" required autofocus>
								</div>

								<div class="form-grup">
									<label for="username">Username</label>
									<input type="text" name="username" placeholder="Username" autocomplete="off" id="username" required>
								</div>

								<div class="form-grup">
									<label for="email">Email</label>
									<input type="text" name="email" placeholder="Email" autocomplete="off" id="email" required>
								</div>

								<div class="form-grup">
									<label for="password">Password</label>
									<input type="password" name="password" placeholder="password" autocomplete="off" id="password" required>
								</div>

								<div class="form-grup ">
									<button type="submit" class="mt-1" name="tambah_karyawan">Tambah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require_once('../_footer.php') ?>