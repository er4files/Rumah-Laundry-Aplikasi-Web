<div class="col">
   <div class="card">
      <div class="card-title card-flex">
         <div class="card-col">
            <h2>Order Satuan</h2>	
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
                     <th class="sticky">Jml Barang</th>
                     <th class="sticky">Action</th>
                  </tr>
               </thead>

               <tbody>
                  <?php $cuci_satuan = query('SELECT * FROM tb_order_cs ORDER BY id_order_cs DESC');
                     if (!empty($cuci_satuan)) : ?>
                        <?php
                           $no_cs = 1;
                           foreach($cuci_satuan as $cs) : ?>
                              <tr>
                                 <td><?= $no_cs ?></td>
                                 <td><?= $cs['or_cs_number'] ?></td>
                                 <td><?= $cs['tgl_masuk_cs'] ?></td>
                                 <td><?= $cs['nama_pel_cs'] ?></td>
                                 <td><?= $cs['jenis_paket_cs'] ?></td>
                                 <td><?= $cs['wkt_krj_cs'] ?></td>
                                 <td><?= $cs['jml_pcs'] ?></td>
                                 <td>
                                    <a href="<?=url('detail_order/detail_cs/detail_order_cs.php?or_cs_number=')?><?=$cs['or_cs_number']?>" class="btn btn-detail">Detail</a>

                                    <a href="<?=url('daftar_order/hapus_cs.php?or_cs_number=')?><?=$cs['or_cs_number']?>" onclick="return confirm('Yakin akan menghapus?');" class="btn btn-hapus">Hapus</a>
                                 </td>
                              </tr>
                           <?php $no_cs++ ?>
                        <?php endforeach; ?>
                        
                        <?php else : ?>
                           <tr>
                              <td colspan="8" class="txt-center">Data Tidak Tersedia</td>
                           </tr>
                     <?php endif; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>