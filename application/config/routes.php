<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['login'] = 'sessions/login';
$route['logout'] = 'sessions/logout';

$route['admin'] = 'admin/main';
$route['admin/search'] = 'admin/main/search';

$route['(:any)/search/(:any)'] = "$1/search/$2";
$route['(:any)/page/(:num)'] = "$1/index/$2";
$route['(:any)/page'] = "$1/index/0";

$route['(:any)/(:num)/(:any)/&(:any)'] = "$1/$3/$2/$4";
$route['(:any)/(:num)/(:any)/(:num)/(:any)'] = "$1/$3/$5/$2/$4";
$route['(:any)/(:num)/(:any)/(:num)'] = "$1/$3/show/$2/$4";

$route['(:any)/(:num)'] = "$1/show/$2";
$route['(:any)/(:num)/(:any)'] = "$1/$3/$2";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
