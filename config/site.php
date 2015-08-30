<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'pyromant_ids');
define('DB_PASSWORD', 'in5Tinct');
define('DB_DATABASE', 'pyromant_ids');

/* SERVER SPECIFIC VARS
----------------------------------------------------*/
    /*** LOCAL ***/
    if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
        define('CUSTOM_THEME_ASSET_CACHE_BUST_NUMBER', time());
    /*** STAGE ***/
    } else if (strpos($_SERVER['SERVER_NAME'], 'ids.pyromantics.com') !== false) {
        define('CUSTOM_THEME_ASSET_CACHE_BUST_NUMBER', time());
    /*** PRODUCTION ***/
    } else {
        define('CUSTOM_THEME_ASSET_CACHE_BUST_NUMBER', '2');
    }