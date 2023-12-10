<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProyekKaryawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'id_proyek'       => [
				'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
				'constraint'     => '5'
			],
			'id_karyawan'      => [
				'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
				'constraint'     => '5',
			],
            
		]);
        // Membuat primary key
		$this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('id_proyek', 'proyek', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_karyawan', 'karyawan', 'id', 'CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('proyek_karyawan', TRUE);
    }

    public function down()
    {
          // menghapus tabel news
		$this->forge->dropTable('proyek_karyawan');
    }
}
