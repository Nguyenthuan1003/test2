<?php
    namespace Controllers;
    require_once './models/device.php';
    use Models\Device;
    class DeviceController extends Controller{
        public function index(){
            $device = new Device();
            return $devices = $device->all();
            // include_once './view/device/dashboard.php';
        }

        public function create(){
            $device = new Device();
            $data = [
                'name' => $_POST['name'],
                'mac_address' => $_POST['mac'],
                'ip' => $_POST['ip'],
                'create_at' => $_POST['date'],
                'power' => $_POST['power']
            ];
            $devices = $device->store($data);
            include_once './view/device/dashboard.php';
        }

    }
?>