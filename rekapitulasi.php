<?php include "header.php";?>
<!-- awal row-->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Pengunjung</h6>
            </div>
            <div class="card-body"> 
                <form method="POST" action="" class="text-center">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input class="form-control" type="date" 
                                name="tanggal1" value="<?= isset($_POST['tanggal1'])? $_POST['tanggal1']: 
                                date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input class="form-control" type="date" 
                                name="tanggal2" value="<?= isset($_POST['tanggal2'])? $_POST['tanggal2']: 
                                date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <button class="btn btn-primary form-control" 
                            name="bttampilkan"><i class="fa fa-search"></i> Tampilkan</button>
                        </div>
                        <div class="col-md-2">
                            <a href="admin.php" class="btn btn-danger form-control">
                            <i class="fa fa-backward"></i> Kembali</a>
                        </div>
                    </div>
                </form>

                <?php
                // Proses hapus data
                if (isset($_POST['bthapus'])) {
                    $id_hapus = $_POST['id_hapus'];

                    // Query untuk menghapus data dari database
                    $hapus = mysqli_query($koneksi, "DELETE FROM ttamu WHERE id = '$id_hapus'");

                    if ($hapus) {
                        echo "<script>alert('Data berhasil dihapus!'); window.location='rekapitulasi.php';</script>";
                    } else {
                        echo "<script>alert('Data gagal dihapus!');</script>";
                    }
                }
                ?>



                <?php
                    if(isset($_POST['bttampilkan'])) :

                ?>
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
                                          
                                          $tgl1 = $_POST['tanggal1'];
                                          $tgl2 = $_POST['tanggal2'];


                                        $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu 
                                        where tanggal BETWEEN '$tgl1' and '$tgl2' order by id desc");
                                        $no = 1 ;

                                            while($data = mysqli_fetch_array($tampil)){
                                        ?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?=$data['tanggal']?></th>
                                            <td><?=$data['nama']?>l</td>
                                            <td><?=$data['instansi']?></td>
                                            <td><?=$data['alamat']?></td>
                                            <td><?=$data['tujuan']?></td>
                                            <td><?=$data['nope']?></td>
                                            <td>
                                                <!-- Tombol Hapus -->
                                                <form method="POST" action="" style="display:inline;">
                                                    <input type="hidden" name="id_hapus" value="<?=$data['id']?>">
                                                    <button type="submit" class="btn btn-danger" name="bthapus">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php }?>            
                                    </tbody>
                                </table>

                                <center>
                                    <form method="POST" action="exportexcel.php">
                                        <div class="col-md-4">

                                        <input type="hidden" name="tanggala" 
                                        value="<?= @$_POST['tanggal1']?>">

                                        <input type="hidden" name="tanggalb" 
                                        value="<?= @$_POST['tanggal2']?>">

                                        <button class="btn btn-success form-control" 
                                        name="bexport"><i class="fa fa-download"></i>Export Data Excel</button>

                                        </div>
                                        

                                    </form>
                                </center>

                            </div>
                            <?php endif; ?>
            </div>      
        </div>         
    </div>
</div>


 <!-- akhir row-->







<?php include "footer.php";?>