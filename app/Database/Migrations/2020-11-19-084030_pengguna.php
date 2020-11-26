<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengguna extends Migration
{
	private $table = 'pengguna';
	public function up()
	{
				//menambahkan tabel pada databese yg sudah dibuat
				$this->forge->addField([
					'username'          => [
							'type'           => 'VARCHAR',
							'constraint'     => 100,
					],
					'password'       => [
							'type'           => 'TEXT',
					],
			]);
			$this->forge->addKey('username', true);
			$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
