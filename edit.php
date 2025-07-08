<?php
include "koneksi.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM warga WHERE id='$id'");
$d = mysqli_fetch_array($query);

if (!$d) {
    echo "Data tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Warga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            margin: 0;
            padding: 40px 0;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container input,
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 6px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .btn-update {
            background-color: #28a745;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Warga</h2>
        <form method="POST">
            <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']) ?>" required>
            <input type="text" name="no_kk" value="<?= htmlspecialchars($d['no_kk']) ?>" required>
            <input type="text" name="nik" value="<?= htmlspecialchars($d['nik']) ?>" required>
            <textarea name="alamat" required><?= htmlspecialchars($d['alamat']) ?></textarea>
            <select name="status" required>
                <option value="Kepala Keluarga" <?= ($d['status'] == "Kepala Keluarga") ? "selected" : "" ?>>Kepala Keluarga</option>
                <option value="Anggota Keluarga" <?= ($d['status'] == "Anggota Keluarga") ? "selected" : "" ?>>Anggota Keluarga</option>
            </select>
            <input type="number" name="iuran" value="<?= htmlspecialchars($d['iuran']) ?>" min="0" required>
            <button type="submit" name="update" class="btn-update">Update</button>
        </form>
        <a href="index.php" class="back-link">← Kembali</a>

        <?php
        if (isset($_POST['update'])) {
            $nama   = $_POST['nama'];
            $kk     = $_POST['no_kk'];
            $nik    = $_POST['nik'];
            $alamat = $_POST['alamat'];
            $status = $_POST['status'];
            $iuran  = $_POST['iuran'];

            mysqli_query($koneksi, "UPDATE warga SET 
                nama='$nama', no_kk='$kk', nik='$nik', alamat='$alamat', status='$status', iuran='$iuran' 
                WHERE id='$id'");

            echo "<script>window.location='index.php';</script>";
        }
        ?>
    </div>
</body>
</html>
