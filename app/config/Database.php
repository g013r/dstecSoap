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
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conectado a la base de datos correctamente";
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