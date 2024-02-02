<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisKelaminModel;
use App\Models\LayananModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikanModel;
use App\Models\PemanfaatanModel;
use App\Models\PSTModel;
use App\Models\KepuasanModel;
use App\Models\DashboardModel;


class PST extends BaseController
{
    protected $db, $layanan, $jenis_kelamin, $pendidikan, $pekerjaan, $kepuasan, $pemanfaatan, $pst, $dashboard;
    public function __construct()
    {
        $this->pendidikan = new PendidikanModel();
        $this->pekerjaan = new PekerjaanModel();
        $this->pemanfaatan = new PemanfaatanModel();
        $this->layanan = new LayananModel();
        $this->jenis_kelamin = new JenisKelaminModel();
        $this->kepuasan = new KepuasanModel();
        $this->pst = new PSTModel();
        $this->dashboard = new DashboardModel();
    }
    public function index()
    {

        $data['pendidikan'] = $this->pendidikan->findAll();
        $data['pekerjaan'] = $this->pekerjaan->findAll();
        $data['pemanfaatan'] = $this->pemanfaatan->findAll();
        $data['layanan'] = $this->layanan->findAll();
        $data['jenis_kelamin'] = $this->jenis_kelamin->findAll();
        $data['kepuasan'] = $this->kepuasan->findAll();

        return view('pst/pst', $data);
    }

    public function create()
    {
        //cara 1
        $data = $this->request->getPost();
        $parts = explode('-', $this->request->getVar('tanggal'));
        $data['tahun'] = $parts[0];

        $save = $this->pst->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->pst->errors());
        } else {
            return redirect()->to('/')->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function report()
    {

        $this->pst->select('pst.id, tanggal, tahun, nama, jenis_kelamin.jenis_kelamin, email,
                            tahun_lahir, umur, alamat, pendidikan.pendidikan,
                            pekerjaan.pekerjaan, instansi, pemanfaatan_data.pemanfaatan_data,
                            layanan.layanan, data, saran, kepuasan.kepuasan');
        $this->pst->join('jenis_kelamin', 'jenis_kelamin.id = pst.jenis_kelamin');
        $this->pst->join('pendidikan', 'pendidikan.id = pst.pendidikan');
        $this->pst->join('pekerjaan', 'pekerjaan.id = pst.pekerjaan');
        $this->pst->join('pemanfaatan_data', 'pemanfaatan_data.id = pst.pemanfaatan_data');
        $this->pst->join('layanan', 'layanan.id = pst.layanan');
        $this->pst->join('kepuasan', 'kepuasan.id = pst.kepuasan');
        $this->pst->where('tahun =' . date("Y"));
        $data['pst'] = $this->pst->findAll();

        return view('pst/report', $data);
    }

    public function edit($id = null)
    {
        $pst = $this->pst->find($id);
        //dd($contact);
        if (is_object($pst)) { //jika id nya ada maka lanjut jika tidak akan error
            $data['pst'] = $pst;
            $data['pendidikan'] = $this->pendidikan->findAll();
            $data['pekerjaan'] = $this->pekerjaan->findAll();
            $data['pemanfaatan'] = $this->pemanfaatan->findAll();
            $data['layanan'] = $this->layanan->findAll();
            $data['jenis_kelamin'] = $this->jenis_kelamin->findAll();
            $data['kepuasan'] = $this->kepuasan->findAll();
            return view('pst/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $save = $this->pst->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->pst->errors());
        } else {
            return redirect()->to('pst/report')->with('success', 'Data Berhasil Diupdate');
        }
    }

    public function trash()
    {
        $data['pst'] = $this->pst->onlyDeleted()->findAll();
        return view('pst/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db  = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('pst')
                ->set('deleted_at', null, true)
                ->where(['id' => $id])
                ->update();
            if ($this->db->affectedRows() > 0) {
                return redirect()->to('pst/report')->with('success', 'Data Berhasil Direstore');
            }
        } else {
            $this->db->table('pst')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', null, false)
                ->update();
            if ($this->db->affectedRows() > 0) {
                return redirect()->to('pst/report')->with('success', 'Semua Data Berhasil Direstore');
            } else {
                return redirect()->to('pst/report')->with('info', 'Tidak ada data yang Direstore');
            }
        }
    }

    public function delete($id)
    {
        $this->pst->delete($id);
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->pst->delete($id, true);
            return redirect()->to('pst/trash')->with('success', 'Data Berhasil Dihapus Permanent');
        } else {
            $this->pst->purgeDeleted();
            if ($this->pst->affectedRows() > 0) {
                return redirect()->to('pst/trash')->with('success', 'Semua Data Berhasil Dihapus Permanent');
            } else {
                return redirect()->to('pst')->with('info', 'Tidak ada data yang didelete');
            }
        }
    }

    public function tahun($tahun)
    {
        $this->pst->select('pst.id, tanggal, tahun, nama, jenis_kelamin.jenis_kelamin, email,
                            tahun_lahir, umur, alamat, pendidikan.pendidikan,
                            pekerjaan.pekerjaan, instansi, pemanfaatan_data.pemanfaatan_data,
                            layanan.layanan, data, saran, kepuasan.kepuasan');
        $this->pst->join('jenis_kelamin', 'jenis_kelamin.id = pst.jenis_kelamin');
        $this->pst->join('pendidikan', 'pendidikan.id = pst.pendidikan');
        $this->pst->join('pekerjaan', 'pekerjaan.id = pst.pekerjaan');
        $this->pst->join('pemanfaatan_data', 'pemanfaatan_data.id = pst.pemanfaatan_data');
        $this->pst->join('layanan', 'layanan.id = pst.layanan');
        $this->pst->join('kepuasan', 'kepuasan.id = pst.kepuasan');
        $this->pst->where('tahun =' . $tahun);
        $data['pst'] = $this->pst->findAll();

        return view('pst/report', $data);
    }



    public function dashboard($tahun = 2024, $twl = 1)
    {
        $start_month = 1 + ($twl * 3 - 3);
        $end_month = $start_month + 2;

        $this->dashboard->select('MONTHNAME(CONCAT(tahun, "-", bulan, "-01")) as month_name,  COALESCE(SUM(total), 0) as total');
        $this->dashboard->where('tahun', $tahun);
        $this->dashboard->where("bulan >= $start_month");
        $this->dashboard->where("bulan <= $end_month");
        $this->dashboard->groupBy('month_name');

        $data['dashboard'] = $this->dashboard->findAll();



        // Define the month names
        $month_names = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $month_labels = array_slice($month_names, $start_month - 1, 3);

        $month_totals = array_column($data['dashboard'], 'total', 'month_name');

        foreach ($month_labels as $key => $month) {
            if (!isset($month_totals[$month])) {
                $month_totals[$month] = 0;
            }
        }
        ksort($month_names);
        $data['dashboard'] = array_map(function ($month, $total) {
            return (object) [
                'month_name' => $month,
                'total' => $total
            ];
        }, array_keys($month_totals), array_values($month_totals));

        $data['jk'] = jenisKelamin($tahun, $twl);
        $data['kepuasan'] = kepuasan($tahun, $twl);
        $tahun = $tahun;

        usort($data['dashboard'], 'compare_months');



        // Load the view and pass the data to it
        return view('pst/dashboard', [
            'dashboard' => $data['dashboard'],
            'month_labels' => $month_labels,
            'jk' => $data['jk'],
            'kepuasan' => $data['kepuasan'],
            'tahun' => $tahun,
        ]);
    }
}
