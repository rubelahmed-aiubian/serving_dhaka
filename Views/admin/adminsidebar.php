<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('css/dashboard.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>

<body>
<div class="row">
    <div class="menu_col">
        <nav class="main-menu">
            <img class="client" src="<?= asset('images/client.png') ?>">
            <ul>
                </li>
                <li><a href="<?= url('admindashboard/manageadmin') ?>"><i class="fa fa-user fa-2x"></i><span class="nav-text">Manage Administrive</span></a></li>
                <li class="has-subnav"><a href="<?= url('admindashboard/manageemployee') ?>"><i class="fa fa-list fa-2x"></i><span class="nav-text">Manage Worker</span></a></li>
                <li class="has-subnav"><a href="<?= url('admindashboard/manageclient') ?>"><i class="fa fa-edit fa-2x"></i><span class="nav-text"> Manage Client</span></a></li>
                <li class="has-subnav"><a href="<?= url('admindashboard/updateprofile') ?>"><i class="fa fa-edit fa-2x"></i><span class="nav-text"> Update Profile</span></a></li>
            </ul>
            <ul class="logout">
                <li>
                    <a href="<?= url('admin/logout') ?>">
                        <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>