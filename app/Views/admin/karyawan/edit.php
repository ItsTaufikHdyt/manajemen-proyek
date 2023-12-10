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
    <!-- general form elements -->
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
        <form action="<?= url_to('adminUpdateKaryawan',$karyawan->id) ?>" method="post" >
            <?= csrf_field(); ?>
            <div class="card-body">
            <div class="form-group">
                    <label>NIP</label>
                    <input type="number" class="form-control" name="nip" value="<?= $karyawan->nip ?>" placeholder="NIP" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama"  value="<?= $karyawan->nama ?>" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="1" <?php if ($karyawan->jenis_kelamin == 1) echo 'selected'  ?>>Laki-Laki</option>
                        <option value="2" <?php if ($karyawan->jenis_kelamin == 2) echo 'selected'  ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="<?= $karyawan->tempat_lahir ?>" placeholder="Tempat Lahir" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="<?= $karyawan->tgl_lahir ?>" placeholder="Tanggal Lahir" required>
                </div>
                <div class="form-group">
                    <label>Telpon</label>
                    <input type="text" class="form-control" name="telpon" value="<?= $karyawan->telpon ?>" placeholder="Telpon" required>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="agama">
                        <option value="1" <?php if ($karyawan->agama == 1) echo 'selected'  ?>>Islam</option>
                        <option value="2" <?php if ($karyawan->agama == 2) echo 'selected'  ?>>Kristen</option>
                        <option value="3" <?php if ($karyawan->agama == 3) echo 'selected'  ?>>Hindu</option>
                        <option value="4" <?php if ($karyawan->agama == 4) echo 'selected'  ?>>Budha</option>
                        <option value="5" <?php if ($karyawan->agama == 5) echo 'selected'  ?>>Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Nikah</label>
                    <select class="form-control" name="status_nikah">
                        <option value="1" <?php if ($karyawan->status_nikah == 1) echo 'selected'  ?>>Belum Nikah</option>
                        <option value="2" <?php if ($karyawan->status_nikah == 2) echo 'selected'  ?>>Nikah</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <Textarea class="form-control" name="alamat" required><?= $karyawan->alamat ?></Textarea>
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