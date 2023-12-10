<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proyek extends Migration
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
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'instansi'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nama'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'kontak'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'alamat'      => [
				'type'           => 'TEXT',
			],
			'kota'      => [
				'type'           => 'VARCHAR',
                'constraint'     => '100',
			],
			'provinsi'      => [
				'type'           => 'VARCHAR',
                'constraint'     => '100',
			],
            'desc'      => [
				'type'           => 'TEXT',
			],
            'start'      => [
				'type'           => 'DATE',
			],
            'end'      => [
				'type'           => 'DATE',
			],
            'biaya'      => [
				'type'           => 'INT',
				'constraint'     => '50',
			],
            'status'       => [
				'type'           => 'INT',
				'constraint'     => '1',
			],
            
		]);
        // Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('proyek', TRUE);
    }

    public function down()
    {
         // menghapus tabel news
		$this->forge->dropTable('proyek');
    }
}
