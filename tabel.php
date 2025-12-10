<?php
$keyword = "";

if (isset($_POST['btnCari'])) {
    $keyword = $_POST['keyword'];
}
if (isset($_POST['btnReset'])) {
    $keyword = "";
}
?>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        Data Barang
    </div>

    <div class="card-body">

        <form method="POST" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari kode / nama" value="<?= $keyword ?>">
                <button class="btn btn-dark" name="btnCari">Cari</button>
                <button class="btn btn-danger" name="btnReset">Reset</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <tr class="text-center">
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Asal</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;

            $sql = "SELECT * FROM tbarang";

            if ($keyword != "") {
                $sql .= " WHERE kode LIKE '%$keyword%' OR nama LIKE '%$keyword%'";
            }

            $sql .= " ORDER BY id_barang DESC";

            $data = mysqli_query($koneksi, $sql);

            while ($d = mysqli_fetch_assoc($data)) :
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['kode'] ?></td>
                <td><?= $d['nama'] ?></td>
                <td><?= $d['asal'] ?></td>
                <td><?= $d['jumlah'] ?></td>
                <td><?= $d['satuan'] ?></td>
                <td><?= $d['tanggal_diterima'] ?></td>
                <td>
                    <a href="index.php?mode=edit&id=<?= $d['id_barang'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?mode=hapus&id=<?= $d['id_barang'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>

        </table>

    </div>
</div>
