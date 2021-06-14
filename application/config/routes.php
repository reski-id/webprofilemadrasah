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
$route['default_controller'] = 'web';
$route['404_override']  = 'web/error_not_found';
$route['artikel']  = 'web/index';
$route['artikel/(:any)']  = 'web/index/$1';
$route['detail']  = 'web/detail';
$route['detail/(:any)']  = 'web/detail/$1';
$route['kat']  = 'web/kat';
$route['kat/(:any)']  = 'web/kat/$1';
$route['kat/(:any)/(:any)']  = 'web/kat/$1/$2';
$route['visi_misi']  = 'web/vm';
$route['sejarah']  = 'web/sejarah';
$route['fasilitas']  = 'web/fasilitas';
$route['prestasi']  = 'web/prestasi';
$route['kegiatan']  = 'web/kegiatan';
$route['ppdb']  = 'web/ppdb';
$route['galeri']  = 'web/galeri';
$route['galeri/(:any)']  = 'web/galeri/$1';
$route['galeri_d']  = 'web/galeri_d';
$route['galeri_d/(:any)']  = 'web/galeri_d/$1';
$route['galeri_d/(:any)/(:any)']  = 'web/galeri_d/$1/$2';
$route['kontak']  = 'web/kontak';
$route['cari']  = 'web/cari';
$route['cari/(:any)']  = 'web/cari/$1';
$route['cari/(:any)/(:any)']  = 'web/cari/$1/$2';
$route['translate_uri_dashes'] = FALSE;
