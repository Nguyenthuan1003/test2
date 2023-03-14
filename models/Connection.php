<?php
    namespace Models;
    use PDO;
    use PDOException;

    class Database{
        protected $host;
        protected $username;
        protected $password;

        public function __construct(){
            $this->host = 'mysql:host=localhost;dbname=thuannm_week2';
            $this->username = 'root';
            $this->password = '';
        }

        public function connection(){
            try {
                return new PDO($this->host, $this->username, $this->password);
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        public function getData($sql, $getOne){
            try {
                $conn = $this->connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if($getOne == 1){
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                }
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw $e;
            }finally{
                unset($conn);
            }
            
        }

        public function insertData($sql){
            try{
                $conn = $this->connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }
            catch(PDOException $e){
                throw $e;
            }finally{
                unset($conn);
            }
        }
    }
?>