<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CmsCreateNewsletter extends AbstractMigration
{

    public function up()
    {
        $this->table('cms_subscriber', array())
             ->addColumn('email', 'string')
             ->addColumn('first_name', 'string', array('null'=>true))
             ->addColumn('groups', 'string', array('null'=>true))
             ->addColumn('status_id', 'integer', array('null'=>true))
             ->addColumn('confirmation_code', 'string', array('null'=>true))
            ->addForeignKey('status_id', 'cms_status', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
            ->save();

        $this->table('cms_subscriber_group', array())
            ->addColumn('name', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('description', 'text', array('null'=>true))
            ->save();

        $this->table('cms_newsletter', array())
            ->addColumn('subject', 'string')
            ->addColumn('text', 'text')
            ->addColumn('groups', 'text', array('null'=>true))
            ->addColumn('status_id', 'integer')
            ->addForeignKey('status_id', 'cms_status', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
            ->save();

        $this->table('cms_newsletter_settings', array())
            ->addColumn('sender_email', 'string')
            ->addColumn('sender', 'string')
            ->addColumn('footer', 'text')
            ->save();

        $this->insertValues('cms_newsletter_settings', array(
                'sender_email' => 'string',
                'sender' => 'string',
                'footer' => 'text',
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
        $this->dropTable('cms_subscriber');
        $this->dropTable('cms_subscriber_group');
        $this->dropTable('cms_newsletter');
        $this->dropTable('cms_newsletter_settings');
    }
}