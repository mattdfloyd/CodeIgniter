<?php
/**
 * MY_Controller class
 *
 * @package default
 * @author 
 **/
class MY_Controller extends CI_Controller
{
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();

		$this->data['errors'] = array();
	}

} // END class MY_Controller
