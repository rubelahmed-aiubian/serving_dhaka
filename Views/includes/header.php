<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Serving Dhaka</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=asset('css/style.css')?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>
<body>
<header>
  <a class="logo" href="<?=url()?>"><img src="<?=asset( 'images/logo.png')?>" alt="logo"></a>
  <nav>
    <ul class="nav__links">
      <li><a href="<?=url('home/about')?>">About Us</a></li>
      <li><a href="<?=url('home/services')?>">Our Services</a></li>
      <li><a href="<?=url('home/worker')?>">Hire Worker</a></li>
      <li><a href="<?=url('home/contact')?>">Contact</a></li>
      <li><a href="<?=url('auth/register')?>">Don't have an account <i class="fa fa-user-plus" aria-hidden="true"></i></i></a></li>
    </ul>
  </nav>
  <a class="cta" href="<?=url('auth/login')?>">Login</a>
  <a class="cta" href="<?=url('admin/login')?>">Admin Login</a>
  <a class="cta" href="<?=url('admin/register')?>">Admin</a>
</header>
</body>
</html>