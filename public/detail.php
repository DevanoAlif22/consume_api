<?php 

require '../api/api.php';


if(!$_GET['id'] || !is_numeric($_GET['id'])) {
    
    // Pindahkan ke index.php
    header('Location: index.php');
    exit();
}

$result = getId($_GET['id']);

if($result == false) {
    echo '<script>alert("Data tidak di temukan");</script>';
    echo '<script>';
    // echo 'setTimeout(function(){';
    echo '  window.location.href = "index.php";';
    // echo '}, 1000);';  // Delay selama 1 detik
    echo '</script>';

    exit();
}
?>

<?php foreach ($result['result'] as $data) : ?>
    <p>Nama : <?php echo $data['nama'] ?></p>
    <p>NPM : <?php echo $data['npm'] ?></p>
    <p>Jenis Kelamin : <?php echo $data['kelamin'] ?></p>
<?php endforeach ?>