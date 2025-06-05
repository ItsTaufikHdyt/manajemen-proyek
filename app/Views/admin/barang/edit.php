<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Edit Data Masuk/Keluar Barang
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Home
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Edit Data Barang
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
        <form action="<?= url_to('adminUpdateBarang', $barang->id) ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" value="<?= $barang->nama ?>" name="nama" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keterangan Masuk Keluar</label>
                        <select class="form-control" name="ket">
                            <option value="1" <?php if ($barang->ket == 1) echo 'selected'  ?>>Masuk</option>
                            <option value="2" <?php if ($barang->ket == 2) echo 'selected'  ?>>Keluar</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" value="<?= $barang->jumlah ?>" name="jumlah" placeholder="Jumlah" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" <?php if ($barang->status == 1) echo 'selected'  ?>>Dalam Proses</option>
                            <option value="2" <?php if ($barang->status == 2) echo 'selected'  ?>>Selesai</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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
    })
</script>
<?= $this->endsection() ?>