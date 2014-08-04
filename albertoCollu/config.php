<?php
/*
 * Configurazione file database
 */

$settings = parse_ini_file(dirname(__FILE__) . "/config.ini.php", true);

define('USER_DB', $settings["database"]["username"]);
define('PASSWORD_DB', $settings["database"]["password"]);
define('HOST_DB', $settings["database"]["host"]);
define('PORT_DB', $settings["database"]["port"]);
define('NAME_DB', $settings["database"]["name"]);

define('TIMEZONE_DB', $settings["TecnoShop"]["timezone"]);

?>