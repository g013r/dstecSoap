<?php

namespace app\config;

use PDO;
use PDOException;
class Database{
    private $host = "localhost";
    private $db_name = "dstec";
    private $username = "root";
    private $password = "";

    private $con;

    //singleton para la conexion a la base de datos
    private static $instance = null;

    //constructor de la clase para la conexion a la base de datos
    private function __construct(){
        $this->con = null;
        try{
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            
            $this->con = new PDO($dsn, $this->username, $this->password);
            
            // Configuramos PDO para lanzar excepciones en caso de error
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Configuramos el modo de obtención predeterminado a objetos
            $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    //metodo para obtener la instancia de la clase
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    //metodo para obtener la conexion a la base de datos
    public function getConnection(){
        return $this->con;
    }
}