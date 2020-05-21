<?php
class Database
{
    //Datos para la conexión a la BD
    private static $dbName = 'ejercicio-mvc' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'admin';
    private static $dbUserPassword = 'a58f7bd26723b03e63663e9781d6e66088070d4b881fb6a1';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     //función para conectar a la BD
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
     //función para desconectarse de la BD
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>