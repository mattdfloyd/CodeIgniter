<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addapikeys extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('api_keys', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 4,
              'fixed' => false,
              'unsigned' => false,
              'primary' => true,
              'autoincrement' => true,
              'notnull' => false,
             ),
             'key' => 
             array(
              'type' => 'string',
              'length' => 40,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             'level' => 
             array(
              'type' => 'integer',
              'length' => 4,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             'ignore_limits' => 
             array(
              'type' => 'integer',
              'length' => 1,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'default' => '0',
              'notnull' => true,
              'autoincrement' => false,
             ),
             'is_private_key' => 
             array(
              'type' => 'integer',
              'length' => 1,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'default' => '0',
              'notnull' => true,
              'autoincrement' => false,
             ),
             'ip_addresses' => 
             array(
              'type' => 'string',
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => false,
              'autoincrement' => false,
              'length' => 255,
             ),
             'date_created' => 
             array(
              'type' => 'integer',
              'length' => 4,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('api_keys');
    }
}