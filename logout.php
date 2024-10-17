<?php

session_start();

unset($_SESSION['id_user']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);
unset($_SESSION['username']);

session_destroy();
echo "<script type='text/javascript'>
alert('Anda telah keluar dari halaman admin...');
document.location.href = 'index.html';
</script>";
?>