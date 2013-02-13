<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
 *
 * This class sets Doctrine 1.2.x up for CodeIgniter 2.x 
 * It's a library
 *
 * @package     CodeIgniter
 * @author      Cees van Egmond
 * @link        www.wearejust.com
 * @since       1.0
 * @version     $Revision: 7490 $
 */
 
require_once 'Doctrine/Core.php';

class Doctrine extends Doctrine_Core
{
    public function __construct()
    {
        if ( ! defined('ENVIRONMENT') OR ! file_exists($file_path = APPPATH.'config/'.ENVIRONMENT.'/database.php'))
        {
            if ( ! file_exists($file_path = APPPATH.'config/database.php'))
            {
                die('The configuration file database.php does not exist.');
            }
        }
        require_once($file_path);
        
        $db['default']['cachedir'] = ""; 
        $db['default']['dsn'] = 
            $db['default']['dbdriver'] . 
            '://' . $db['default']['username'] . 
            ':' . $db['default']['password']. 
            '@' . $db['default']['hostname'] . 
            '/' . $db['default']['database'];

        // Set the autoloader
        spl_autoload_register(array('Doctrine', 'autoload'));
        spl_autoload_register(array('Doctrine', 'modelsAutoload'));
        
        // Load the Doctrine connection
        Doctrine_Manager::connection($db['default']['dsn'], $db['default']['database']);

        // (OPTIONAL) CONFIGURATION BELOW
        Doctrine_Manager::getInstance()->setAttribute(Doctrine::ATTR_MODEL_LOADING, Doctrine::MODEL_LOADING_CONSERVATIVE);
        Doctrine_Manager::getInstance()->setAttribute(Doctrine::ATTR_AUTOLOAD_TABLE_CLASSES, true);
        Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
        Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);
        Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_NATIVE_ENUM, true);

        // this will allow us to use "mutators"
        Doctrine_Manager::getInstance()->setAttribute(
            Doctrine::ATTR_AUTO_ACCESSOR_OVERRIDE, true);

        // this sets all table columns to notnull and unsigned (for ints) by default
        Doctrine_Manager::getInstance()->setAttribute(
            Doctrine::ATTR_DEFAULT_COLUMN_OPTIONS,
            array('type' => 'string', 'length' => 255, 'notnull' => false, 'unsigned' => true));

        // set the default primary key to be named 'id', integer, 4 bytes
        Doctrine_Manager::getInstance()->setAttribute(
            Doctrine::ATTR_DEFAULT_IDENTIFIER_OPTIONS,
            array('name' => 'id', 'type' => 'integer'));

        // Load the models for the autoloader
        // Doctrine::loadModels(APPPATH . 'models/generated');  
        Doctrine::loadModels(APPPATH . 'models');  
    }
    
    public function setUpCommandLine()
    {
        $config = array(
                'data_fixtures_path'  =>  APPPATH . 'fixtures',
                'models_path'         =>  APPPATH . 'models',
                'migrations_path'     =>  APPPATH . 'migrations',
                'sql_path'            =>  APPPATH . 'sql',
                'yaml_schema_path'    =>  APPPATH . 'schema');


        $cli = new Doctrine_Cli($config);
        $cli->run($_SERVER['argv']);             
    }

    public function setUpApplication()
    {
    }
}

/* End of file DoctrineSetup.php */
