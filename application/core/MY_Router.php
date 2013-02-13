<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * MY_Router
 *
 * Extended the core CI_Router class in order to force a different naming
 * convention for controllers.
 *
 */

class MY_Router extends CI_Router
{
    /*
     * Suffix in controller name
     *
     * @var String
     */
    private $suffix = "_Controller";

    /*
     * Call the parent constructor
     *
     * This is a requirement for extending base CI core class. Just abiding by
     * the rules.
     *
     * @access  public
     * @return  void
     */
    public function __construct()
    {
        parent::__construct();
    }

    function set_class($class) {
        $this->class = $class . $this->suffix;
    }

    function controller_name() {
        if (strstr($this->class, $this->suffix)) {
            return str_replace($this->suffix, '', $this->class);
        }
        else {
            return $this->class;
        }
    }
}
