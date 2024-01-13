<?php

require '../api/api.php';

if(!$_GET['id']){
    echo '<script>alert("Data tidak ditemukan");</script>';
    echo '<script>';
    echo '  window.location.href = "index.php";';
    echo '</script>';
    exit();
} 

$result = getId($_GET['id']);

if(isset($_POST['addButton'])) {
    $data = array();
    $data['id'] = (int) $_POST['id'];
    $data['nama'] = $_POST['nama'];
    $data['npm'] = $_POST['npm'];
    $data['kelamin'] = $_POST['kelamin'];

    $result = editData($data);

    if($result == false) {
        echo '<script>alert("Gagal mengedit data");</script>';
        echo '<script>';
        // echo 'setTimeout(function(){';
        echo '  window.location.href = "edit.php";';
        // echo '}, 1000);';  // Delay selama 1 detik
        echo '</script>';

        exit();
    } else {
        echo '<script>alert("Berhasil mengedit data");</script>';
        echo '<script>';
        // echo 'setTimeout(function(){';
        echo '  window.location.href = "index.php";';
        // echo '}, 1000);';  // Delay selama 1 detik
        echo '</script>';

        exit();
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <form action="" method="post">
            <?php foreach ($result['result'] as $data) : ?>
                <p>Nama : </p>
                <input required value="<?php echo  $data['nama']?>" type="text" name="nama" id="">
                <p>NPM : </p>
                <input required value="<?php echo $data['npm']?>" type="text" name="npm" id="">
                <p>Jenis Kelamin : </p>
                <input required value="<?php echo $data['kelamin']?>" type="text" name="kelamin" id="">
                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                <button name="addButton" type="submit">Kirim</button>
                <?php endforeach ?>
            </form>
    
</body>
</html