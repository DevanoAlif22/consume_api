<?php 

require_once '../api/api.php';

if(!$_GET['id'] || !is_numeric($_GET['id'])) {
    echo '<script>alert("Gagal menghapus data!");</script>';
    
} else {

    $result = deleteData($_GET['id']);
    if($result == true) {
        echo '<script>alert("Berhasil menghapus data!");</script>';
    } else {
        echo '<script>alert("Gagal menghapus data!");</script>';

    }
}
echo '<script>';
// echo 'setTimeout(function(){';
echo '  window.location.href = "index.php";';
// echo '}, 1000);';  // Delay selama 1 detik
echo '</script>';

exit();

?>