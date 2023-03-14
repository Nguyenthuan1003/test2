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
                        <a href="../../thuannm_week2/index.php?url=dashboard">
                            <i class="fa-solid fa-house-laptop"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="dashboard-menu_item">
                        <a href="../../index.php?url=logs">
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
                                    <a href="../../index.php?url=logs">
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
                    <?php
                        if(!is_array($devices)){

                        }
                        if(is_array($devices)){
                            foreach($devices as $device){

                            }
                        }
                    ?>
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
                    <form action="../../thuannm_week2/index.php?url=add" class="dashboard-form" method="post" enctype="multipart/form-data">
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
                            <input type="submit" name="submit" id="save" value="Add device">
                            <!-- <button type="submit" id="update"><a href="./dashboard.php?url=update">Update device</a></button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/dashboard.js"></script>
</body>

</html>