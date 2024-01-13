<?php 

require_once '../api/api.php';

$result = getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="add.php">Tambah</a>
<?php if (!empty($result['result'])): ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result['result'] as $data): ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['npm']; ?></td>
                    <td><?php echo $data['kelamin']; ?></td>
                    <td><a href="detail.php?id=<?php echo $data['id']; ?>">Buka</a> <a href="delete.php?id=<?php echo $data['id']; ?>">Hapus</a> <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Tidak ada data dari API.</p>
<?php endif; ?>

</body>
</html>