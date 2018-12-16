<?php
include_once 'class/Database.class.php';

class Countries{
    private static $instance;
    private $id_country;
    private $iso_country;
    private $name_country;

    // DB Connection attrib
    private $conn;
    private $query;
    // Config attrib
    private $attrib;
    private $field;

    public function __construct(){
      $this->conn = new Database();
    }

    public static function singleton(){
        if (!isset(self::$instance)) {
            $myclass = __CLASS__;
            self::$instance = new $myclass;
        }
        return self::$instance;
    }

    public function set($attrib, $content) {
      $this->$attrib = $content;
    }

    public function get($attrib) {
      return $this->$attrib;
    }

    public function get_country(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_countries 
                where 
                    id_country = :id_country');
            $this->query->bindValue(':id_country', $this->id_country, PDO::PARAM_INT);
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_countries(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_countries');
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    private function __clone(){
        trigger_error('Clone option does not allowed!.', E_USER_ERROR);
    }
}
