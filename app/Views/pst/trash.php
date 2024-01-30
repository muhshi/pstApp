<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Report Pengunjung PST | BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Manajemen User</h1>
        <p>Pengelolaan User</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Report Pengunjung PST BPS Kabupaten Demak</h3>
            <div class="tile-body col-md-12">
                <div class="card-body">

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="fa fa-thumbs-up"></i> Success!</h5>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="row" style="margin-bottom: 10px;">

                        <div class="col-md-12   " style="text-align: right;">
                            <a type="button" class="btn btn-success" href="<?= base_url('pst/restore'); ?>"><i class="fa fa-recycle"></i> Restore All</a>
                            <form action="<?= site_url("pst/delete2"); ?>" onsubmit="return confirm('Yakin mau di delete permanent?')" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete All</button>
                            </form>
                        </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Tanggal</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
                                <th>Instansi</th>
                                <th>Layanan</th>
                                <th>Data</th>
                                <th>Kepuasan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pst as $value) : ?>
                                <tr>
                                    <td><?= $value->nama; ?></td>
                                    <td><?= $value->tanggal; ?></td>
                                    <td> <?= $value->jenis_kelamin; ?></td>
                                    <td><?= $value->umur; ?></td>
                                    <td><?= $value->pendidikan; ?></td>
                                    <td><?= $value->pekerjaan; ?></td>
                                    <td> <?= $value->instansi; ?></td>
                                    <td> <?= $value->layanan; ?></td>
                                    <td> <?= $value->data; ?></td>
                                    <td> <?= $value->kepuasan; ?></td>
                                    <td>
                                        <a href="<?= base_url('pst//restore/' . $value->id); ?>" class="btn btn-success"><span class="fa fa-recycle"></span> </a>
                                        <form action="<?= base_url("groups/delete2/" . $value->id); ?>" method="post" class="d-inline" onsubmit=" return confirm('Yakin Hapus data secara permanen?')">
                                            <?= csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="tile-footer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>