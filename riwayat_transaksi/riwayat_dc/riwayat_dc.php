<div class="card">
   <div class="card-title card-flex">
      <div class="card-col">
         <h2>Daftar Transaksi - Dry Clean</h2>	
      </div>
   </div>
   
   <div class="card-body">
      <div class="tabel-kontainer">
         <table class="tabel-transaksi">
            <thead>
               <tr>
                  <th class="sticky">No</th>
                  <th class="sticky">No. Order</th>
                  <th class="sticky" width="10%">Nama</th>
                  <th class="sticky">Jenis Paket</th>
                  <th class="sticky">Jumlah</th>
                  <th class="sticky">Total</th>
                  <th class="sticky">Uang Bayar</th>
                  <th class="sticky">Kembalian</th>
                  <th class="sticky">Status</th>
                  <th class="sticky" style="text-align: center">Action</th>
               </tr>
            </thead>

            <tbody>
               <?php if (!empty($query_dc)) : ?>
                  <?php $i = 1; 
                     foreach($query_dc as $data_dc) : ?>
                     <tr>
                        <td><?=$i?></td>
                        <td><?=$data_dc['or_number']?></td>
                        <td style="max-width: 150px; overflow:hidden;"><?=$data_dc['pelanggan']?></td>
                        <td><?=$data_dc['j_paket']?></td>
                        <td><?=$data_dc['berat'] . " Kg"?></td>
                        <td><?="Rp. " . $data_dc['total']?></td>
                        <td><?="Rp. " . $data_dc['nominal_byr']?></td>
                        <td><?="Rp. " . $data_dc['kembalian']?></td>
                        <td><span class="success"><?=$data_dc['status']?></span></td>
                        <td align="center">
                           <a href="<?=url('riwayat_transaksi/riwayat_dc/detail_dc.php')?>?id_dc=<?=$data_dc['id_dc']?>" class="btn btn-edit">Detail</a><br/>
                           <a href="<?=url('riwayat_transaksi/riwayat_dc/cetak_info.php')?>?id_dc=<?=$data_dc['id_dc']?>" class="btn btn-hapus">Cetak Bukti</a>
                        </td>
                     </tr>
                     <?php $i++?>
                  <?php endforeach ?>

                  <?php else : ?>
                     <tr>
                        <td colspan="10" class="txt-center">Data tidak tersedia</td>
                     </tr>
               <?php endif ?>
            </tbody>
         </table>
      </div>
   </div>
</div>