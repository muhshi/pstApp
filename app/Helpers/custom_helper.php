<?php

function countData($tahun)
{
    $db      = \Config\Database::connect();
    return $db->table('pst')->where('tahun', $tahun)->countAllResults();
}

function kepuasanAvg($tahun)
{
    $db      = \Config\Database::connect();
    $response = $db->table('pst')->selectAvg('kepuasan')->where('tahun', $tahun)->get()->getResult();
    $kepuasan = $response[0]->kepuasan;
    $kepuasan = number_format((float)$kepuasan, 1, '.', '');
    return $kepuasan;
}

function compare_months($a, $b)
{
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $a_index = array_search($a->month_name, $months);
    $b_index = array_search($b->month_name, $months);
    return $a_index - $b_index;
}

function jenisKelamin($tahun, $twl)
{
    $start_month = 1 + ($twl * 3 - 3);
    $end_month = $start_month + 2;

    $db      = \Config\Database::connect();
    $response = $db->table('dashboard')->select('MONTHNAME(CONCAT(tahun, "-", bulan, "-01")) as month_name, jenis_kelamin, SUM(total) as jumlah')
        ->where('tahun', $tahun)
        ->where("bulan >= $start_month")
        ->where("bulan <= $end_month")
        ->groupBy('month_name')
        ->groupBy('jenis_kelamin')
        ->get()->getResult();

    return $response;
}

function kepuasan($tahun, $twl)
{
    $start_month = 1 + ($twl * 3 - 3);
    $end_month = $start_month + 2;

    $db      = \Config\Database::connect();
    $response = $db->table('dashboard')->select('MONTHNAME(CONCAT(tahun, "-", bulan, "-01")) as month_name, kepuasan, SUM(total) as jumlah')
        ->where('tahun', $tahun)
        ->where("bulan >= $start_month")
        ->where("bulan <= $end_month")
        ->groupBy('month_name')
        ->groupBy('kepuasan')
        ->get()->getResult();

    return $response;
}
