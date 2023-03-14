<?php
    namespace Controllers;
    require_once './models/Device.php';
    use Models\Device;
    class DeviceController extends Controller{
        public function index(){
            $device = new Device();
            $devices = $device->all();
            include_once './view/device/dashboard.php';
        }

        public function create(){
            $device = new Device();
            $allDevice = $device->all();
            $err = [];
            if(isset($_POST['submit']) && $_POST['submit']){
                if(!isset($_POST['name'])){
                    $err['name'] = 'Please enter a name';
                }
                if(!isset($_POST['mac'])){
                    $err['mac'] = 'Please enter a MAC address';
                }
                if(!isset($_POST['ip'])){
                    $err['ip'] = 'Please enter a IP address';
                }
                if(!isset($_POST['date'])){ 
                    $err['date'] = 'Please enter a date';
                }
                if(!isset($_POST['power'])){
                    $err['power'] = 'Please enter a power number';
                }
                if(isset($_POST['name']) && $_POST['name']){
                    if(!preg_match('/^[A-Z][A-Za-z0-9\s]+$/', $_POST['name'])){
                        $err['name'] = 'Name invalid';
                    }
                }
                if(isset($_POST['ip']) && $_POST['ip']){
                    if(!preg_match('/^((25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(\.|$)){4}\b/', $_POST['ip'])){                        
                        $err['ip'] = 'IP invalid';
                    }
                }
                foreach ($allDevice as $item) {
                    if($item['name'] === $_POST['name']){
                        $err['name'] = 'Name already exist';
                    }
                    if($item['ip'] === $_POST['ip']){
                        $err['ip'] = 'IP already exist';
                    }
                }
                if(!array_filter($err)){
                    $device->name = $_POST['name'];
                    $device->ip = $_POST['ip'];
                    $device->mac_address = $_POST['mac'];
                    $device->create_at = $_POST['date'];
                    $device->power = $_POST['power'];
                    $device->store($device);
                }
            }
            $devices = $this->index();
        }

        public function edit(){
            if(isset($_GET['id']) && $_GET['id']){
                $device = new Device();
                $devices = $device->all();
                $oneDevice = $device->find($_GET['id']);
                include_once './view/device/dashboard.php';
            }
        }

        public function update(){
            $device = new Device();
            $allDevice = $device->all();
            $err = [];
            if(isset($_POST['update']) && $_POST['update']){
                $id = $_POST['id'];
                if(!isset($_POST['name'])){
                    $err['name'] = 'Please enter a name';
                }
                if(!isset($_POST['mac'])){
                    $err['mac'] = 'Please enter a MAC address';
                }
                if(!isset($_POST['ip'])){
                    $err['ip'] = 'Please enter a IP address';
                }
                if(!isset($_POST['date'])){ 
                    $err['date'] = 'Please enter a date';
                }
                if(!isset($_POST['power'])){
                    $err['power'] = 'Please enter a power number';
                }
                if(isset($_POST['name']) && $_POST['name']){
                    if(!preg_match('/^[A-Z][A-Za-z0-9\s]+$/', $_POST['name'])){
                        $err['name'] = 'Name invalid';
                    }
                }
                if(isset($_POST['ip']) && $_POST['ip']){
                    if(!preg_match('/^((25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(\.|$)){4}\b/', $_POST['ip'])){                        
                        $err['ip'] = 'IP invalid';
                    }
                }
                foreach ($allDevice as $item) {
                    if($item['id'] !== $id){
                        if($item['name'] === $_POST['name']){
                            $err['name'] = 'Name already exist';
                        }
                        if($item['ip'] === $_POST['ip']){
                            $err['ip'] = 'IP already exist';
                        }
                    }
                }
                if(!array_filter($err)){
                    $device->name = $_POST['name'];
                    $device->ip = $_POST['ip'];
                    $device->mac_address = $_POST['mac'];
                    $device->create_at = $_POST['date'];
                    $device->power = (int)$_POST['power'];
                    $device->id = (int)$id;
                    $device->update($device);
                }
            }
            $devices = $this->index();
        }

        public function delete(){
            if(isset($_GET['id']) && $_GET['id']){
                $device = new Device();
                $oneDevice = $device->find($_GET['id']);
                if($oneDevice){
                    $device->destroy($_GET['id']);
                }
                $devices = $device->all();
                include_once './view/device/dashboard.php';
            }
        }

        public function paginates(){
            $device = new Device();
            $limit = 2;
            $total = $device->countPage();
            $number_record = (int)$total[0]['total'];
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $number_page = ceil($number_record/$limit);
            $start = $page*$limit;
            $devices = $device->paginate($limit, $start);
            include_once './view/device/logs.php';
        }

    }
?>