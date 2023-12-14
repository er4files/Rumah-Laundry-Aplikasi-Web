<?php
   require_once('../../_functions.php');
   $id_dc = $_GET['id_dc'];
   $data = query("SELECT * FROM tb_riwayat_dc WHERE id_dc = '$id_dc'")[0];
   // var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Invoice <?= $data['or_number'];?></title>
   <link rel="shortcut icon" href="<?=url('_assets/img/logo/favicon.svg')?>" type="image/x-icon">
   <link rel="stylesheet" href="<?=url('_assets/css/invoice.css')?>">
</head>
<body>
      <div class="invoice">
         <div class="invoice-content">
            <div class="invoice-header">
               <div class="logo">
                  <img src="<?=url('_assets/img/logo/logo.png')?>" width="145" alt="Logo rumah laundry">
               </div>
               <div class="invoice-no_order">
                  <span>Invoice number : <?=$data['or_number']?></span>
               </div>
            </div>

            <h4 style="text-align: center; color:#4d4d4d;">Bukti Transaksi</h4>

            <div class="invoice-body">
               <table class="table-invoice">
                  <tr>
                     <th>Nama pelanggan</th>
                     <td><?=$data['pelanggan']?></td>
                  </tr>
                  <tr>
                     <th>Nomor telepon</th>
                     <td><?=$data['no_telp']?></td>
                  </tr>
                  <tr>
                     <th>Alamat</th>
                     <td><?=$data['alamat']?></td>
                  </tr>
               </table>

               <table class="table-invoice">
                  <tr>
                     <th>Tanggal order</th>
                     <td><?=$data['tgl_msk']?></td>
                  </tr>
                  <tr>
                     <th>Diambil pada</th>
                     <td><?=$data['tgl_klr']?></td>
                  </tr>
               </table>

               <table class="tb_byr">
                  <tr>
                     <th class="tb_heading">Jenis paket</th>
                     <th class="tb_heading">Berat (Kg)</th>
                     <th class="tb_heading">Harga Per-kilo</th>
                  </tr>
                  <tr>
                     <td><?=$data['j_paket']?></td>
                     <td><?=$data['berat'] . " Kg"?></td>
                     <td><?="Rp. " . $data['h_perkilo'] . " x " . $data['berat']?></td>
                  </tr>
                  <tr>
                     <th colspan="2" class="ub">Total</th>
                     <td class="ub-col"><?="Rp. " . $data['total']?></td>
                  </tr>
                  <tr>
                     <th colspan="2" class="ub">Nominal Bayar</th>
                     <td class="ub-col"><?="Rp. " . $data['nominal_byr']?></td>
                  </tr>
                  <tr>
                     <th colspan="2" class="ub">Uang kembali</th>
                     <td class="ub-col"><?="Rp. " . $data['kembalian']?></td>
                  </tr>
               </table>

               <div class="ket">
                  <p><span>Keterangan : </span><?=$data['keterangan']?></p>
               </div>

               <div class="invoice-footer">
                  <h3 class="foot_logo"><span>Rumah</span> Laundry</h3>
                  <p>Terima kasih telah menggunakan jasa kami.</p>
               </div>

            </div>
         </div>

         <div class="printbtn" id="btnPrint">
            <img src="<?=url('_assets/img/printer.svg')?>" width="48" alt="print icon">
            <span>Cetak Invoice</span>
         </div>

         <a href="<?=url('riwayat_transaksi/riwayat.php')?>" class="btn-back">Kembali</a>
      </div>

      <script>
         let print = document.getElementById('btnPrint');
         print.addEventListener('click', function(){
            return window.print();
         });
      </script>
</body>
</html>