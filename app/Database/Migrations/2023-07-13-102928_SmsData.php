<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SmsData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"INT",
                "constraint"=>"5",
                "unsigned"=>true,
                "auto_increment"=>true,
            ],
            'body' => [
                'type'       => 'TEXT',
                 "null"=>true,
            ],
            'center_number' => [
                'type' => 'VARCHAR',
                "constraint"=>15,
                'null' => true,
            ],
            'from_number'=>[
                'type' => 'VARCHAR',
                "constraint"=>15,
                'null' => true,
            ],
            'created_at'=>[
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'=>[
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);

        $this->forge->addPrimaryKey("id");
        $this->forge->createTable('message');
    }

    public function down()
    {
        $this->forge->dropTable('message');
    }
}
