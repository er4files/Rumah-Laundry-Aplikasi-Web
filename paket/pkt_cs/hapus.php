<?php 
   require_once('../../_header.php');
   $id_cs = $_GET['id_cs'];   
?>

<?php if (del_cs($id_cs) > 0) : ?>
   <!-- Statement 1 -->
   <div class="alert">
      <div class="box">
      <img src="<?=url('_assets/img/berhasil.png')?>" height="68" alt="alert sukses">
         <p>Paket Berhasil Di Hapus</p>
         <button onclick="window.location='http://localhost/rumah_laundry/paket/pkt_cs/pkt_cs.php'" class="btn-alert">Ok</button>
      </div>
   </div>
   <?php else :?>
      <!-- Statement 2 -->
      <div class="alert">
         <div class="box">
         <img src="<?=url('_assets/img/gagal.png')?>" height="68" alt="alert gagal">
            <p>Paket Gagal Di Hapus</p>
            <button onclick="window.location='http://localhost/rumah_laundry/paket/pkt_cs/pkt_cs.php'" class="btn-alert">Ok</button>
         </div>
      </div>
<?php endif ?>