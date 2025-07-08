<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Warga</title>
    <style>
        body { font-family: Arial; background: #eee; }
        .form-container {
            max-width: 400px; margin: 50px auto; background: #fff; padding: 30px;
            border-radius: 10px; box-shadow: 0 0 10px #ccc;
        }
        input, select, textarea {
            width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;
        }
        button { width: 100%; background: #007bff; color: white; padding: 10px; border: none; border-radius: 5px; }
        a { display: block; text-align: center; margin-top: 10px; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Data Warga</h2>
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="no_kk" placeholder="Nomor KK" required>
            <input type="text" name="nik" placeholder="NIK" required>
            <textarea name="alamat" placeholder="Alamat" required></textarea>
            <select name="status" required>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Anggota Keluarga">Anggota Keluarga</option>
            </select>
            <input type="number" name="iuran" placeholder="Iuran (Rp)" min="0" required>
            <button type="submit" name="simpan">Simpan</button>
        </form>
        <a href="index.php">← Kembali</a>

        <?php
        if (isset($_POST['simpan'])) {
            $nama   = $_POST['nama'];
            $kk     = $_POST['no_kk'];
            $nik    = $_POST['nik'];
            $alamat = $_POST['alamat'];
            $status = $_POST['status'];
            $iuran  = $_POST['iuran'];

            mysqli_query($koneksi, "INSERT INTO warga (nama, no_kk, nik, alamat, status, iuran)
            VALUES ('$nama','$kk','$nik','$alamat','$status','$iuran')");

            echo "<script>window.location='index.php';</script>";
        }
        ?>
    </div>
</body>
</html>
