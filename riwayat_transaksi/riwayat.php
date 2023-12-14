<?php 
   require_once('../_header.php');
   $query_ck = query("SELECT * FROM tb_riwayat_ck ORDER BY id_ck DESC");
   $query_dc = query("SELECT * FROM tb_riwayat_dc ORDER BY id_dc DESC");
   $query_cs = query("SELECT * FROM tb_riwayat_cs ORDER BY id_cs DESC");
   // var_dump($query_cs);
?>

   <div class="riwayat" class="main-content">
      <div class="container">
			<div class="baris">
            <div class="selamat-datang">
					<div class="col-header">
						<h2 class="judul-md">Daftar Riwayat Transaksi</h2>
					</div>	
				</div>
         </div>

         <div class="baris">
            <div class="col">
               <?php require_once('riwayat_ck/riwayat_ck.php') ?>
            </div>
         </div>

         <div class="baris">
            <div class="col">
               <?php require_once('riwayat_dc/riwayat_dc.php') ?>
            </div>
         </div>

         <div class="baris">
            <div class="col">
               <?php require_once('riwayat_cs/riwayat_cs.php') ?>
            </div>
         </div>
      </div>
   </div>

<?php require_once('../_footer.php') ?>