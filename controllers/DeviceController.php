<?php
    namespace Controllers;
    require_once './models/device.php';
    class DeviceController extends Controller{
        public function __construct(){
            $device = new Device();
        }
        public function index(){
            $query = 'SELECT * FROM $this->table';
            return $diveces = $this->$device->getData($query, 0);
        }
    }
?>