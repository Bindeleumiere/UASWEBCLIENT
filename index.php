<?php
include "koneksi.php";

$cari = $_GET['cari'] ?? '';
$query = "SELECT * FROM warga";
if ($cari != '') {
    $query .= " WHERE nama LIKE '%$cari%'";
}
$data = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Warga RT</title>
    <style>
        body { font-family: Arial; background: #eee; }
        .container { width: 90%; max-width: 900px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        h2 { text-align: center; margin-bottom: 20px; }
        .top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        input[type="text"] { padding: 5px; width: 200px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background: #007bff; color: white; }
        a.btn { padding: 6px 12px; text-decoration: none; color: white; border-radius: 5px; font-size: 13px; }
        .edit { background: #007bff; }
        .hapus { background: #dc3545; }
        .tambah { background: #007bff; }
        .cari-btn { background: #28a745; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Warga RT</h2>
        <div class="top">
            <a href="tambah.php" class="btn tambah">+ Tambah Warga</a>
            <form method="GET" style="display:flex; gap:5px;">
                <input type="text" name="cari" placeholder="Cari nama..." value="<?= htmlspecialchars($cari) ?>">
                <button type="submit" class="btn cari-btn">Cari</button>
            </form>
        </div>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Iuran (Rp)</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($d = mysqli_fetch_array($data)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($d['nama']) ?></td>
                <td><?= htmlspecialchars($d['nik']) ?></td>
                <td><?= htmlspecialchars($d['alamat']) ?></td>
                <td><?= htmlspecialchars($d['status']) ?></td>
                <td><?= number_format($d['iuran']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $d['id'] ?>" class="btn edit">Edit</a>
                    <a href="hapus.php?id=<?= $d['id'] ?>" class="btn hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
