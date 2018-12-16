<?php
include_once 'class/Database.class.php';

class Users{
    private static $instance;
    private $id_user;
    private $name_user;
    private $lastname_user;
    private $document_user;
    private $phone_user;
    private $email_user;
    private $id_country;
    private $message_user;

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

    public function insert_user(){
        try {
          $this->query = $this->conn->prepare("insert into tbl_users values (
            null, 
            :name_user, 
            :lastname_user, 
            :document_user, 
            :email_user, 
            :phone_user,
            :id_country,
            :message_user)");
          $this->query->bindValue(':name_user',     $this->name_user, PDO::PARAM_STR);
          $this->query->bindValue(':lastname_user', $this->lastname_user, PDO::PARAM_STR);
          $this->query->bindValue(':document_user', $this->document_user, PDO::PARAM_STR);
          $this->query->bindValue(':email_user',    $this->email_user, PDO::PARAM_STR);
          $this->query->bindValue(':phone_user',    $this->phone_user, PDO::PARAM_INT);
          $this->query->bindValue(':id_country',    $this->id_country, PDO::PARAM_INT);
          $this->query->bindValue(':message_user',  $this->message_user, PDO::PARAM_STR);
          $this->query->execute();
          $result = $this->query->rowCount();
          $this->query = null;
          return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_user(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_users 
                where 
                    id_user = :id_user');
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function get_users(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_users');
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_user_multiple(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_users 
                inner join tbl_countries on tbl_users.id_country = tbl_countries.id_country
                where 
                    id_user = :id_user');
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_users_multiple(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_users 
                inner join tbl_countries on tbl_users.id_country = tbl_countries.id_country');
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function validate_user(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_users 
                where 
                    document_user= :document_user');
            $this->query->bindValue(':document_user', $this->document_user, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_user(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_users where id_user = :id_user');
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function update_user(){
        try {
            $this->query = $this->conn->prepare('update tbl_users set name_user =:name_user, lastname_user =:lastname_user, document_user = :document_user, email_user = :email_user, phone_user = :phone_user, id_country = :id_country, message_user = :message_user where id_user = :id_user');
            $this->query->bindValue(':name_user',       $this->name_user, PDO::PARAM_STR);
            $this->query->bindValue(':lastname_user',   $this->lastname_user, PDO::PARAM_STR);
            $this->query->bindValue(':document_user',   $this->document_user, PDO::PARAM_INT);
            $this->query->bindValue(':email_user',      $this->email_user, PDO::PARAM_STR);
            $this->query->bindValue(':phone_user',      $this->phone_user, PDO::PARAM_INT);
            $this->query->bindValue(':id_country',      $this->id_country, PDO::PARAM_INT);
            $this->query->bindValue(':message_user',    $this->message_user, PDO::PARAM_STR);
            $this->query->bindValue(':id_user',         $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    private function __clone(){
        trigger_error('Clone option does not allowed!.', E_USER_ERROR);
    }
}
