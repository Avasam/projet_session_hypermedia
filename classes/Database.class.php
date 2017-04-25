<?php
/**
 * Description of Database
 *
 * @author Amoumene Toudeft
 */
require_once('/configs/config.php');
class Database {	
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(self::$instance == null)
            self::$instance = new PDO(
                "mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME."", 
                Config::DB_USER, 
                Config::DB_PWD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        return self::$instance;
    }
    public static function close() {
        self::$instance = null;
    }
}
