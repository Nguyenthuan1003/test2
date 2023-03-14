<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="dashboard-row">
        <div class="dashboard-left">
            <div class="dashboard-left_title">
                <i class="fa-solid fa-diagram-project"></i>
                <h3>Device Management</h3>
            </div>
            <nav>
                <ul class="dashboard-menu">
                    <li class="dashboard-menu_item">
                        <a href="../../index.php?url=dashboard">
                            <i class="fa-solid fa-house-laptop"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="dashboard-menu_item">
                        <a href="../../index.php?url=logs&page=1">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            Logs
                        </a>
                    </li>
                    <li class="dashboard-menu_item">
                        <a href="">
                            <i class="fa-solid fa-gear"></i>
                            Settings
                        </a>
                    </li>
                    <li class="dashboard-menu_item">
                        <a href="../../index.php?url=/">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="dashboard-right">
            <div class="dashboard-right_title">
                <i class="fa-solid fa-circle-user"></i>
                <div class="dashboard-information">Welcome Join</div>
            </div>
            <div class="menu-mobile">
                <input type="checkbox" name="" id="menu-mobile">
                <div class="bar">
                    <label for="menu-mobile" class="bar"><i class="fa-solid fa-bars"></i></label>
                </div>
                <div class="check-mobile">
                    <div class="relative">
                        <label for="menu-mobile"><i class="fa-solid fa-xmark"></i></label>
                        <div class="dashboard-mobile_title">
                            <div class="mobile-icon">
                                <i class="fa-solid fa-circle-user"></i>
                            </div>
                            <div class="dashboard-information">Welcome Join</div>
                        </div>
                        <nav>
                            <ul class="dashboard-menu">
                                <li class="dashboard-menu_item">
                                    <a href="../../index.php?url=dashboard">
                                        <i class="fa-solid fa-house-laptop"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="dashboard-menu_item">
                                    <a href="../../index.php?url=logs&page=1">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                        Logs
                                    </a>
                                </li>
                                <li class="dashboard-menu_item">
                                    <a href="#">
                                        <i class="fa-solid fa-gear"></i>
                                        Settings
                                    </a>
                                </li>
                                <li class="dashboard-menu_item">
                                    <a href="../../index.php?url=/">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="dashboard-container">
                <table class="dashboard-table" table border=1 frame=void rules=rows>
                    <thead>
                        <tr class="dashboard-table_grid table-line">
                            <th class="text-start">Device</th>
                            <th class="text-end">Mac Address</th>
                            <th class="text-end">IP</th>
                            <th class="text-end">Created Date</th>
                            <th class="text-end">Power Consummption (Kw/H)</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="dashboard-table">
                    <?php if(!is_array($devices)) : ?>
                        <tr class="dashboard-table_grid table-hover">
                            <td class="text-start table-line-over chart-name"><?= $devices['name']?></td>
                            <td class="text-end table-line-over"><?= $devices['mac_address']?></td>
                            <td class="text-end table-line-over"><?= $devices['ip']?></td>
                            <td class="text-end table-line-over"><?= $devices['create_at']?></td>
                            <td class="text-end table-line-over chart-power"><?= $devices['power']?></td>
                            <td class="text-center table-line-over"><button class="edit">Edit</button></td>
                            <td class="text-center table-line-over"><button class="delete">Delete</button></td>
                        </tr>
                    <?php elseif(is_array($devices)) : ?>
                        <?php foreach($devices as $device) : ?>
                            <tr class="dashboard-table_grid table-hover">
                                <td class="text-start table-line-over chart-name"><?= $device['name']?></td>
                                <td class="text-end table-line-over"><?= $device['mac_address']?></td>
                                <td class="text-end table-line-over"><?= $device['ip']?></td>
                                <td class="text-end table-line-over"><?= $device['create_at']?></td>
                                <td class="text-end table-line-over chart-power"><?= $device['power']?></td>
                                <td class="text-center table-line-over"><a href="../../index.php?url=edit&id=<?=$device['id']?>"><button class="edit">Edit</button></a></td>
                                <td class="text-center table-line-over"><a href="../../index.php?url=delete&id=<?=$device['id']?>"><button class="delete">Delete</button></a></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                    </tbody>
                    <tfoot>
                        <tr class="tfoot">
                            <td>Total</td>
                            <td id="sum" class="text-end" colspan="4"></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="dashboard-row_right">
                    <div class="dashboard-chart">
                        <canvas id="myChart" class="chart" style="max-width: 100%; height: 100%;"></canvas>
                    </div>
                    <form action="../../index.php?url=add" class="dashboard-form" method="post" enctype="multipart/form-data" id="save">
                        <div class="dashboard-input">
                            <input type="text" id="name" placeholder="Name" name="name">
                            <label for="" class="error" id="name-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="text" id="mac" placeholder="Mac Address" name="mac">
                            <label for="" class="error" id="mac-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="text" id="ip" placeholder="IP" name="ip">
                            <label for="" class="example">Example IP: 192.168.0.1</label>
                            <label for="" class="error" id="ip-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="date" id="date" name="date">
                            <label for="" class="error" id="date-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="number" id="power" placeholder="power" name="power">
                            <label for="" class="error" id="power-error"></label>
                        </div>
                        <div class="dashboard-btn">
                            <button type="submit" name="submit" value="save">Add device</button>
                        </div>
                    </form>
                    <form action="../../index.php?url=update" class="dashboard-form" method="post" enctype="multipart/form-data" id="update">
                        <input type="hidden" name="id" value="<?= isset($oneDevice['id']) ? $oneDevice['id'] : ''?>">
                        <div class="dashboard-input">
                            <input type="text" id="name" placeholder="Name" name="name" value="<?= isset($oneDevice['name']) ? $oneDevice['name'] : '' ?>">
                            <label for="" class="error" id="name-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="text" id="mac" placeholder="Mac Address" name="mac" value="<?= isset($oneDevice['mac_address']) ? $oneDevice['mac_address'] : '' ?>">
                            <label for="" class="error" id="mac-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="text" id="ip" placeholder="IP" name="ip" value="<?= isset($oneDevice['ip']) ? $oneDevice['ip'] : '' ?>">
                            <label for="" class="example">Example IP: 192.168.0.1</label>
                            <label for="" class="error" id="ip-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="date" id="date" name="date" value="<?= isset($oneDevice['create_at']) ? $oneDevice['create_at'] : '' ?>">
                            <label for="" class="error" id="date-error"></label>
                        </div>
                        <div class="dashboard-input">
                            <input type="number" id="power" placeholder="power" name="power" value="<?= isset($oneDevice['power']) ? $oneDevice['power'] : '' ?>">
                            <label for="" class="error" id="power-error"></label>
                        </div>
                        <div class="dashboard-btn">
                            <button type="submit" name="update" id="update-btn" value="update">Update device</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/dashboard.js"></script>
</body>

</html>