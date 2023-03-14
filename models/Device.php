<?php
    namespace Models;
    use Models\Database;
    use PDO;
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
             VALUES (?, ?, ?, ?, ?)';
             $device->insertData($data,$query);
        }

        public function update($data){
            $device = new Device;
            $query = 'UPDATE '.$this->table.' SET `name`=?, `mac_address`=?, `ip`=?, `create_at`=?, `power`=? WHERE id=?';
            $device->insertData($data,$query);
        }

        public function destroy($id){
            $device = new Device;
            $query = 'DELETE FROM '.$this->table.' WHERE id = '.$id;
            $device->delete($id, $query);
        }

        public function countPage(){
            $device = new Device;
            $sql = 'SELECT COUNT(id) AS total FROM '.$this->table;
            return $device->getData($sql, 0);
        }

        public function paginate($limit, $start){
            $device = new Device;
            $sql = 'SELECT * FROM '.$this->table." LIMIT $start, $limit";
            return $device->getData($sql, 0);
        }

    }
?>