<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CmsCreateSlider extends AbstractMigration
{

    public function up()
    {
        $this->table('cms_slider', array())
             ->addColumn('name', 'string')
             ->addColumn('slug', 'string')
             ->addColumn('status_id', 'integer')
             ->save();

        $this->table('cms_slider_item', array())
            ->addColumn('slider_id', 'integer')
            ->addColumn('name', 'string')
            ->addColumn('title', 'string', array('null' => true))
            ->addColumn('description', 'string', array('null' => true))
            ->addColumn('filename', 'string', array('null' => true))
            ->addColumn('status_id', 'integer')
            ->addColumn('position', 'integer')
            ->addForeignKey('slider_id', 'cms_slider', 'id')
            ->save();

        $this->insertValues('cms_slider', array(
                'name' => 'string',
                'slug' => 'string',
                'status_id' => 'integer',
            )
        );
    }

    public function insertValues($tableName, $tableColumns)
    {
        $path = fopen ('./data/fixtures/'.$tableName.'.csv',"r");
        while (($data = fgetcsv($path, 1000, ",")) !== FALSE)  {
            $value = '';
            $i = 0;
            foreach ($tableColumns as $kCol => $vCol) {
                switch ($vCol) {
                    case 'text':
                        $value = $value . $kCol.' = "'.iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data[$i]). '", ';
                        break;
                    case 'string':
                        $value = $value . $kCol.' = "'.iconv("UTF-8", "ISO-8859-1//TRANSLIT", $data[$i]). '", ';
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
        $this->dropTable('cms_slider');
        $this->dropTable('cms_slider_item');
    }
}