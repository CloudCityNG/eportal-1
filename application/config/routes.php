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
$route['profile/update'] = 'profile/update';
$route['profile/update_profilepicture'] = 'profile/update_profilepicture';
$route['profile/update_basicdetails'] = 'profile/update_basicdetails';
$route['profile/update_profiledetails'] = 'profile/update_profiledetails';
$route['profile/update_password'] = 'profile/update_password';
$route['profile/update_contact_details'] = 'profile/update_contact_details';
$route['profile/report/(.*)'] = 'profile/report/$1/$1';
$route['profile/(.*)'] = 'profile/index/$1';
//$route['company/contributers/()'] = 'company/contributers/$1';
//$route['deliveries/([a-zA-Z0-9]+)'] = 'deliveries/';
$route['company'] = 'company/index';
$route['company/create'] = 'company/create';
$route['company/create_submit'] = 'company/create_submit';
$route['company/customer_email'] = 'company/customer_email';
$route['company/send_customer_email'] = 'company/send_customer_email';
$route['company/([0-9]+)'] = 'company/by_id/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */