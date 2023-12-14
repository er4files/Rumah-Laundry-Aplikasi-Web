<?php require_once('../../_functions.php');
   $nomor_or = $_GET['or_ck_number'];
   $data = query("SELECT * FROM tb_order_ck WHERE or_ck_number = '$nomor_or'")[0];
   // var_dump($data);

?>

<?php if (isset($_POST['bayar'])) { ?>
   <?php if (transaksi_ck($_POST) > 0) : ?>
      <div class="alert">
         <div class="box">
         <img src="<?=url('_assets/img/berhasil.png')?>" height="68" alt="alert sukses">
            <p>Pembayaran Berhasil!</p>
            <button onclick="window.location='http://localhost/rumah_laundry/riwayat_transaksi/riwayat.php'" class="btn-alert btn-success">Ok</button>
         </div>
      </div>
      <?php else :?>
      <div class="alert">
         <div class="box">
         <img src="<?=url('_assets/img/gagal.png')?>" height="68" alt="alert gagal">
            <p>Pembayaran Gagal!</p>
            <a href="<?=url("detail_order/detail_ck/bayar.php?or_ck_number=$nomor_or")?>" class="btn-alert btn-fail">Ok</a>
         </div>
      </div>
   <?php endif ?>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bayar Order <?=$data['or_ck_number']?></title>
   <link rel="stylesheet" href="<?=url('_assets/css/payments.css')?>">
   <link rel="shortcut icon" href="<?=url('_assets/img/logo/favicon.svg')?>" type="image/x-icon">
</head>
<body>

<div class="card-payment">
   <div class="icon-header">
      <img src="<?=url('_assets/img/payment.svg')?>" alt="Icon Payment" width="178">
   </div>

   <div class="txt">
      <h3>#no_order: <?=$data['or_ck_number']?></h3>
      <p>Masukkan nominal untuk melakukan transaksi</p>
   </div>
   <form action="" method="post">
      <input type="hidden" name="or_number" value="<?=$data['or_ck_number']?>">
      <input type="hidden" name="pelanggan" value="<?=$data['nama_pel_ck']?>">
      <input type="hidden" name="no_telp" value="<?=$data['no_telp_ck']?>">
      <input type="hidden" name="alamat" value="<?=$data['alamat_ck']?>">
      <input type="hidden" name="j_paket" value="<?=$data['jenis_paket_ck']?>">
      <input type="hidden" name="wkt_kerja" value="<?=$data['wkt_krj_ck']?>">
      <input type="hidden" name="berat" value="<?=$data['berat_qty_ck']?>">
      <input type="hidden" name="h_perkilo" value="<?=$data['harga_perkilo']?>">
      <input type="hidden" name="tgl_msk" value="<?=$data['tgl_masuk_ck']?>">
      <input type="hidden" name="tgl_klr" value="<?=$data['tgl_keluar_ck']?>">
      <input type="hidden" name="total" value="<?=$data['tot_bayar']?>">
      <input type="hidden" name="keterangan" value="<?=$data['keterangan_ck']?>">

      <input type="text" name="nominal" required autofocus autocomplete="off" placeholder="Nominal ex: '120000'">
      <button type="submit" name="bayar">Bayar</button>
   </form>
</div>
</body>
</html>

