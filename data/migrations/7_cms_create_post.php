<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CmsCreatePost extends AbstractMigration
{

    public function up()
    {
        $this->table('cms_post', array())
             ->addColumn('name', 'string')
             ->addColumn('url', 'string')
             ->addColumn('status_id', 'integer')
             ->addColumn('category', 'string', array('null'=>true))
             ->addColumn('text', 'text')
             ->addForeignKey('status_id', 'cms_status', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
             ->save();
    }

    public function down()
    {
        $this->dropTable('cms_post');
    }
}