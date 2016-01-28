<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

		<!-- Icons -->
		<link rel="icon" sizes="192x192" href="<?php echo esc_url(get_theme_mod('tau_logo')); ?>">
		<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('tau_logo')); ?>">
		<link rel="mask-icon" href="<?php echo Get_template_directory_uri()."/" ?>TAU_Logo_Inversed_Apple_Pin.svg" color="red">

		<!-- BootStrap Stylesheets -->
		<link rel="stylesheet" href="<?php echo Get_template_directory_uri()."/" ?>bootstrap/css/bootstrap.min.css"></link>

		<!-- JQuerry -->
		<script src="<?php echo Get_template_directory_uri()."/" ?>js/jquery.min.js"></script>

		<!-- Page Title Block -->
		<title><?php bloginfo('name'); wp_title(); ?></title>

		<?php wp_head(); ?>
	</head>

	<body>
		<!-- Page Navigation -->
		<nav class="navbar navbar-default">
			<div class="container">
			
				<!-- Navbar Header -->
				<div class="navbar-header">
					<!-- Brand Name/Link -->
					<a class="navbar-brand" href="/">
						<img src="<?php echo esc_url(get_theme_mod('tau_logo')); ?>">
					</a>

					<!-- Mobile Menu Button -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button> <!-- /Mobile Menu Button -->
				</div> <!-- /nav-header -->


				<!-- Main Navbar -->
				<?php 
					wp_nav_menu(array(
						'theme_location' => "main_nav",

						'container' => 'div',
						'container_id' => 'main-nav',
						'container_class' => 'collapse navbar-collapse',

						'menu_class' => "nav navbar-nav",

						'walker' => new bt_menu_walker()
					)); 
				?> <!-- /main navbar -->

			</div> <!-- /container-fluid -->
		</nav> <!-- /page navigation -->

		<!-- Main Page Content -->
		<div class="container">
