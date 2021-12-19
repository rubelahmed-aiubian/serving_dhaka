<!DOCTYPE html>
<html lang="en">
<head>
    <title>Client Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=asset('css/dashboard.css')?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>
<body><div class="area"></div>
    <nav class="main-menu">
        <img class="client" src="<?=asset('images/client.png')?>">
        <ul>
            <li><a href="<?=url('dashboard/profile')?>"><i class="fa fa-user fa-2x"></i><span class="nav-text">My Profile</span></a></li>
            <li class="has-subnav"><a href="<?=url('dashboard/profile')?>"><i class="fa fa-list fa-2x"></i><span class="nav-text">Hired Worker List</span></a></li>
            <li class="has-subnav"><a href="<?=url('dashboard/profile')?>"><i class="fa fa-dollar fa-2x"></i><span class="nav-text">Payment</span></a></li>
            <li class="has-subnav"><a href="<?=url('dashboard/profile')?>"><i class="fa fa-edit fa-2x"></i><span class="nav-text">Update Profile</span></a></li>
            <li class="has-subnav"><a href="<?=url('dashboard/profile')?>"><i class="fa fa-edit fa-2x"></i><span class="nav-text">Profile</span></a></li>
        </ul>
        <ul class="logout">
            <li>
                <a href="<?=url('auth/logout')?>">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</body>
</html>