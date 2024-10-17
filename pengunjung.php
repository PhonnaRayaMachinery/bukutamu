<?php include "header.php"; ?>

<?php

// uji jika tombol simpan diklik

if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');
// htmlspesialchars agar inputan lebih aman dari injection
    $nama = htmlspecialchars( $_POST['nama'], ENT_QUOTES);
    $instansi = htmlspecialchars( $_POST['instansi'], ENT_QUOTES);
    $alamat = htmlspecialchars( $_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars( $_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars( $_POST['nope'], ENT_QUOTES);

//ini persiapan query simpan data
            $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('', '$tgl', '$nama', '$instansi',
            '$alamat', '$tujuan', '$nope')");


//uji jika simpan data sukses
    if ($simpan) {
        echo "<script>alert('Simpan Data Suksess, Terima Kasih..!');
        document.location='?'</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal!!!');
        document.location='?'</script>";
    }
}

?>



<!--head-->
    <div class="head text-center">
        <img width ="12%" src="assets/img/logo.png">
        <h2 class="text-white">CV Phonna Raya Machinery<br>Buku Tamu Digital</h2>
    </div>
<!--end-->

<!-- body -->
<div class="row mt-2 center-container"> 
    <div class="col-lg-7 mb-3">
        <div class="card shadow bg-gradient-light"> 
            <div class="card-body">
                
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                    </div>
                    <form class="user" method="POST" action="">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="instansi" placeholder="Instansi" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nope" placeholder="Nomor HP" required>
                        </div>
                            <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                            
                                <hr>    
                            </form>
                             <div class="text-center">
                                <a class="small" href="admin.php">CV Phonna Raya Machinery | 2024 - <?=date('Y')?></a>
                             </div>   
            </div>
        </div>
    </div>    

<
        
<!-- end body -->
<?php include "footer.php"; ?>


