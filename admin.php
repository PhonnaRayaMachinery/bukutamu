<?php include "header.php"; ?>
    <div class="head text-center">
        <img width ="10%" src="assets/img/logo.png">
        <h2 class="text-white">CV Phonna Raya Machinery<br>Buku Tamu Digital</h2>
    </div>
<!--end-->

<!-- body -->


<div class="center-container">
<div class="col-lg-5 mb-3 " >
        <div class="card shadow "> 
            <div class="card-body">
            <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                    </div>
                    <?php
                    // deklarasi tanggal

                    // menampilkan tanggal sekarang
                    $tgl_sekarang = date('Y-m-d');

                    // menampilkan tanggal kemarin
                    $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));


                    // mendapatkan tanggal dan waktu saat ini
                    $sekarang = date('Y-m-d H:i:s');

                    // menampilkan tanggal sekarang
 
                    //persiapan  query tampilkan jumlah data pengunjung

                    $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                    "SELECT count(*) FROM ttamu where tanggal like '%$tgl_sekarang%'"));
                    
                    $kemarin = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                    "SELECT count(*) FROM ttamu where tanggal like '%$kemarin%'"));
                  

                    $bulan_ini = date('m');
                    $sebulan = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                   "SELECT COUNT(*) FROM ttamu WHERE MONTH(tanggal) = '$bulan_ini'"));
                    
                   $keseluruhan = mysqli_fetch_array(mysqli_query(
                    $koneksi, 
                  "SELECT COUNT(*) FROM ttamu "));
                

                    ?>

                    <table class="table table-bordered">
                        <tr>
                            <td>Hari ini</td>
                            <td>: <?= $tgl_sekarang[0]?></td>
                        </tr>
                        <tr>
                            <td>Kemarin</td>
                            <td>: <?= $kemarin[0]?></td>
                        </tr>

                        <tr>
                            <td>Bulan ini</td>
                            <td>: <?= $sebulan[0]?></td>
                        </tr>
                        <tr>
                            <td>Keseluruhan</td>
                            <td>: <?= $keseluruhan[0]?></td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>  
    </div>
  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari ini [<?=date('d-m-Y')?>]</h6>
                        </div>
                        <div class="card-body text-center">
                            <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table"></i> Rekapitulasi Pengunjung</a>
                            <a href="pengunjung.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambahkan Data</a>
                            <a href="logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt"></i> Logout</a>


                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Instansi</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>Nomor HP</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Instansi</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>Nomor HP</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $tgl = date('Y-m-d'); 
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal like '%$tgl%' order by id desc");
                                            $no = 1 ;

                                            while($data = mysqli_fetch_array($tampil)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <th><?=$data['tanggal']?></th>
                                            <td><?=$data['nama']?>l</td>
                                            <td><?=$data['instansi']?></td>
                                            <td><?=$data['alamat']?></td>
                                            <td><?=$data['tujuan']?></td>
                                            <td><?=$data['nope']?></td>
                                        </tr>
                                        <?php }?>            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   

<!-- end body -->


<?php include "footer.php"; ?>