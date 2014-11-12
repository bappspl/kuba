<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CmsCreatePage extends AbstractMigration
{

    public function up()
    {
        $this->table('cms_page', array())
             ->addColumn('name', 'string')
             ->addColumn('slug', 'string')
             ->addColumn('status_id', 'integer')
             ->addColumn('content', 'text', array('null'=>true))
             ->addForeignKey('status_id', 'cms_status', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
             ->save();
    }

    public function down()
    {
        $this->dropTable('cms_page');
    }
}