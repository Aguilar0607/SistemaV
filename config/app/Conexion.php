<?php
class Conexion{
    private $conect;
    public function __construct() {
        $pdo = "mysql:host=". HOST . ";dbname=" . DBNAME . ";" . CHARSET;
        try {
            $this->conect = new PDO($pdo, USER, PASS);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'ERROR EN LA CONEXION: ' . $e->getMessage();
        }
    }
    public function conectar()
    {
        return $this->conect;
    }
}
?>