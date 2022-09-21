<?php 
        include_once 'Session.php';
        include './Database.php';
        class User
 {
        private $db;
        public function __construct(){
            $this->db = new Database();  
        }
        
        public function userregistation ($data){
            $name = $data['name'];
            $uname = $data['uname'];
            $email = $data['email'];
            $pwd = $data['pwd'];

            $chk_email = $this->emailCheck($email);

            if ($name ==" " OR $uname == "" OR $email == "" OR $pwd=="") {

                $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> Field not be blanck</div>";
                return $msg;
            }
        
            if ( strlen($uname) < 3) {
                $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> username too short</div>";
                return $msg;
            } 
            elseif ( preg_match ('/[^a-z0-9_-]+/i' , $uname)){
                $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> Field not be blanck</div>";
            return $msg;
        }

            
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> Eamil is not mathcing</div>";
            return $msg;
        }
        // if ( $chk_email == false) 
        // {
        //     $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> Eamil is already  exist</div>";
        //     return $msg;
        // }

        $sql = "INSERT INTO users ( name, uname, email, pwd) VALUES (:name, :uname, :email, :pwd)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':uname', $uname);
        $query->bindValue(':email', $email);
        $query->bindValue(':pwd', $pwd);
        $result= $query->execute();

        if ($result) {
            $msg = "<div class='alert alert-success'> <strong> Success !</strong> Thankyou for registration</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong>  DAta insterting problem</div>";
            return $msg;
        }
        
        }

        Public function emailCheck($email){
            $sql = " SELECT email FROM users WHERE email = :email";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->execute();
            if ($query->rowCount() >0) {
                return true;
            } else{
                return false; 
            }
        }


        public function getLoginUser($email, $pwd){
            $sql = " SELECT * FROM users WHERE email = :email AND pwd = :pwd LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->bindValue(':pwd', $pwd);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return  $result;
        }

        public function userLogin($data){
            $email = $data['email'];
            $pwd = $data['pwd'];

            $chk_email = $this->emailCheck($email);

            if ($email == "" OR $pwd=="") {

                $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> Email dose nor correct</div>";
                return $msg;
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> Eamil is not mathcing</div>";
                return $msg;
            }
            // if ( $chk_email == false) 
            // {
            //     $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> Eamil is Not  exist</div>";
            //     return $msg;
            // }

            $result =$this->getLoginUser($email, $pwd);

            if ($result) {
                session:: init();
                session::set("login", true);
                session::set("id", $result->id);
                session::set("name", $result->name);
                session::set("uname", $result->uname);
                session::set("loginmsg","<div class='alert alert-danger'> <strong> Success !</strong> Your are log in </div>");
                header("location: index.php");
            }else{
                $msg = "<div class='alert alert-danger'> <strong> EROOR !</strong> User not found </div>";
                return $msg;
            }

        }
         
        public  function getuserData(){
            $sql = " SELECT * FROM users  ORDER BY id DESC";
            $query = $this->db->pdo->prepare($sql);
            $query->execute(); 
            $result = $query->fetchAll();
            return $result;
        }
         

        public  function getUserById($id){
            $sql = " SELECT * FROM users WHERE id =:id LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return  $result;
        }
       
    }

?>