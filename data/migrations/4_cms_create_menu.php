<?php

use Phinx\Migration\AbstractMigration;

class CmsCreateMenu extends AbstractMigration
{

    public function up()
    {
        $this->table('cms_menu_tree', array())
            ->addColumn('name', 'string')
            ->addColumn('machine_name', 'string')
            ->addColumn('position', 'integer')
            ->save();

        $this->insertValues('cms_menu_tree', array(
                'name' => 'string',
                'machine_name' => 'string',
                'position' => 'integer',
            )
        );

        $this->table('cms_menu_node', array())
            ->addColumn('tree_id', 'integer')
            ->addColumn('parent_id', 'integer', array('null'=>true))
            ->addColumn('depth', 'integer')
            ->addColumn('is_visible', 'integer')
            ->addColumn('provider_type', 'string')
            ->addColumn('settings', 'text', array('null'=>true))
            ->addColumn('position', 'integer')
            ->addForeignKey('tree_id', 'cms_menu_tree', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
            ->addForeignKey('parent_id', 'cms_menu_node', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
            ->save();

        $this->insertValues('cms_menu_node', array(
                'tree_id' => 'integer',
                'parent_id' => 'integer',
                'depth' => 'integer',
                'is_visible' => 'integer',
                'provider_type' => 'string',
                'settings' => 'text',
                'position' => 'integer',
            )
        );

        $this->table('cms_menu_item', array())
            ->addColumn('node_id', 'integer')
            ->addColumn('label', 'string')
            ->addColumn('url', 'string')
            ->addColumn('position', 'integer')
            ->addForeignKey('node_id', 'cms_menu_node', 'id', array('delete' => 'NO_ACTION', 'update' => 'NO_ACTION'))
            ->save();

        $this->insertValues('cms_menu_item', array(
                'node_id' => 'integer',
                'label' => 'string',
                'url' => 'string',
                'position' => 'integer',
            )
        );


    }

    public function insertValues($tableName, $tableColumns)
    {
        setlocale(LC_CTYPE, 'pl_PL');
        $path = fopen ('./data/fixtures/'.$tableName.'.csv',"r");
        while (($data = fgetcsv($path, 1000, ",")) !== FALSE)  {
            $value = '';
            $i = 0;
           // iconv("UTF-8", "ISO-8859-1//TRANSLIT", $text)
            foreach ($tableColumns as $kCol => $vCol) {
                switch ($vCol) {
                    case 'text':
                        $value = $value . $kCol.' = "'.iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data[$i]). '", ';
                        break;
                    case 'string':
                        $value = $value . $kCol.' = "'. iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data[$i]). '", ';
                        break;
                    case 'integer':
                        $value = $value . $kCol.' = '.iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data[$i]) . ', ';
                        break;
                }
                $i++;
            }
            $realValue = substr($value, 0, -2);
            $this->adapter->execute('insert into '.$tableName.' set '.$realValue);
        }
        fclose ($path);
    }

    public function down()
    {
        $this->dropTable('cms_menu_item');
        $this->dropTable('cms_menu_node');
        $this->dropTable('cms_menu_tree');
    }
}