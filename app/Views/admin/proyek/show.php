<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Show Manajemen Proyek
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Dashboard
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Show Manajemen Proyek
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <div style="position: absolute; top: 30px; right: 20px;">
                <?php
                $today = date('Y-m-d'); // Tanggal hari ini
                $endDate = $proyek->end;

                // Menghitung selisih hari
                $diff = (strtotime($endDate) - strtotime($today)) / (60 * 60 * 24);

                if ($diff > 0) {
                    echo "<span class='badge badge-success'>Sisa $diff hari</span>";
                } elseif ($diff == 0) {
                    echo "<span class='badge badge-warning'>Hari terakhir</span>";
                } else {
                    echo "<span class='badge badge-danger'>Terlambat " . abs($diff) . " hari</span>";
                }
                ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Judul</label>
                    <input type="text" class="form-control" value="<?= $proyek->judul ?>" name="judul" placeholder="Judul" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Instansi</label>
                    <input type="text" class="form-control" value="<?= $proyek->instansi ?>" name="instansi" placeholder="Instansi" readonly>
                </div>
            </div>
            <h3>Person In Charge</h3>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $proyek->nama ?>" placeholder="Nama" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Kontak</label>
                    <input type="number" class="form-control" name="kontak" value="<?= $proyek->kontak ?>" placeholder="Kontak" readonly>
                </div>
            </div>
            <br>
            <h3>Lokasi Klien</h3>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $proyek->alamat ?>" placeholder="Alamat" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Kota</label>
                    <input type="text" class="form-control" name="kota" value="<?= $proyek->kota ?>" placeholder="Kota" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Provinsi</label>
                    <input type="text" class="form-control" name="provinsi" value="<?= $proyek->provinsi ?>" placeholder="Provinsi" readonly>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label>Desc</label>
                <Textarea class="form-control" name="desc" readonly><?= $proyek->desc ?></Textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Start</label>
                    <input type="date" class="form-control" name="start" value="<?= $proyek->start ?>" placeholder="Start" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>End</label>
                    <input type="date" class="form-control" name="end" value="<?= $proyek->end ?>" placeholder="End" readonly>
                </div>

                <div class="form-group col-md-12">
                    <label>Biaya</label>
                    <input type="text" id="biaya" class="form-control" name="biaya" value="<?= $proyek->biaya ?>" placeholder="Biaya" readonly>
                </div>
            </div>
            <div class="form-group">
                <label>Pekerja</label>
                <br>
                <?php foreach ($karyawan as $key => $data) { ?>
                    <?= $data->nip ?> | <?= $data->nama ?>
                    <br>
                <?php } ?>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" disabled onfocus="this.defaultIndex=this.selectedIndex;" onchange="this.selectedIndex=this.defaultIndex;">
                    <option value="1" <?php if ($proyek->status == 1) echo 'selected' ?>>Waiting</option>
                    <option value="2" <?php if ($proyek->status == 2) echo 'selected' ?>>On Progress</option>
                    <option value="3" <?php if ($proyek->status == 3) echo 'selected' ?>>Finished</option>
                </select>
            </div>
            <div class="form-group">
                <label>Dokumen</label>
                <?php if (!empty($proyek->file)) : ?>
                    <embed src="<?= base_url('uploads/' . $proyek->file) ?>" type="application/pdf" width="100%" height="600px" />
                <?php else : ?>
                    <p class="text-danger">Dokumen tidak tersedia.</p>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <?= $this->endsection() ?>