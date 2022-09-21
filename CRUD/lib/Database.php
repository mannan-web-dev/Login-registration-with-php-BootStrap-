<?php 

class Database{
private $hostdb ="localhost";
private $userdb ="root";
private $passdb ="00800974";
private $namedb ="db_crud";
 public $pdo;
    public function __construct(){
        if(!isset($this->pdo)){
            try{
                $link = new PDO("mysql:host=".$this->hostdb."; dbname=".$this->namedb, $this->userdb, $this->passdb);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET UTF8");
                $this->pdo =$link;

            } catch(PDOExaception $ex){
                die("Database connection failed".$ex->getMessage());

            }

        }


    }
    
}

?>