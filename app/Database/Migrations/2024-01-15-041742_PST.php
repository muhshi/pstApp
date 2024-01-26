<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PST extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis_kelamin' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tahun_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'umur' => [
                'type'       => 'INT',
                'constraint' => '3',
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'pendidikan' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'pekerjaan' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'instansi' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'pemanfaatan_data' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'layanan' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'data' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'saran' => [
                'type'       => 'TEXT',
            ],
            'kepuasan' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pst');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('pst');
    }
}
