<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Show Keluar Masuk Barang
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Home
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Show Data Barang
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="<?= $proyek->NamaBarang ?>" name="Nama Barang" placeholder="Nama Barang" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Keterangan Masuk Keluar</label>
                    <input type="text" class="form-control" value="<?= $proyek->KeteranganMasukKeluar ?>" name="Keterangan Masuk/Keluar" placeholder="Keterangan Masuk/Keluar" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="Jumlah" value="<?= $proyek->jumlah ?>" placeholder="Jumlah" readonly>
                </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" disabled onfocus="this.defaultIndex=this.selectedIndex;" onchange="this.selectedIndex=this.defaultIndex;">
                    <option value="1" <?php if ($proyek->status == 1) echo 'selected' ?>>Dalam Proses</option>
                    <option value="2" <?php if ($proyek->status == 2) echo 'selected' ?>>Selesai</option>
                </select>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <?= $this->endsection() ?>