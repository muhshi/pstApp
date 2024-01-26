<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dashboard extends Migration
{
    public function up()
    {
        //
        $this->forge->createTable("
      CREATE VIEW dashboard as select year(`r`.`tanggal`) AS `tahun`,month(`r`.`tanggal`) AS `bulan`,count(`r`.`id`) AS `total`,`r`.`jenis_kelamin` AS `jenis_kelamin`,`r`.`kepuasan` AS `kepuasan` 
      from `pstdemak`.`pst` `r` 
      group by year(`r`.`tanggal`),month(`r`.`tanggal`),`r`.`jenis_kelamin`,`r`.`kepuasan`
      order by year(`r`.`tanggal`),month(`r`.`tanggal`)
    ");
    }

    public function down()
    {
        $this->forge->dropTable('dashboard');
    }
}
