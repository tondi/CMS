<?php
ini_set('display_errors', -1);
require('./smarty/Smarty.class.php');

include('../config.php');
include('../views/head.php');
include('../views/nav.php');


$view = new Smarty;

$view->assign('head', $partial_head);
$view->assign('navbar', $partial_navbar);

$view->display('../templates/add.tpl');

    
?>
    
