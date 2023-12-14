<?php 
   require_once('../../_header.php'); 
   $id_cs = $_GET['id_cs'];
   $data_cs = query("SELECT * FROM tb_cuci_satuan WHERE id_cs = '$id_cs'")[0];
   var_dump($data_cs);   
?>
   
   <?php if (isset($_POST['ubah'])) : ?>
      <?php if (edit_cs($_POST) > 0) : ?>
         <!-- Statement 1 -->
         <div class="alert">
				<div class="box">
            <img src="<?=url('_assets/img/berhasil.png')?>" height="68" alt="alert sukses">
					<p>Paket Berhasil Di Ubah</p>
					<button onclick="window.location='http://localhost/rumah_laundry/paket/pkt_cs/pkt_cs.php'" class="btn-alert">Ok</button>
				</div>
         </div>
         <?php else :?>   
         <!-- Statement 2 -->
         <div class="alert">
            <div class="box">
            <img src="<?=url('_assets/img/gagal.png')?>" height="68" alt="alert gagal">
               <p>Paket Gagal Di Ubah</p>
               <button onclick="window.location='http://localhost/rumah_laundry/paket/pkt_cs/pkt_cs.php'" class="btn-alert">Ok</button>
            </div>
         </div>
      <?php endif ?>
   <?php endif ?>

   <div id="edit_cs" class="main-content">
      <div class="container">
         <div class="baris">
            <div class="col mt-2">
               <div class="card">
                  <div class="card-title card-flex">
                     <div class="card-col">
                        <h2>Ubah Paket</h2>	
                     </div>
                     <div class="card-col txt-right">
                        <a href="<?=url('paket/pkt_cs/pkt_cs.php')?>" class="btn-xs bg-primary">Kembali</a>
                     </div>
                  </div>

                  <div class="card-body">
                     <form action="" method="post" class="form-input">
                     <input type="hidden" name="id_cs" value="<?=$data_cs['id_cs']?>">
                        <div class="form-grup">
                           <label for="nama">Nama Paket</label>
                           <input type="text" name="nama_cs" placeholder="Nama paket" value="<?=$data_cs['nama_cs']?>" autocomplete="off" id="nama" required>
                        </div>

                        <div class="form-grup">
                           <label for="wk">Waktu Kerja</label>
                           <input type="text" name="waktu_kerja_cs" placeholder="Durasi Kerja" value="<?=$data_cs['waktu_kerja_cs']?>" autocomplete="off" id="wk" required>
                        </div>

                        <div class="form-grup">
                           <label for="berat">Berat Min (Kg)</label>
                           <input type="text" name="kuantitas_cs" placeholder="Berat per-Kg" value="<?=$data_cs['kuantitas_cs']?>" autocomplete="off" id="berat" required>
                        </div>

                        <div class="form-grup">
                           <label for="tarif">Tarif</label>
                           <input type="text" name="tarif_cs" placeholder="Harga Paket" value="<?=$data_cs['tarif_cs']?>" autocomplete="off" id="tarif" required>
                        </div>

                        <div class="form-grup">
                           <label for="ket_cs">Keterangan</label>
                           <input type="text" name="keterangan_cs" value="<?=$data_cs['keterangan_cs']?>" placeholder="Keterangan (optional)" autocomplete="off" id="ket_cs">
                        </div>

                        <div class="form-grup ">
                           <button type="submit" class="mt-1" name="ubah">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php require_once('../../_footer.php') ?>