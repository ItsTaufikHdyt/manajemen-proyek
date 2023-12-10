<?= $this->extend('vendor/admin/layouts') ?>
<?= $this->section('h1') ?>
Dashboard Manajemen Proyek
<?= $this->endsection() ?>
<?= $this->section('h2') ?>
Dashboard
<?= $this->endsection() ?>
<?= $this->section('h3') ?>
Manajemen Proyek
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<div class="col-lg-4 col-8">
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $waiting ?></h3>
            <p>Waiting</p>
        </div>
        <div class="icon">
            <i class="ion ion-flash"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-8">
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $onprogress ?></h3>
            <p>On Progress</p>
        </div>
        <div class="icon">
            <i class="ion ion-link"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-8">
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $finished ?></h3>
            <p>Finished</p>
        </div>
        <div class="icon">
            <i class="ion ion-checkmark"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">

            <a href="<?= url_to('adminAddProyek') ?>" class="btn btn-primary btn-sm">Add Proyek</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Instansi</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Biaya</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php
                    foreach ($datax as $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->judul ?></td>
                            <td><?= $data->instansi ?></td>
                            <td><?= $data->start ?></td>
                            <td><?= $data->end ?></td>
                            <td>
                                <?php
                                echo "Rp " . number_format($data->biaya, 2, ',', '.');
                                ?>
                            </td>
                            <td>
                                <a href="<?= url_to('adminShowProyek', $data->id); ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="<?= url_to('adminEditProyek', $data->id); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= url_to('adminPdfProyek', $data->id); ?>" target="_blank" class="btn btn-warning"><i class="fas fa-file-pdf"></i></a>
                                <a href="<?= url_to('adminDeleteProyek', $data->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin menghapus data User ?')"><i class="fas fa-trash"></i></a>
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