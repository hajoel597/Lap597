<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BBH+Bogle&family=Stardos+Stencil:wght@400;700&display=swap"
        rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="nav-down">
        <a href="/" class="logo">Lap597</a>
        <div class="panel-open material-symbols-outlined">
            menu
        </div>
    </header>
    <div class="panel close">
        <div class="panel-header">
            <div></div>
            <div class="panel-close material-symbols-outlined">close</div>
        </div>
        <div class="panel-content">
            <div class="panel-search">
                <?php get_search_form(); ?>
            </div>
            <div class="panel-menu">
                <ul class="panel-menu-category">
                    <li>Product</li>
                    <li>Advertisement</li>
                    <li>Eta</li>
                    <li>Editor's Pick</li>
                </ul>
            </div>
        </div>
    </div>

    <main>