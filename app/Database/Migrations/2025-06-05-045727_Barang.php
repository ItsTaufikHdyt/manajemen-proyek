<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
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
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'ket'      => [
				'type'           => 'INT',
				'constraint'     => 1,
			],
			'jumlah'       => [
				'type'           => 'INT',
				'constraint'     => '50'
			],
            'status'      => [
				'type'           => 'INT',
				'constraint'     => 1,
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('barang', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
