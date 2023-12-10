<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
		$this->forge->dropTable('users');
    }
}
