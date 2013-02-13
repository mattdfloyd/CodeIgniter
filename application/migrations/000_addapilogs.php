<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addapilogs extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('api_logs', array(
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
             'uri' => 
             array(
              'type' => 'string',
              'length' => 255,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             'method' => 
             array(
              'type' => 'string',
              'length' => 6,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             'params' => 
             array(
              'type' => 'string',
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => false,
              'autoincrement' => false,
              'length' => 255,
             ),
             'api_key' => 
             array(
              'type' => 'string',
              'length' => 40,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             'ip_address' => 
             array(
              'type' => 'string',
              'length' => 45,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             'time' => 
             array(
              'type' => 'integer',
              'length' => 4,
              'fixed' => false,
              'unsigned' => false,
              'primary' => false,
              'notnull' => true,
              'autoincrement' => false,
             ),
             'authorized' => 
             array(
              'type' => 'integer',
              'length' => 1,
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
        $this->dropTable('api_logs');
    }
}