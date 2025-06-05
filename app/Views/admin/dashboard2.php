<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Data Keluar Masuk Barang
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Home
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Data Barang
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<div class="col-lg-4 col-8">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $dalamproses ?></h3>
            <p>Dalam Proses</p>
        </div>
        <div class="icon">
            <i class="ion ion-link"></i>
        </div>
        <a href="#" class="small-box-footer">Informasi Lebih Lanjut<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-8">
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $selesai ?></h3>
            <p>Selesai</p>
        </div>
        <div class="icon">
            <i class="ion ion-checkmark"></i>
        </div>
        <a href="#" class="small-box-footer">Informasi Lebih Lanjut<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">

            <a href="<?= url_to('adminAddBarang') ?>" class="btn btn-primary btn-sm">Tambah Barang</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Keterangan Masuk Keluar</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php
                    foreach ($datax as $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->nama ?></td>
                            <td>
                                <?php if ($data->ket == 1): ?>
                                    <span class="badge badge-success">Masuk</span>
                                <?php elseif ($data->ket == 2): ?>
                                    <span class="badge badge-danger">Keluar</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $data->jumlah ?></td>
                            <td>
                                <?php if ($data->status == 1): ?>
                                    <span class="badge badge-warning">Dalam Proses</span>
                                <?php elseif ($data->status == 2): ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php endif; ?>
                            </td>
                            </td>
                            <td>
                                <a href="<?= url_to('adminEditBarang', $data->id); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= url_to('adminDeleteBarang', $data->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin menghapus data User ?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <div class="text-center">
        <?= $pager->links() ?>
    </div>
    <!-- /.card -->
</div>
<?= $this->endsection() ?>