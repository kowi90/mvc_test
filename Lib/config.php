
<?php

/**
*
*/

//FŐ BEÁLLÍTÁSOK

define("SITE_FOLDER","blog");
define("__MAIN__",$_SERVER['HTTP_HOST'].'/'.SITE_FOLDER);
define("__CONTROLLERS__",'./Controllers');
define("__MODELS__",'/'.SITE_FOLDER.'/Models');
define("__VIEWS__",'/'.SITE_FOLDER.'/Views');
define("__PUBLIC__",'/'.SITE_FOLDER.'/Public');
define("__CSS__",'/'.SITE_FOLDER.'/Public/css');
define("__JS__",'/'.SITE_FOLDER.'/Public/js');
//ADATBÁZIS BEÁLLÍTÁSOK


define("DB_HOST","localhost");
define("DB_NAME","blog");
define("DB_USER","root");
define("DB_PASS","");