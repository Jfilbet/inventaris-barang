<?php 
// ambil data untuk edit jika ada
$kodeEdit = $namaEdit = $asalEdit = $jumlahEdit = $satuanEdit = $tanggalEdit = "";

if (isset($_GET['mode']) && $_GET['mode'] == "edit") {
    $id = $_GET['id'];
    $cek = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang='$id'");
    $d = mysqli_fetch_assoc($cek);

    if ($d) {
        $kodeEdit   = $d['kode'];
        $namaEdit   = $d['nama'];
        $asalEdit   = $d['asal'];
        $jumlahEdit = $d['jumlah'];
        $satuanEdit = $d['satuan'];
        $tanggalEdit = $d['tanggal_diterima'];
    }
}
?>

<div class="card shadow-sm mb-3">
    <div class="card-header bg-success text-white">
        Form Data Barang
    </div>

    <div class="card-body">
        <form method="POST">

            <div class="mb-3">
                <label>Kode Barang</label>
                <input type="text" class="form-control" name="kode_barang" value="<?= $kodeEdit ?>">
            </div>

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?= $namaEdit ?>">
            </div>

            <div class="mb-3">
                <label>Asal Barang</label>
                <select class="form-select" name="asal_barang">
                    <option value="<?= $asalEdit ?>"><?= $asalEdit ?></option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Hibah">Hibah</option>
                    <option value="Sumbangan">Sumbangan</option>
                </select>
            </div>

            <div class="row">
                <div class="col">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_barang" value="<?= $jumlahEdit ?>">
                </div>

                <div class="col">
                    <label>Satuan</label>
                    <select class="form-select" name="satuan_barang">
                        <option value="<?= $satuanEdit ?>"><?= $satuanEdit ?></option>
                        <option value="Unit">Unit</option>
                        <option value="Kotak">Kotak</option>
                        <option value="Pcs">Pcs</option>
                    </select>
                </div>

                <div class="col">
                    <label>Tanggal Masuk</label>
                    <input type="date" class="form-control" name="tanggal_masuk" value="<?= $tanggalEdit ?>">
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-success" name="btnSimpan">Simpan</button>
                <button class="btn btn-secondary" type="reset">Bersihkan</button>
            </div>

        </form>
    </div>
</div>
