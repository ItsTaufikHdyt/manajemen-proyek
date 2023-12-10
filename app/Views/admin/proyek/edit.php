<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Edit Dashboard Manajemen Proyek
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Dashboard
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Edit Manajemen Proyek
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<div class="col-md-12">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card card-primary">
        <div class="card-header">
        </div>
        <form action="<?= url_to('adminUpdateProyek', $proyek->id) ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Judul</label>
                        <input type="text" class="form-control" value="<?= $proyek->judul ?>" name="judul" placeholder="Judul" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Instansi</label>
                        <input type="text" class="form-control" name="instansi" value="<?= $proyek->instansi ?>" placeholder="Instansi" required>
                    </div>
                </div>
                <h3>Person In Charge</h3>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $proyek->nama ?>" placeholder="Nama" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kontak</label>
                        <input type="number" class="form-control" name="kontak" value="<?= $proyek->kontak ?>" placeholder="Kontak" required>
                    </div>
                </div>
                <br>
                <h3>Lokasi Klien</h3>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $proyek->alamat ?>" placeholder="Alamat" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kota</label>
                        <input type="text" class="form-control" name="kota" value="<?= $proyek->kota ?>" placeholder="Kota" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" value="<?= $proyek->provinsi ?>" placeholder="Provinsi" required>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Desc</label>
                    <Textarea class="form-control" name="desc" required><?= $proyek->desc ?></Textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Start</label>
                        <input type="date" class="form-control" name="start" value="<?= $proyek->start ?>" placeholder="Start" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>End</label>
                        <input type="date" class="form-control" name="end" value="<?= $proyek->end ?>" placeholder="End" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Biaya</label>
                        <input type="text" id="biaya" class="form-control" name="biaya" value="<?= $proyek->biaya ?>" placeholder="Biaya" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Pekerja</label>
                    <select class="form-control" id="karyawan" name="karyawan[]" multiple="multiple">
                        <?php foreach ($karyawan as $data) { ?>
                            <option value="<?= $data->id ?>" <?php foreach ($karyawan_proyek as $data1) { ?> 
                                <?php if($data1->id_karyawan == $data->id) {echo 'selected';} ?>
                                <?php } ?>>
                                <?= $data->nip ?> | <?= $data->nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" <?php if ($proyek->status == 1) echo 'selected' ?>>Waiting</option>
                        <option value="2" <?php if ($proyek->status == 2) echo 'selected' ?>>On Progress</option>
                        <option value="3" <?php if ($proyek->status == 3) echo 'selected' ?>>Finished</option>
                    </select>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary  btn-lg btn-block">Submit</button>
                </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<?= $this->endsection() ?>
<?= $this->section('custom_scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#karyawan').select2();
    });
    $(document).ready(function() {

        // Format mata uang.
        $('#biaya').mask('#.##0', {
            reverse: true
        });

    })
</script>
<?= $this->endsection() ?>