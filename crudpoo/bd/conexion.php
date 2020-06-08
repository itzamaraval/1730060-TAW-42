<?php
class Database
{
    //Datos para la conexión a la BD
    private static $dbName = 'ejercicio-mvc' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'admin';
    private static $dbUserPassword = 'd47eea063ea0eec953ce23ad25117d0422aa6a523e8e1595';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
    
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
