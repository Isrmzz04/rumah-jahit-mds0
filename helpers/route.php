<?php

$routes = array(
    array(
        'url' => 'index.php',
        'label' => 'Home'
    ),
    array(
        'url' => 'index.php?page=products',
        'label' => 'Products'
    ),
    array(
        'url' => 'index.php?page=sign_in',
        'label' => 'Sign In'
    ),
    array(
        'url' => '#cart',
        'label' => '<i class=\'bx bx-shopping-bag\'></i>'
    ),

);

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$pages = array(
    'home' => 'home.php',
    'logout' => 'logout.php',
    'products' => array(
        'default' => '../products.php',
    ),
);

?>