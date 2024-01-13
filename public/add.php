<?php 

require '../api/api.php';

if(isset($_POST['addButton'])) {
    $data = array();
    $data['nama'] = $_POST['nama'];
    $data['npm'] = $_POST['npm'];
    $data['kelamin'] = $_POST['kelamin'];

    $result = addData($data);

    if($result == false) {
        echo '<script>alert("Gagal menambahkan data");</script>';
        echo '<script>';
        // echo 'setTimeout(function(){';
        echo '  window.location.href = "add.php";';
        // echo '}, 1000);';  // Delay selama 1 detik
        echo '</script>';

        exit();
    } else {
        echo '<script>alert("Berhasil menambahkan data");</script>';
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
        <p>Nama : </p>
        <input required type="text" name="nama" id="">
        <p>NPM : </p>
        <input required type="text" name="npm" id="">
        <p>Jenis Kelamin : </p>
        <input required type="text" name="kelamin" id="">
        <button name="addButton" type="submit">Kirim</button>
    </form>
</body>
</html>