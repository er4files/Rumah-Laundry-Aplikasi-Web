<div class="col">
   <div class="card">
      <div class="card-title card-flex">
         <div class="card-col">
            <h2>Order Cuci Komplit</h2>	
         </div>
      </div>

      <div class="card-body">
         <div class="tabel-kontainer">
            <table class="tabel-transaksi">
               <thead>
                  <tr>
                     <th class="sticky">No</th>
                     <th class="sticky">No.Order</th>
                     <th class="sticky">Tgl Order</th>
                     <th class="sticky">Nama Pelanggan</th>
                     <th class="sticky">Jenis Paket</th>
                     <th class="sticky">Waktu Kerja</th>
                     <th class="sticky">Berat (Kg)</th>
                     <th class="sticky">Action</th>
                  </tr>
               </thead>

               <tbody>
                  <?php $cuci_komplit = query('SELECT * FROM tb_order_ck ORDER BY id_order_ck DESC'); 
                     if (!empty($cuci_komplit)) :?>
                     <?php 
                        $no_ck = 1;
                        foreach($cuci_komplit as $ck) : ?>
                        <tr>
                           <td><?= $no_ck; ?></td>
                           <td><?= $ck['or_ck_number'] ?></td>
                           <td><?= $ck['tgl_masuk_ck'] ?></td>
                           <td><?= $ck['nama_pel_ck'] ?></td>
                           <td><?= $ck['jenis_paket_ck'] ?></td>
                           <td><?= $ck['wkt_krj_ck'] ?></td>
                           <td><?= $ck['berat_qty_ck'] . ' Kg' ?></td>
                           <td>
                              <a href="<?=url('detail_order/detail_ck/detail_order_ck.php?or_ck_number=')?><?=$ck['or_ck_number']?>" class="btn btn-detail">Detail</a>

                              <a href="<?=url('daftar_order/hapus_ck.php?or_ck_number=')?><?=$ck['or_ck_number']?>" onclick="return confirm('Yakin akan menghapus?');" class="btn btn-hapus">Hapus</a>
                           </td>
                        </tr>
                        <?php $no_ck++ ?>
                     <?php endforeach; ?>
                     <?php else : ?>
                        <tr>
                           <td colspan="8" class="txt-center">Data Tidak Tersedia</td>
                        </tr>
                  <?php endif?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>