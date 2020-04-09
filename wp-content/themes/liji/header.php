<?php global $web; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liji</title>
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.css' type='text/css' />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div class="container-fluid">


    <header>
        <nav class="navbar navbar-expand-lg">
            <!--            <a class="navbar-brand" href="-->
            <?php //echo esc_url(home_url($web['pages']['home']['slug'])) ?><!--">-->
            <!--                <img src="wp-content/themes/liji/asset/img/liji.png"  alt="">-->
            <!--            </a>-->
            <ul class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <li><a class="navbar-brand " href="<?php echo esc_url(home_url($web['pages']['home']['slug'])) ?>"
                       title="">Accueil</a>
                </li>
                <li><a class="navbar-brand" href="<?php echo esc_url(home_url($web['pages']['listing']['slug'])); ?>"
                       title="">Liste pro</a>
                </li>
                <li><a class="navbar-brand"
                       href="<?php echo esc_url(home_url($web['pages']['inscription']['slug'])); ?>"
                       title="">Inscription</a>
                </li>
                <li><a class="navbar-brand" href="<?php echo esc_url(home_url($web['pages']['connexion']['slug'])); ?>"
                       title="">Connexion</a>
                </li>
                <li><a class="navbar-brand"
                       href="<?php echo esc_url(home_url($web['pages']['deconnexion']['slug'])); ?>"
                       title="">Deconnexion</a>
                </li>
                <li><a class="navbar-brand" href="<?php echo esc_url(home_url($web['pages']['contact']['slug'])); ?>"
                       title="">Contact</a>
                </li>
            </ul>
        </nav>
    </header><!-- /header -->
