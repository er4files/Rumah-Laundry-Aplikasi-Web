<?php 
   require_once('../_header.php'); 
   $data_ck = query("SELECT * FROM tb_cuci_komplit");
?>

<?php if (isset($_POST['order_ck'])) : ?>
   <?php if (order_ck($_POST) > 0) :?>
      <div class="alert">
      <div class="box">
         <img src="<?=url('_assets/img/berhasil.png')?>" height="68" alt="alert sukses">
            <p>Order Berhasil Di Tambahkan</p>
            <button onclick="window.location='http://localhost/rumah_laundry/'" class="btn-alert">Ok</button>
         </div>
      </div>
   <?php else : ?>
      <div class="alert">
         <div class="box">
            <img src="<?=url('_assets/img/gagal.png')?>" height="68" alt="alert gagal">
            <p>Order Gagal Di Tambahkan</p>
            <button onclick="window.location='http://localhost/rumah_laundry/'" class="btn-alert">Ok</button>
         </div>
      </div>
   <?php endif ?>
<?php endif ?>

   <div id="order_ck" class="main-content">
      <div class="container">
         <div class="baris">
            <div class="col mt-2">
               <div class="card">
                  <div class="card-title card-flex">
                     <div class="card-col">
                        <h2>Cuci Komplit</h2>
                     </div>

                     <div class="card-col txt-right">
                        <a href="<?=url('order/order.php')?>" class="btn-xs bg-primary">Kembali</a>
                     </div>
                  </div>

                  <div class="card-body">
                     <form action="" method="post">
                        <div class="row-input">
                           <div class="col-form m-1">
                              <div class="form-grup">
                                 <label for="nama">Nama Pelanggan</label>
                                 <input type="text" name="nama_pel_ck" placeholder="Nama lengkap" autocomplete="off" id="nama">
                              </div>

                              <div class="form-grup">
                                 <label for="no-telp">Nomor Telepon</label>
                                 <input type="text" name="no_telp_ck" placeholder="Nomor Telepon" autocomplete="off" id="no-telp">
                              </div>

                              <div class="form-grup">
                                 <label for="alamat">Alamat</label>
                                 <textarea name="alamat_ck" rows="4" id="alamat"></textarea>
                              </div>
                           </div>

                           <div class="col-form m-1">
                              <div class="form-grup">
                                 <label for="pilih_paket">Pilih Paket</label>
                                 <select name="jenis_paket_ck" id="pilih_paket">
                                    <option>-- Pilih Jenis Paket --</option>
                                       <?php foreach ($data_ck as $ck) : ?>
                                       <option><?=$ck['nama_paket_ck']?></option>
                                       <?php endforeach ?>
                                    </select>
                              </div>

                              <div class="form-grup">
                                 <label for="kuantitas">Berat (Kg)</label>
                                 <input type="number" name="berat_qty_ck" placeholder="Berat (Kg)" autocomplete="off" id="kuantitas">
                              </div>

                              <div class="form-grup">
                                 <label for="tgl_order_msk">Tanggal Order Masuk</label>
                                 <input type="date" name="tgl_masuk_ck" autocomplete="off" id="tgl_order_msk">
                              </div>

                              <div class="form-grup">
                                 <label for="tgl_order_klr">Tanggal Order Keluar</label>
                                 <input type="date" name="tgl_keluar_ck" autocomplete="off" id="tgl_order_klr">
                              </div>

                              <div class="form-grup">
                                 <label for="ket">Keterangan</label>
                                 <textarea name="keterangan_ck" rows="4" id="ket"></textarea>
                              </div>
                           </div>
                        </div>
                        
                        <div class="form-footer">
                           <div class="buttons">
                              <button type="submit" name="order_ck" class="btn-sm bg-primary">Pesan</button>
                              <button type="reset" class="btn-sm bg-transparent">Batal</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php require_once('../_footer.php') ?>