<?php
    namespace Models;
    class User extends Database{
        public $table = 'users';  

        public function all(){
            $user = new User;
            $query = 'SELECT * FROM '.$this->table;
            return $devices = $device->getData($query, 0);
        }
    }
?>