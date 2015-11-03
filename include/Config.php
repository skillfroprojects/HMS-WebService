<?php

/**
 * Database config variables
 */
define("DB_HOST", "23.91.114.44");
define("DB_USER", "mysql");
define("DB_PASSWORD", "mysql");
define("DB_DATABASE", "hms");

class DB_Class {

    function __construct() {
        $connection = mysql_connect('23.91.114.44', 'mysql', 'mysql') or die('Oops connection error -> ' . mysql_error());
        mysql_select_db('hms', $connection) or die('Database error -> ' . mysql_error());
    }

}
?>
