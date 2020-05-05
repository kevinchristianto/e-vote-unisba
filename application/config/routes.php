<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route = [
    'default_controller' => 'home',
    '404_override' => '',
    'translate_uri_dashes' => FALSE,
    'login' => 'home/login',
    'logout' => 'menu/logout',
    'auth' => 'home/auth',
    'menu/dashboard' => 'menu/index',
    'menu/jurusan' => 'menu/index_jurusan',
    'menu/kelas' => 'menu/index_kelas',
    'menu/calon' => 'menu/index_calon',
    'jurusan/insert' => 'menu/insert_jurusan',
    'jurusan/delete/(:any)' => 'menu/delete_jurusan',
    'jurusan/get/(:any)' => 'menu/get_single_jurusan_ajax',
    'jurusan/update/(:any)' => 'menu/update_jurusan',
    'kelas/get/(:any)' => 'menu/get_kelas',
    'kelas/insert' => 'menu/insert_kelas',
    'kelas/delete/(:num)' => 'menu/delete_kelas',
    'kelas/update/(:num)' => 'menu/update_kelas',
    'calon/insert' => 'menu/insert_calon',
    'calon/delete/(:num)' => 'menu/delete_calon',
    'calon/update/(:num)' => 'menu/update_calon',
    'calon/get/(:num)/(:any)' => 'menu/get_single_calon_ajax',
];
