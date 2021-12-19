<?php
if (!function_exists('asset')){
    function asset($name=null){
        return 'http://'.$_SERVER['HTTP_HOST'].'/serving_dhaka/assets/'.$name;
    }
}
if (!function_exists('url')){
    function url($name=null){
//        return '/index.php?url='.$name;
        return 'http://'.$_SERVER['HTTP_HOST'].'/serving_dhaka/index.php?url='.$name;
    }
}
if (!function_exists('get_header')){
    function get_header($sub='includes'){
        include  'Views/'.$sub.'/header.php';
    }
}
if (!function_exists('get_footer')){
    function get_footer($sub='includes'){
        include  'Views/'.$sub.'/footer.php';
    }
}
if(!function_exists('get_admin_sideber')){
    function get_admin_sidebar($sub = 'admin'){
        include 'Views/'.$sub.'/adminsidebar.php';
    }
}
