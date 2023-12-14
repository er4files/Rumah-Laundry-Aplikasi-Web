<?php 
   require_once('../../_header.php'); 
   $no_ck = $_GET['or_ck_number'];
   $data = query("SELECT * FROM tb_order_ck WHERE or_ck_number = '$no_ck'")[0];
?>

<?php if (isset($_POST['bayar_ck'])) : ?>
   <script>
      window.location="http://localhost/rumah_laundry/detail_order/detail_ck/bayar.php?or_ck_number=<?=$no_ck?>"
   </script>
<?php endif ?>

   <div id="detail_or_ck" class="main-content">
      <div class="container">
         <div class="baris">
            <div class="col mt-2">
               <div class="card-md">
                  <div class="card-title card-flex">
                     <div class="card-col">
                        <h2>Detail Order</h2>	
                     </div>

                     <div class="card-col txt-right">
                        <h3 class="no-order"><small>No Order : </small><?= $data['or_ck_number']?></h3>	
                     </div>
                  </div>

                  <div class="card-body">
                     <form action="" method="post">
                        <input type="hidden" name="or_ck_number" value="<?=$data['or_ck_number']?>">
                        <div class="jdl-or">
                           <h4>Customer</h4>
                        </div>
                        <table class="tb-detail_customer">   
                           <tr>
                              <th>Nama</th>
                              <td><input type="text" name="nama_pel_ck" disabled value="<?=$data['nama_pel_ck']?>"></td>
                           </tr>

                           <tr>
                              <th>Nomor Telepon</th>
                              <td><input type="text" name="no_telp_ck" disabled value="<?=$data['no_telp_ck']?>"></td>
                           </tr>

                           <tr>
                              <th>Alamat</th>
                              <td>
                                 <textarea name="alamat_ck" disabled class="txt-area">
                                    <?=$data['alamat_ck']?>
                                 </textarea>
                              </td>
                           </tr>

                           <tr>
                              <th>Order Masuk</th>
                              <td><input type="text" name="tgl_masuk_ck" disabled value="<?=$data['tgl_masuk_ck']?>"></td>
                           </tr>

                           <tr>
                              <th>Diambil Pada</th>
                              <td><input type="text" name="tgl_keluar_ck" disabled value="<?=$data['tgl_keluar_ck']?>"></td>
                           </tr>
                           
                           <tr>
                              <th>Durasi Kerja</th>
                              <td><input type="text" name="wkt_krj_ck" disabled value="<?=$data['wkt_krj_ck']?>"></td>
                           </tr>

                           <tr>
                              <th>Jenis Paket</th>
                              <td><input type="text" name="jenis_paket_ck" disabled value="<?=$data['jenis_paket_ck']?>"></td>
                           </tr>
                        </table>

                        <div class="mt-1"></div>
                        
                        <div class="jdl-or">
                           <h4>Order</h4>
                        </div>
                        
                        <table class="tb-detail_order">   
                           <tr>
                              <th>Berat (Kg)</th>
                              <th>Harga Per-Kg</th>
                              <th>Total Bayar</th>
                           </tr>

                           <tr>
                              <td><input type="text" name="berat_qty_ck" disabled value="<?=$data['berat_qty_ck'] . ' Kg'?>"></td>
                              <td><input type="text" name="harga_perkilo" disabled value="<?= 'Rp. ' . $data['harga_perkilo']?>"></td>
                              <td><input type="text" name="tot_bayar" disabled value="<?= 'Rp. ' . $data['tot_bayar']?>"></td>
                           </tr>
                        </table>

                        <div class="details">
                           <h4 class="mb-01">Keterangan:</h4>
                           <p class="lead">
                              <textarea name="keterangan_ck" disabled class="txt-area">
                                 <?=$data['keterangan_ck']?>
                              </textarea>
                           </p>
                        </div>

                        <div class="form-footer_detail">
                           <div class="buttons">
                              <button type="submit" name="bayar_ck" class="btn-sm bg-primary">Bayar Sekarang</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php require_once('../../_footer.php') ?>