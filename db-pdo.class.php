<?php

    define('DB_SERVER', '10.4.0.199');
    define('DB_DATABASE', 'sites_theskinny');	
    define('DB_USER', 'theskinn_user');
    define('DB_PASSWORD', 'dN)h~H5AzrzLsT552d37880#9305'); 
    define('DB_DSN', 'mysql:dbname=sites_theskinny;host=10.4.0.199;charset=utf8');

    class DB
    {
        protected static $instance = null;

        protected function __construct() {}
        protected function __clone() {}
    
        public static $lastInsertId = null;
        public static $rowCount = 0;
        public static $error;

        public static function instance()
        {
            if (self::$instance === null)
            {
                $opt  = array(
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => FALSE,
                );
                self::$instance = new PDO(DB_DSN, DB_USER, DB_PASSWORD, $opt);
                self::$instance->setAttribute( PDO::ATTR_PERSISTENT, true );
            }
            return self::$instance;
        }

        public static function __callStatic($method, $args)
        {
            return call_user_func_array(array(self::instance(), $method), $args);
        }

        public static function run($sql, $args = [])
        {
            try {
                $stmt = self::instance()->prepare($sql);
                $stmt->execute($args);

                self::$lastInsertId = self::instance()->lastInsertId();
                self::$rowCount = $stmt->rowCount();
                return $stmt;
            }
            catch (PDOException $e) {
                 print('Error in SQL Query:<br>'.$sql.'<br>'.$e->getMessage());
                 return false;
            }
        }
    
    
        public static function queryWithBindings($sql, $bindings, $returnType) {
        
            //print($sql);
            //print_r($bindings);

            try {
                $stmt = self::instance()->prepare($sql);
                foreach ($bindings as $binding){
                    $type = is_null($binding['value']) ? PDO::PARAM_NULL : $binding['type'];
                    $stmt->bindValue($binding['key'], $binding['value'], $type);
                }
                $stmt->execute();
                self::$lastInsertId = self::instance()->lastInsertId();
                self::$rowCount = $stmt->rowCount();
                $result = $stmt->fetchAll($returnType);
            }
            catch (PDOException $e) {
                 print('Error in SQL Query:<br>'.$sql.'<br>'.$e->getMessage());
                 print ('<br><br>');
                 print_r($bindings);
                 return false;
            }
            return $result || empty($result);
        }
     
    }
    
    $db = DB();

