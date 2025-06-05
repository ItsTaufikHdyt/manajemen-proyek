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

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <a href="<?= url_to('adminAddKaryawan') ?>" class="btn btn-primary btn-sm">Tambah Karyawan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php
                    foreach ($datax as $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->nip ?></td>
                            <td><?= $data->nama ?></td>
                            <td>
                                <?php if ($data->jenis_kelamin == 1) { ?>
                                    <span class="badge badge-success">Laki-Laki</span>
                                <?php } elseif ($data->jenis_kelamin == 2) { ?>
                                    <span class="badge badge-warning">Perempuan</span>
                                <?php } ?>
                            </td>
                            <td><?= $data->tgl_lahir ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showData<?= $data->id ?>">
                                <i class="fas fa-eye"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-lg" id="showData<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data Karyawan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table>
                                                    <tr>
                                                        <th>NIP</th>
                                                        <td><?= $data->nip ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td><?= $data->nama ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelamin</th>
                                                        <td><?php if ($data->jenis_kelamin == 1) { ?>
                                                                <span class="badge badge-success">Laki-Laki</span>
                                                            <?php } elseif ($data->jenis_kelamin == 2) { ?>
                                                                <span class="badge badge-warning">Perempuan</span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tampat Lahir</th>
                                                        <td><?= $data->tempat_lahir ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Telpon</th>
                                                        <td><?= $data->telpon ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Agama</th>
                                                        <td><?php if ($data->agama == 1) { ?>
                                                                <span class="badge badge-success">Islam</span>
                                                            <?php } elseif ($data->agama == 2) { ?>
                                                                <span class="badge badge-primary">Kristen</span>
                                                            <?php } elseif ($data->agama == 3) { ?>
                                                                <span class="badge badge-warning">Hindu</span>
                                                            <?php } elseif ($data->agama == 4) { ?>
                                                                <span class="badge badge-danger">Budha</span>
                                                            <?php } elseif ($data->agama == 5) { ?>
                                                                <span class="badge badge-dark">Konghucu</span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status Nikah</th>
                                                        <td><?php if ($data->status_nikah = 1) { ?>
                                                                <span class="badge badge-primary">Belum Nikah</span>
                                                            <?php } elseif ($data->status_nikah = 2) { ?>
                                                                <span class="badge badge-success">Nikah</span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td><?= $data->alamat ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= url_to('adminEditKaryawan', $data->id); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= url_to('adminDeleteKaryawan', $data->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin menghapus data User ?')"><i class="fas fa-trash"></i></a>
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