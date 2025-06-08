<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Add Dashboard Manajemen Proyek
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Dashboard
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Add Manajemen Proyek
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
        <form action="<?= url_to('adminStoreProyek') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Instansi</label>
                        <input type="text" class="form-control" name="instansi" placeholder="Instansi" required>
                    </div>
                </div>
                <h3>Person In Charge</h3>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kontak</label>
                        <input type="number" class="form-control" name="kontak" placeholder="Kontak" required>
                    </div>
                </div>
                <br>
                <h3>Lokasi Klien</h3>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kota</label>
                        <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Desc</label>
                    <Textarea class="form-control" name="desc" required></Textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Start</label>
                        <input type="date" class="form-control" name="start" placeholder="Start" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>End</label>
                        <input type="date" class="form-control" name="end" placeholder="End" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Biaya</label>
                        <input type="text" id="biaya" class="form-control" name="biaya" placeholder="Biaya" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Pekerja</label>
                    <select class="form-control" id="karyawan" name="karyawan[]" multiple="multiple">
                        <?php foreach ($datax as $data) { ?>
                            <option value="<?= $data->id ?>"><?= $data->nip ?> | <?= $data->nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Waiting</option>
                        <option value="2">On Progress</option>
                        <option value="3">Finished</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dokumen <font color="red">*pdf | 2 mb</font></label>
                    <input type="file" class="form-control" name="file">
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