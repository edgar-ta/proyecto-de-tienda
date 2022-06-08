<?php

include_once "D:\high-school\semester-4\programming-male\proyecto-de-tienda\php\global.php";

$logged_in = getLoggedIn();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Edgar Trejo Avila">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/dropdown-menu.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://kit.fontawesome.com/fc25a4cfe5.js" crossorigin="anonymous"></script>
    
    <title>Proyecto de Tienda</title>
</head>
<body>
    <nav class="navbar">
        <div>
            <ul class="menu menu__ul">
                <li class="menu__li">
                    <p class="menu__p menu__p--first hoverable pointerable"><i class="fa-solid fa-bars"></i></p>
                    <ul class="menu__ul">
                        <li class="menu__li">
                            <p class="menu__p hoverable pointerable"><i class="fa-solid fa-bell menu__li__icon"></i> Recomendados</p>
                        </li>
                        <li class="menu__li">
                            <p class="menu__p hoverable pointerable"><i class="fa-solid fa-trophy menu__li__icon"></i> Calidad Precio</p>
                        </li>
                        <li class="menu__li">
                            <p class="menu__p hoverable pointerable"><i class="fa-solid fa-dollar-sign menu__li__icon"></i> Más Vendidos</p>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- 
                Voy a ponerle su jardín a pancha mamá,
                pero ha de ser de flores extranjeras, mamá,
                aunque se enojen toditas las solteras, mamá,
                solo los ojos de Pancha y no más.

                block := ul > li > p > [ block ]
             -->
        </div>
        <p class="navbar__title black-text-border pointerable">
            Tienda de Informática
        </p>
        <ul class="navbar__account">
            <!-- I think it is actually pointable; not pointerable -->
            <?php
            $type = $logged_in? "admin": "log-in";
            ?>
            <li class="navbar__li hoverable pointerable" title="Cuenta">
                <a class="navbar__a" href="account.php?type=<?= $type ?>">
                    <i class="fa-regular fa-user           fa-solid black-text-border"></i>
                </a>
            </li>
            <li class="navbar__li hoverable pointerable" title="Carrito">
                <a class="navbar__a" href="cart.php?type=<?= $type ?>">   
                    <i class="fa-regular fa-cart-shopping  fa-solid black-text-border"></i>
                </a>
            </li>
            <li class="navbar__li hoverable pointerable" title="Tarjeta">
                <a class="navbar__a" href="card.php?type=<?= $type ?>">   
                    <i class="fa-regular fa-credit-card    fa-solid black-text-border"></i>
                </a>
            </li>
        </ul>
    </nav>