<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['poll-history'] = 'site/poll_history';
$route['today-result'] = 'site/today_result';
$route['logout'] = 'site/logout';
$route['account'] = 'site/account';
$route['poll-food'] = 'api/choose_food';
$route['add-food'] = 'api/add_food';

//other
$route['home'] = 'api/home';
