<?php

namespace Fuel\Migrations;

class Create_news
{
	public function up()
	{
		\DBUtil::create_table('news', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'pid' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'alias' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'status' => array('constraint' => 1, 'type' => 'char'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('news');
	}
}