<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once './models/Connection.php';
    require_once './models/Device.php';
    require_once './models/User.php';
    require_once './controllers/controller.php';
    require_once './controllers/DeviceController.php';
    require_once './controllers/UserController.php';

    use Controllers\DeviceController;
    use Controllers\UserController;

    $url = isset($_GET['url']) ? $_GET['url'] : '/';
    // echo $url; die;

    switch ($url) {
        case '/':
            include_once './view/users/index.php';
            break;
        case 'dashboard':
            $list = new DeviceController;
            echo $devices = $list->index();
            break;
        case 'add':
            $list = new DeviceController;
            echo $list->create();
            break;
        case 'edit':
            $list = new DeviceController;
            echo $list->edit();
            break;
        case 'update':
            $list = new DeviceController;
            echo $list->update();
            break;
        case 'delete':
            $list = new DeviceController;
            echo $list->delete();
            break;
        case 'logs':
            $list = new DeviceController;
            echo $list->paginates();
            break;
        case 'search':
            $list = new DeviceController;
            echo $list->delete();
            break;
        default:
            # code...
            break;
    }
?>