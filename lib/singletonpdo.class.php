<?php

class SingletonPDO {

    private $PDOInstance = null;
        
    private static $instance = null;
    
    private function __construct(){
        $this->PDOInstance = new PDO('mysql:host='. DB_SERVEUR .';dbname='. DB_NOM, DB_LOGIN, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    }
    
    static function getInstance(){
        if(is_null(self::$instance)){
            //echo 'Je vais creer une instance de PDO<br/>';
            self::$instance = new SingletonPDO();
        }
        //echo 'Je renvoie l\'instance<br/>';
        return self::$instance;
    }

    private function __clone(){}
    
    function __call($name, $arguments){
        
        return $this->PDOInstance->{$name}(implode(',', $arguments));
    }

}