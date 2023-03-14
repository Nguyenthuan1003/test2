<?php
    namespace Models;
    use Models\Database;
    class Device extends Database{
        public $table = 'devices';
        
        public function all(){
            $device = new Device;
            $query = 'SELECT * FROM '.$this->table;
            return $devices = $device->getData($query, 0);
        }

        public function find($id){
            $device = new Device;
            $query = 'SELECT * FROM '.$this->table.' Where id='.$id;
            return $devices = $device->getData($query, 1);
        }

        public function store($data){
            $device = new Device;
            $query = 'INSERT INTO '.$this->table.'(`name`, `mac_address`, `ip`, `create_at`, `power`)
             VALUES ("'.$data['name'].'", "'.$data['mac_address'].'", "'.$data['ip'].'", "'.$data['create_at'].'", '.$data['power'].')';
            return $device->insertData($query);
        }

    }
?>