<?php
include "koneksi.php";

// SIMPAN / EDIT DATA
if (isset($_POST['btnSimpan'])) {

    $kode   = $_POST['kode_barang'];
    $nama   = $_POST['nama_barang'];
    $asal   = $_POST['asal_barang'];
    $jumlah = $_POST['jumlah_barang'];
    $satuan = $_POST['satuan_barang'];
    $tanggal = $_POST['tanggal_masuk'];

    // Validasi input kosong
    if ($kode == "" || $nama == "" || $asal == "" || $jumlah == "" || $satuan == "" || $tanggal == "") {
        echo "<script>alert('Semua data harus diisi!');</script>";
    }
    else {

        // Mode edit
        if (isset($_GET['mode']) && $_GET['mode'] == "edit") {

            $id = $_GET['id'];

            $update = mysqli_query($koneksi,
                "UPDATE tbarang SET
                kode='$kode', nama='$nama', asal='$asal',
                jumlah='$jumlah', satuan='$satuan', tanggal_diterima='$tanggal'
                WHERE id_barang='$id'"
            );

            if ($update) {
                echo "<script>alert('Data berhasil diperbarui');window.location='index.php';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui data');</script>";
            }

        }
        // Mode tambah baru
        else {

            $simpan = mysqli_query($koneksi,
                "INSERT INTO tbarang(kode,nama,asal,jumlah,satuan,tanggal_diterima)
                VALUES('$kode','$nama','$asal','$jumlah','$satuan','$tanggal')"
            );

            if ($simpan) {
                echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan data');</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventaris Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-4 mb-4">

    <h3 class="text-center fw-bold">Inventaris Barang</h3>
    <h3 class="text-center text-muted" style="margin-top:-8px;">Kantor Jonathan</h3>

    <?php include "form.php"; ?>

    <?php include "tabel.php"; ?>

</div>
</body>
</html>
