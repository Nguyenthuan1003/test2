<?php
    require_once './models/Connection.php';
    require_once './models/Device.php';
    require_once './models/User.php';
    require_once './controllers/controller.php';
    require_once './controllers/DeviceController.php';
    require_once './controllers/UserController.php';

    use Controllers\DeviceController;
    use Controllers\User;

    $url = isset($_GET['url']) ? $_GET['url'] : '/';


    switch ($url) {
        case '/':
            include_once './view/users/index.php';
            break;
        case 'dashboard':
            $list = new DeviceController;
            $devices = $list->index();
            include_once './view/device/dashboard.php';
            break;
        case 'add':
            $list = new DeviceController;
            echo $list->create();
            break;
        default:
            # code...
            break;
    }
?>