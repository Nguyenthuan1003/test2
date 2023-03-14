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
            $this->username = 'thuannm';
            $this->password = '12345678';
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

        public function insertData($data,$sql){
            try{
                $conn = $this->connection();
                $stmt = $conn->prepare($sql);
                if(isset($data->name) && isset($data->mac_address)){
                    if(isset($data->id)){
                        $dataBinding = [
                            $data->name,
                            $data->mac_address,
                            $data->ip,
                            $data->create_at,
                            $data->power,
                            $data->id
                        ];
                    }
                    if(!isset($data->id)){
                        $dataBinding = [
                            $data->name,
                            $data->mac_address,
                            $data->ip,
                            $data->create_at,
                            $data->power
                        ];
                    }
                    
                }
                $stmt->execute($dataBinding);
            }
            catch(PDOException $e){
                throw $e;
            }finally{
                unset($conn);
            }
        }

        public function delete($data,$sql){
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