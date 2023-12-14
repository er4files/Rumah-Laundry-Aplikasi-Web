<?php 
   require_once('../../_header.php');
   $data_dc = query('SELECT * FROM tb_dry_clean'); 
?>

   <div id="pkt_ck" class="main-content">
		<div class="container">
			<div class="baris">
				<div class="selamat-datang">
					<div class="col-header">
						<h2 class="judul-md">Paket Dry Clean</h2>
               </div>
               
					<div class="col-header txt-right">
						<a href="<?=url('paket/pkt_dc/tambah.php')?>" class="btn-lg bg-primary">+ Tambah Paket</a>
					</div>	
				</div>
			</div>

			<div class="baris">
				<div class="col">
					<div class="card">
						<div class="card-title card-flex">
							<div class="card-col">
								<h2>Daftar Paket Tersedia</h2>	
							</div>

							<div class="card-col txt-right">
								<a href="<?=url('paket/paket.php')?>" class="btn-xs bg-primary">Kembali</a>
							</div>
						</div>

						<div class="card-body">
							<div class="tabel-kontainer">
								<table class="tabel-transaksi">
									<thead>
										<tr>
											<th class="sticky">No</th>
											<th class="sticky">Nama Paket</th>
											<th class="sticky">Waktu Kerja</th>
											<th class="sticky">Berat Min (Kg)</th>
											<th class="sticky">Tarif</th>
											<th class="sticky">Action</th>
										</tr>
									</thead>

									<tbody>

										<?php $no = 1; ?>
										<?php foreach($data_dc as $dc) : ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $dc['nama_paket_dc'] ?></td>
												<td><?= $dc['waktu_kerja_dc'] ?></td>
												<td><?= $dc['kuantitas_dc'] . ' Kg' ?></td>
												<td><?= $dc['tarif_dc'] ?></td>
												<td>
													<a href="<?=url('paket/pkt_dc/edit.php')?>?id_dc=<?=$dc['id_dc']?>" class="btn btn-edit">Edit</a>
													<a href="<?=url('paket/pkt_dc/hapus.php')?>?id_dc=<?=$dc['id_dc']?>" onclick="return confirm('Yakin akan menghapus?');"  class="btn btn-hapus">Hapus</a>
												</td>
											</tr>
											<?php $no++ ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require_once('../../_footer.php') ?>