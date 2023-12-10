<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
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
			'nip'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],
			'nama'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'jenis_kelamin'       => [
				'type'           => 'INT',
				'constraint'     => '1',
			],
            'tempat_lahir'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
            'tgl_lahir'      => [
				'type'           => 'DATE',
			],
            'telpon'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
            'agama'       => [
				'type'           => 'INT',
				'constraint'     => '1',
			],
            'status_nikah'       => [
				'type'           => 'INT',
				'constraint'     => '1',
			],
            'alamat'      => [
				'type'           => 'TEXT',
			],
            
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('karyawan', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
		$this->forge->dropTable('karyawan');
    }
}
