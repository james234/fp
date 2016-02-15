FOR MY WORK ONLY
https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#adminlte-options



$config['sess_cookie_name']		= 'ci_session';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= FALSE;
$config['sess_use_database']	= FALSE;
$config['sess_table_name']		= 'ci_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;


/********************CUSTOM CONSTANTS*********************************************/
define('SUCCESS_MSG','Congratulation..for the successful registration..Please check your email id inbox and spam and click on the given link to activate your account.');
define('CONTACT_US',"Thanks for contact us we will contact you soon");




$route['verifyMail/(:any)'] 	 = "/home/verifyMail/$1";
$route['dashboard/login']    	 = "dashboard/login";
$route['myaccount/myaccount']    = "myaccount/index";
$route['default_controller']	 = "home";
$route['404_override'] = '';





$config['encryption_key'] = 'netSetSolution';




RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php [L,QSA]

