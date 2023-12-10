<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Karyawan
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Karyawan
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Karyawan Report
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
        <form action="<?= url_to('adminStoreKaryawan') ?>" method="post" >
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="number" class="form-control" name="nip" placeholder="NIP" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                </div>
                <div class="form-group">
                    <label>Telpon</label>
                    <input type="text" class="form-control" name="telpon" placeholder="Telpon" required>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="agama">
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Hindu</option>
                        <option value="4">Budha</option>
                        <option value="5">Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Nikah</label>
                    <select class="form-control" name="status_nikah">
                        <option value="1">Belum Nikah</option>
                        <option value="2">Nikah</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <Textarea class="form-control" name="alamat" required></Textarea>
                </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<?= $this->endsection() ?>