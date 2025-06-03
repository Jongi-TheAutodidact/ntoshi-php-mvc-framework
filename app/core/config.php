<?php 
defined('ROOTPATH') OR exit('Access Denied!');


// DB Constants
if(empty($_SERVER['SERVER_NAME']) && php_sapi_name() == 'cli' || (!empty($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'))
{
	/** database config **/
	define('DBNAME', 'ntoshi_frame_db');
	define('DBHOST', 'localhost'); 
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'sql');
	
	define('ROOT', 'http://localhost/ntoshi-framework/public');

}else
{
	/** database config **/
	define('DBNAME', '');
	define('DBHOST', '');
	define('DBUSER', '');
	define('DBPASS', '');
	define('DBDRIVER', 'sql');

	define('ROOT', 'https://yourdomainname');

}


/* APP INFO */
define('APP_NAME', "Ntoshi Framework");
define('APP_NAME_SHORT', "Ntoshi Framework");
define('LOGO', "ntoshi-logo.png");
define('FAVICON', "ntoshi-favicon.png");
define('LOGO_IMG_ALT', "Ntoshi Framework Logo");
define('DEFAULT_TIMEZONE', "Africa/Johannesburg");
define('POLICY_ADOPT_DATE','2024-01-01');
define('EST_YEAR','2024');
define('DEF_CURR','R');
define('JONGI_CLI_VERS','1.0.0');

/* USER ROLES ARRAY */
define('USER_ROLES', array_map('ucwords', array_map('strtolower', [
    'Admin',
    'User',
    'Customer'
])));

/* SMTP CONFIG */
define('MAIL_HOST','');
define('USERNAME','');
define('PWD','');
define('PORT','');

/* APP COLOURS */
define('THEME_COLOR','primary');  
define('VARIANT_COLOR','#e96b56'); 
# TEXT (Just change 'dark' or 'light')
define('FR_FOOTER_TEXT','text-dark');
define('FR_HERO_DESC_TEXT','text-dark');
define('FR_HERO_DESC_BG',VARIANT_COLOR);
# BG (Just change 'dark' or 'light')
define('BG','bg-light');

/** true means show errors **/
define('DEBUG', true);
