<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>PST|BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Form Pengajuan Izin</h1>
        <p>Form untuk mengajukan izin keluar kantor di hari kerja</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form Pencatatan Pengunjung PST</h3>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-thumbs-up"></i> Success!</h5>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            <div class="row">

                <?php $errors =  session()->getFlashdata('errors'); ?>
                <div class="tile-body col-md-6">
                    <form action="<?= base_url('/update' . $pst->id); ?>" method="post" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control <?= isset($errors['nama']) ? 'is-invalid' : null; ?>" id="nama" type="text" name="nama" value="<?= old('nama', $pst->nama); ?>" placeholder="Isikan Nama Lengkap">
                            <div class="invalid-feedback">
                                <?= isset($errors['nama']) ? $errors['nama'] : null; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDate">Tanggal</label>
                            <input class="form-control <?= isset($errors['tanggal']) ? 'is-invalid' : null; ?>" id="inputDate" type="text" value="<?= old('tanggal', $pst->tanggal); ?>" name="tanggal" placeholder="Select Date">

                            <div class="invalid-feedback">
                                <?= isset($errors['tanggal']) ? $errors['tanggal'] : null; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <?php foreach ($jenis_kelamin as $value) : ?>
                                <div class="form-check">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input <?= isset($errors['jenis_kelamin']) ? 'is-invalid' : null; ?>" type="radio" name="jenis_kelamin" id="Radio<?= $value->id; ?>" value="<?= $value->id; ?>" <?= old('jenis_kelamin', $pst->jenis_kelamin) == $value->id ? 'checked' : null ?>>
                                        <label class="form-check-label" for="Radio<?= $value->id; ?>"><?= $value->jenis_kelamin; ?></label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="invalid-feedback">
                                <?= isset($errors['instansi']) ? $errors['instansi'] : null; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control <?= isset($errors['email']) ? 'is-invalid' : null; ?>" type="email" id="email" value="<?= old('email', $pst->email); ?>" name="email" placeholder="Isikan Email">
                            <div class="invalid-feedback">
                                <?= isset($errors['email']) ? $errors['email'] : null; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_lahir">Tahun Lahir</label>
                            <input class="form-control <?= isset($errors['tahun_lahir']) ? 'is-invalid' : null; ?>" type="text" value="<?= old('tahun_lahir', $pst->tahun_lahir); ?>" id="tahun_lahir" name="tahun_lahir">
                            <div class="invalid-feedback">
                                <?= isset($errors['tahun_lahir']) ? $errors['tahun_lahir'] : null; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input class="form-control <?= isset($errors['umur']) ? 'is-invalid' : null; ?>" type="number" value="<?= old('umur', $pst->umur); ?>" id="umur" name="umur">
                            <div class="invalid-feedback">
                                <?= isset($errors['umur']) ? $errors['umur'] : null; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : null; ?>" rows="4" name="alamat"><?= old('alamat', $pst->alamat); ?></textarea>
                            <div class="invalid-feedback">
                                <?= isset($errors['alamat']) ? $errors['alamat'] : null; ?>
                            </div>
                        </div>
                </div>
                <div class="tile-body col-md-6">
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan Terakhir</label>
                        <select class="form-control <?= isset($errors['pendidikan']) ? 'is-invalid' : null; ?>" name="pendidikan" id="pendidikan">
                            <option value="" hidden></option>
                            <?php foreach ($pendidikan as $value) : ?>
                                <option value="<?= $value->id; ?>" <?= old('pendidikan', $pst->pendidikan) == $value->id ? 'selected' : null ?>>
                                    <?= $value->pendidikan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($errors['pendidikan']) ? $errors['pendidikan'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select class="form-control <?= isset($errors['pekerjaan']) ? 'is-invalid' : null; ?>" name="pekerjaan" id="pekerjaan">
                            <option value="" hidden></option>
                            <?php foreach ($pekerjaan as $value) : ?>
                                <option value="<?= $value->id; ?>" <?= old('pekerjaan', $pst->pekerjaan) == $value->id ? 'selected' : null ?>>
                                    <?= $value->pekerjaan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($errors['pekerjaan']) ? $errors['pekerjaan'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instansi">Nama Instansi</label>
                        <input class="form-control <?= isset($errors['instansi']) ? 'is-invalid' : null; ?>" type="text" name="instansi" value="<?= old('instansi', $pst->instansi); ?>" id="instansi" placeholder="Isikan Nama Instansi">
                        <div class="invalid-feedback">
                            <?= isset($errors['instansi']) ? $errors['instansi'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pemanfaatan_data">Pemanfaatan Hasil Kunjungan</label>
                        <select class="form-control <?= isset($errors['pemanfaatan']) ? 'is-invalid' : null; ?>" name="pemanfaatan_data" id="pemanfaatan_data">
                            <option value="" hidden></option>
                            <?php foreach ($pemanfaatan as $value) : ?>
                                <option value="<?= $value->id; ?>" <?= old('pemanfaatan_data', $pst->pemanfaatan_data) == $value->id ? 'selected' : null ?>>
                                    <?= $value->pemanfaatan_data; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($errors['pemanfaatan_data']) ? $errors['pemanfaatan_data'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="layanan">Layanan Yang Diterima</label>
                        <select class="form-control <?= isset($errors['layanan']) ? 'is-invalid' : null; ?>" name="layanan" id="layanan">
                            <option value="" hidden></option>
                            <?php foreach ($layanan as $value) : ?>
                                <option value="<?= $value->id; ?>" <?= old('layanan', $pst->layanan) == $value->id ? 'selected' : null ?>>
                                    <?= $value->layanan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($errors['layanan']) ? $errors['layanan'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="data">Data Yang Diinginkan</label>
                        <input class="form-control <?= isset($errors['data']) ? 'is-invalid' : null; ?>" value="<?= old('data', $pst->data); ?>" type="text" name="data" id="data" placeholder="Isikan Data Yang Diinginkan Lengkap">
                        <div class="invalid-feedback">
                            <?= isset($errors['data']) ? $errors['data'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Saran/Pengaduan Untuk PST BPS Kabupaten Demak</label>
                        <textarea class="form-control <?= isset($errors['saran']) ? 'is-invalid' : null; ?>" rows="4" name="saran" placeholder="Isikan Saran Untuk Kami"><?= old('saran', $pst->saran); ?></textarea>
                        <div class="invalid-feedback">
                            <?= isset($errors['saran']) ? $errors['saran'] : null; ?>
                        </div>
                    </div>

                    <!--Radio Button Markup-->
                    <div class="form-group">
                        <label class="control-label">Tingkat Kepuasan Pelayanan</label>
                        <div class="form-check">
                            <?php foreach ($kepuasan as $value) : ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?= isset($errors['kepuasan']) ? 'is-invalid' : null; ?>" type="radio" name="kepuasan" id="inlineRadio<?= $value->id; ?>" value="<?= $value->id; ?>" <?= old('kepuasan', $pst->kepuasan) == $value->id ? 'checked' : null ?>>
                                    <label class="form-check-label" for="inlineRadio<?= $value->id; ?>"><?= $value->kepuasan; ?></label>
                                </div>
                            <?php endforeach; ?>
                            <div class="invalid-feedback">
                                <?= isset($errors['kepuasan']) ? $errors['kepuasan'] : null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?= base_url(); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>