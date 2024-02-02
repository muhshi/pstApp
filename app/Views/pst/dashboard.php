<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Dashboard|BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Laporan Hasil Kunjungan Tahun <?= $tahun; ?></h1>
        <p>Laporan berupa grafik hasil kunjungan PST</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a>Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="widget-small primary coloured-icon">
            <div style="padding: 10px;">
                <h1> Laporan Hasil Kunjungan Tahun <?= $tahun; ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h5>Pengunjung Tahun <?= $tahun; ?></h5>
                <p><b><?= countData($tahun); ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
                <h5>Kepuasan Tahun <?= $tahun; ?></h5>
                <p><b><?= kepuasanAvg($tahun); ?>/4</b></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="widget-small primary coloured-icon">
            <div style="padding: 10px;">
                <h1>
                    Laporan Hasil Kunjungan Triwulan <?= current_url(true)->getSegment(4); ?>
                    Tahun
                    <a type="button" class="btn <?= (current_url(true)->getSegment(2) == "2023") ?  'btn-primary' : 'btn-outline-light'; ?>" href="<?= base_url('/dashboard/2023/1'); ?>"> 2023</a>
                    <a type="button" class="btn <?= (current_url(true)->getSegment(2) == "2024") ?  'btn-primary' : 'btn-outline-light'; ?>" href="<?= base_url('/dashboard/2024/1'); ?>"> 2024</a>
                    <a type="button" class="btn <?= (current_url(true)->getSegment(2) == "2025") ?  'btn-primary' : 'btn-outline-light'; ?>" href="<?= base_url('/dashboard/2025/1'); ?>"> 2025</a>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="tile-footer" style="margin-bottom: 10px;">
    <div class="widget-small primary coloured-icon">
        <div style="padding: 10px;">
            <a class="btn <?= (current_url(true)->getSegment(3) == "1") ? 'btn-primary' : 'btn-outline-primary' ?>" href="/dashboard/<?= $tahun; ?>/1"><i class="fa fa-fw fa-lg fa-check-circle"></i>Triwulan I</a>&nbsp;&nbsp;&nbsp;
            <a class="btn <?= (current_url(true)->getSegment(3) == "2") ? 'btn-primary' : 'btn-outline-primary' ?>" href="/dashboard/<?= $tahun; ?>/2"><i class="fa fa-fw fa-lg fa-check-circle"></i>Triwulan II</a>&nbsp;&nbsp;&nbsp;
            <a class="btn <?= (current_url(true)->getSegment(3) == "3") ? 'btn-primary' : 'btn-outline-primary' ?>" href="/dashboard/<?= $tahun; ?>/3"><i class="fa fa-fw fa-lg fa-check-circle"></i>Triwulan III</a>&nbsp;&nbsp;&nbsp;
            <a class="btn <?= (current_url(true)->getSegment(3) == "4") ? 'btn-primary' : 'btn-outline-primary' ?>" href="/dashboard/<?= $tahun; ?>/4"><i class="fa fa-fw fa-lg fa-check-circle"></i>Triwulan IV</a>&nbsp;&nbsp;&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="tile">
            <h3 class="tile-title">Jumlah Pengunjung</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barJumlahPengunjung"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="tile">
            <h3 class="tile-title">Jenis Kelamin</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barJenisKelamin"></canvas>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-lg-4">
        <div class="tile">
            <h3 class="tile-title">Kepuasan</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barKepuasan"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('asset/node_modules/chart.js/dist/chart.umd.js') ?>"></script>

<script>
    const ctx = document.getElementById('barJumlahPengunjung');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($month_labels) ?>,
            datasets: [{
                label: 'jumlah pengunjung',
                data: [<?php
                        $totals = '';
                        foreach ($dashboard as $value) {

                            $totals .= $value->total . ',';
                        }
                        echo rtrim($totals, ',');
                        ?>],
                fill: true,
                //backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    var ctxb = document.getElementById('barJenisKelamin').getContext('2d');
    var maleData = [];
    var femaleData = [];
    var labels = <?= json_encode($month_labels) ?>;

    for (var i = 0; i < labels.length; i++) {
        maleData.push(0);
        femaleData.push(0);
    }
    <?php foreach ($jk as $row) : ?>
        var index = <?= array_search($row->month_name, $month_labels) ?>;
        <?php if ($row->jenis_kelamin == 1) : ?>
            maleData[index] = <?= $row->jumlah ?>;
        <?php else : ?>
            femaleData[index] = <?= $row->jumlah ?>;
        <?php endif; ?>
    <?php endforeach; ?>

    var chart = new Chart(ctxb, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Male',
                data: maleData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Female',
                data: femaleData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctxk = document.getElementById('barKepuasan').getContext('2d');
    var sangatTidak = [];
    var tidak = [];
    var puas = [];
    var sangatPuas = [];
    var labels = <?= json_encode($month_labels) ?>;

    for (var i = 0; i < labels.length; i++) {
        sangatTidak.push(0);
        tidak.push(0);
        puas.push(0);
        sangatPuas.push(0);
    }
    <?php foreach ($kepuasan as $row) : ?>
        var index = <?= array_search($row->month_name, $month_labels) ?>;
        <?php if ($row->kepuasan == 1) { ?>
            sangatTidak[index] = <?= $row->jumlah ?>;
        <?php } elseif ($row->kepuasan == 2) { ?>
            tidak[index] = <?= $row->jumlah ?>;
        <?php } elseif ($row->kepuasan == 3) { ?>
            puas[index] = <?= $row->jumlah ?>;
        <?php } else { ?>
            sangatPuas[index] = <?= $row->jumlah ?>;
        <?php }; ?>
    <?php endforeach; ?>

    var chart = new Chart(ctxk, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Sangat Tidak Puas',
                    data: sangatTidak,
                    backgroundColor: 'rgba(255, 99, 71, 1)',
                    borderColor: 'rgba(255, 99, 71, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Tidak Puas',
                    data: tidak,
                    backgroundColor: 'rgba(255, 150, 30, 0.5)',
                    borderColor: 'rgba(255, 150, 30, 0.5)',
                    borderWidth: 1
                },
                {
                    label: 'Puas',
                    data: puas,
                    backgroundColor: 'rgba(103, 255, 28, 0.4)',
                    borderColor: 'rgba(103, 255, 28, 0.4)',
                    borderWidth: 1
                }, {
                    label: 'Sangat Puas',
                    data: sangatPuas,
                    backgroundColor: 'rgba(30, 255, 28, 0.8)',
                    borderColor: 'rgba(30, 255, 28, 0.8)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<?= $this->endSection() ?>