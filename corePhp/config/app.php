<?php

define('DB_HOST','localhost');
define('DB_NAME', 'universepg_new_app');
define('DB_USER','root');
define('DB_PASS','123456');

/*define('DB_HOST','localhost');
define('DB_NAME', 'univsyqx_web');
define('DB_USER','univsyqx_web_usr');
define('DB_PASS','0}QpwJ&vjang');*/


# Default Site Title ...
define("SITE_TITLE","Site Fast Template");

define("APP_URL", "http://localhost/site_fast_template/");
// define("APP_URL", "https://www.universepg.com/");
define("LOGIN_FORM", APP_URL."login");
define("DASHBOARD_URL",  APP_URL."dashboard");
define("PUBLIC_URL", APP_URL."public/");


# Set Default TimeZone
define("APP_TIME_ZONE", "Asia/Dhaka");

date_default_timezone_set(APP_TIME_ZONE);

# encryption keys
define("ENCRYPTION_METHOD", "AES-256-CBC");
define("SECRET_KEY", "This is my secret key");
define("SECRET_IV", "This is my secret iv");

# end encryption keys


# What Type of Mail use ....
# Set PHP_MAILER or PHP_SMTP
# define('MAIL_TYPE', 'PHP_MAILER');
define('MAIL_TYPE', 'PHP_SMTP');


# set the Gmail mail name and password to send the mail
# set the Gmail mail name and password to send the mail
define("SMTP_HOST", 'universepg.com');
define('SMTP_MAIL', "mail@universepg.com");
define('SMTP_PASS', 'Z;Qp-)oX+Zkm');
define("SMTP_REPLY_TO", "mail@universepg.com");

#Mail form and Name that show on the sender inbox
define("SMTP_FORM", "mail@universepg.com");
define("SMTP_NAME", "Editorupg");


# Per page data show in the Admin Panel
define("PER_PAGE", 25);
# Base Url
define('BASEURL', APP_URL."project/");
# admin folder name define here
define("ADMIN_FOLDER_NAME", "dashboard/");


# do not change anything Below this is autogenerate url
define('ADMIN_URL', BASEURL.ADMIN_FOLDER_NAME);

# By deafault Admin image if no Imge uplpoad

define('DEFAULT_ADMIN_IMG', ADMIN_URL."/assests/images/picture.jpg");
# define the basepath


define("DASHBOARD_HOME", "/dashboard/");

# ------------------------------------------------

define("CUSTOM_LOGO_FOLDER", "customLogos");
