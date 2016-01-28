<?php
	// =========== CUSTOM CAROUSEL WIDGET ===========
	require_once("support/tau_carousel.php");

	// =========== CUSTOM SEARCH WIDGET ===========
	require_once("support/tau_search.php");

	// =========== CUSTOM MENU WALKER FOR BOOTSTRAP ===========
	require_once("support/bt_menu_walker.php");

	// =========== THEME SETUP ===========
	function init_tau_theme() {
		register_taxonomy_for_object_type('category', 'attachment');
	}
	add_action('init', 'init_tau_theme');

	//function my_theme_localized() {
		//return "uk_UA";
	//}
	//add_filter( 'locale', 'my_theme_localized' );

	function setup_tau_theme() {
		
		// Load Text Domain
		load_theme_textdomain('tau_theme', get_template_directory().'/lang');

		// Register Nav Menu
		register_nav_menus(array(
			'main_nav' => __('Primary Menu'),
			//'side_nav' => __('Sidebar Menu')
		));

		// Thumbnail Support
		add_theme_support('post-thumbnails');
		add_image_size('post-thumb', 170, 170, True);

		//add_image_size('carousel-thumb', 1170, 352, True);
	}
	add_action('after_setup_theme', 'setup_tau_theme');

	// =========== THEME MOD SETUP ===========
	function tau_theme_customizer($wp_customize) {
	
		//Add Theme Logo Support
		$wp_customize->add_setting('tau_logo');
		$wp_customize->add_section('tau_logo_section', array(
			'title' => __('Logo', 'tau_theme'),
			'priority' => 30,
			'description' => "Website Logo"
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tau_logo_control', array(
			'label' => __('Logo', 'tau_theme'),
			'section' => 'tau_logo_section',
			'settings' => 'tau_logo'
		)));


		/* Navbar Colors */

		// Colors Section
		$wp_customize->add_section('tau_navbar_colors', array(
			'title' => __('Navbar Colors', 'tau_theme'),
			'priority' => 10
		));

		// Navbar Background Color
		$wp_customize->add_setting('tau_navbar_bg_cl', array(
			'default' => "#F8981D",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_bg_cl_md', array (
			'label' => __('Navbar Background', 'tau_theme'),
			'section' => "tau_navbar_colors",
			'settings' => "tau_navbar_bg_cl"
		)) );

		// Navbar Item Hover Color
		$wp_customize->add_setting('tau_navbar_hov_cl', array(
			'default' => "#F8981D",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_hov_cl_md', array (
			'label' => __('Navbar Item (Hover)', 'tau_theme'),
			'section' => "tau_navbar_colors",
			'settings' => "tau_navbar_hov_cl"
		)) );
		// Navbar Item Hover Text Color
		$wp_customize->add_setting('tau_navbar_hov_txt_cl', array(
			'default' => "#eaeaea",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_hov_txt_cl_md', array (
			'label' => __('Navbar Item Text (Hover)', 'tau_theme'),
			'section' => "tau_navbar_colors",
			'settings' => "tau_navbar_hov_txt_cl"
		)) );


		// Navbar Selected Item Color
		$wp_customize->add_setting('tau_navbar_sel_cl', array(
			'default' => "#ff7e00",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_sel_cl_md', array (
			'label' => __('Navbar Item (Selected)', 'tau_theme'),
			'section' => "tau_navbar_colors",
			'settings' => "tau_navbar_sel_cl"
		)) );

		// Navbar Selected Item Text Color
		$wp_customize->add_setting('tau_navbar_sel_txt_cl', array(
			'default' => "#fff",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_sel_txt_cl_md', array (
			'label' => __('Navbar Item Text (Selected)', 'tau_theme'),
			'section' => "tau_navbar_colors",
			'settings' => "tau_navbar_sel_txt_cl"
		)) );


		// Navbar Active Item Color
		$wp_customize->add_setting('tau_navbar_act_cl', array(
			'default' => "#ffae46",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_act_cl_md', array (
			'label' => __('Navbar Item (Active)', 'tau_theme'),
			'section' => "tau_navbar_colors",
			'settings' => "tau_navbar_act_cl"
		)) );
		// Navbar Active Item Text Color
		$wp_customize->add_setting('tau_navbar_act_text_cl', array(
			'default' => "#fff",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_act_text_cl_md', array (
			'label' => __('Navbar Item Text (Active)', 'tau_theme'),
			'section' => "tau_navbar_colors",
			'settings' => "tau_navbar_act_text_cl"
		)) );

		/* Customize Carousel Colors */
		
		//Carousel Section
		$wp_customize->add_section('tau_carousel_colors', array(
			'title' => __('Carousel Colors', 'tau_theme'),
			'priority' => 12
		));

		// Carousel Title Color
		$wp_customize->add_setting('tau_carousel_title_cl', array(
			'default' => "#F8981D",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_carousel_title_cl_md', array (
			'label' => __('Carousel Title', 'tau_theme'),
			'section' => "tau_carousel_colors",
			'settings' => "tau_carousel_title_cl"
		)) );
		// Carousel Title Text Color
		$wp_customize->add_setting('tau_carousel_title_txt_cl', array(
			'default' => "#fff",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_carousel_title_txt_cl_md', array (
			'label' => __('Carousel Title Text', 'tau_theme'),
			'section' => "tau_carousel_colors",
			'settings' => "tau_carousel_title_txt_cl"
		)) );
		// Carousel Indicator Color
		$wp_customize->add_setting('tau_carousel_indicator_col', array(
			'default' => "#fff",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_carousel_indicator_col_md', array (
			'label' => __('Carousel Indicator', 'tau_theme'),
			'section' => "tau_carousel_colors",
			'settings' => "tau_carousel_indicator_col"
		)) );

		/* Customize Navbar Dropdown Colors */

		// Navbar Dropdown Colors
		$wp_customize->add_section('tau_dropdown_colors', array(
			'title' => __('Navbar Dropdown Colors', 'tau_theme'),
			'priority' => 11
		));
		
		// Navbar Dropdown Background
		$wp_customize->add_setting('tau_navbar_dropdown_bg_cl', array(
			'default' => "#fff",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_dropdown_bg_md', array (
			'label' => __('Background', 'tau_theme'),
			'section' => "tau_dropdown_colors",
			'settings' => "tau_navbar_dropdown_bg_cl"
		)) );

		// Navbar Dropdown Text
		$wp_customize->add_setting('tau_navbar_dropdown_text_cl', array(
			'default' => "#000",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_dropdown_text_md', array (
			'label' => __('Text', 'tau_theme'),
			'section' => "tau_dropdown_colors",
			'settings' => "tau_navbar_dropdown_text_cl"
		)) );

		// Navbar Dropdown Item (Hover)
		$wp_customize->add_setting('tau_navbar_dropdown_hov_cl', array(
			'default' => "#f5f5f5",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_dropdown_hov_md', array (
			'label' => __('Item (Hover)', 'tau_theme'),
			'section' => "tau_dropdown_colors",
			'settings' => "tau_navbar_dropdown_hov_cl"
		)) );

		// Navbar Dropdown Item Text (Hover)
		$wp_customize->add_setting('tau_navbar_dropdown_hov_text_cl', array(
			'default' => "#000",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_dropdown_hov_text_md', array (
			'label' => __('Item Text (Hover)', 'tau_theme'),
			'section' => "tau_dropdown_colors",
			'settings' => "tau_navbar_dropdown_hov_text_cl"
		)) );

		// Navbar Dropdown Item (Active)
		$wp_customize->add_setting('tau_navbar_dropdown_act_cl', array(
			'default' => "#ffae46",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_dropdown_act_md', array (
			'label' => __('Item (Active)', 'tau_theme'),
			'section' => "tau_dropdown_colors",
			'settings' => "tau_navbar_dropdown_act_cl"
		)) );

		// Navbar Dropdown Item Text (Active)
		$wp_customize->add_setting('tau_navbar_dropdown_act_text_cl', array(
			'default' => "#fff",
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'tau_navbar_dropdown_act_text_md', array (
			'label' => __('Item Text (Active)', 'tau_theme'),
			'section' => "tau_dropdown_colors",
			'settings' => "tau_navbar_dropdown_act_text_cl"
		)) );

	}
	add_action('customize_register', 'tau_theme_customizer');

	// Set Customiable Colors
	function setup_tau_custom_css() {
	?>
		<style type="text/css">
			/*
				Dropdown Background: tau_navbar_dropdown_bg_cl
				Dropdown Background (Text): tau_navbar_dropdown_text_cl

				Dropdown Item (Hover): tau_navbar_dropdown_hov_cl
				Dropdown Item Text (Hover): tau_navbar_dropdown_hov_text_cl

				Dropdown Item (Active): tau_navbar_dropdown_act_cl
				Dropdown Item Text (Active): tau_navbar_dropdown_act_text_cl
			*/

			/* Carousel Title */
			.carousel-title {
				background-color: <?php echo get_theme_mod('tau_carousel_title_cl'); ?>;
				color: <?php echo get_theme_mod('tau_carousel_title_txt_cl'); ?>;
			}
			/* Carousel Indicators */
			.carousel-indicators > li {
				border-color: <?php echo get_theme_mod('tau_carousel_indicator_col'); ?>;
			}
			.carousel-indicators > .active {
				background-color: <?php echo get_theme_mod('tau_carousel_indicator_col'); ?>;
			}

			/* Navbar */
			.navbar-default {
				background-color: <?php echo get_theme_mod('tau_navbar_bg_cl'); ?>
			}

			/* Navbar Item (Hover) */
			.navbar-default .navbar-nav > li > a:hover,
			.navbar-default .navbar-nav > li > a:focus {
				color: <?php echo get_theme_mod('tau_navbar_hov_txt_cl'); ?>;
				background-color: <?php echo get_theme_mod('tau_navbar_hov_cl'); ?>;
			}
			/* Navbar Branding Area (Hover) */
			.navbar-default .navbar-brand:hover,
			.navbar-default .navbar-brand:focus {
				color: <?php echo get_theme_mod('tau_navbar_hov_txt_cl'); ?>;
				background-color: <?php echo get_theme_mod('tau_navbar_hov_cl'); ?>;
			}

			/* Navbar Mobile Menu Button (Selected) */
			.navbar-default .navbar-toggle:hover,
			.navbar-default .navbar-toggle:focus {
				background-color: <?php echo get_theme_mod('tau_navbar_sel_cl'); ?>;
			}
			/* Navbar Item (Selected) */
			.navbar-default .navbar-nav > .open > a, 
			.navbar-default .navbar-nav > .open > a:hover, 
			.navbar-default .navbar-nav > .open > a:focus {
				color: <?php echo get_theme_mod('tau_navbar_sel_txt_cl'); ?>;
				background-color: <?php echo get_theme_mod('tau_navbar_sel_cl'); ?>;
			}

			/* Navbar Item (Active) */
			.navbar-default .navbar-nav > .active > a, 
			.navbar-default .navbar-nav > .active > a:hover, 
			.navbar-default .navbar-nav > .active > a:focus,
			.navbar-default .navbar-nav > .current-menu-parent > a,
			.navbar-default .navbar-nav > .current-menu-parent > a:hover,
			.navbar-default .navbar-nav > .current-menu-parent > a:focus {
				color: <?php echo get_theme_mod('tau_navbar_act_text_cl'); ?>;
				background-color: <?php echo get_theme_mod('tau_navbar_act_cl'); ?>;
			}

			
			/* Dropdown Menu */
			.navbar-default .navbar-nav .dropdown-menu {
				background-color: <?php echo get_theme_mod('tau_navbar_dropdown_bg_cl'); ?> ;
			}
			/* Dropdown Menu Item  */
			.dropdown-menu > li > a,
			.dropdown-menu > li > a {
				color: <?php echo get_theme_mod('tau_navbar_dropdown_text_cl'); ?>;
			}
			/* Dropdown Menu Item (Active)  */
			.dropdown-menu > .active > a,
			.dropdown-menu > .active > a:hover,
			.dropdown-menu > .active > a:focus {
				color: <?php echo get_theme_mod('tau_navbar_dropdown_act_text_cl'); ?>;
				background-color: <?php echo get_theme_mod('tau_navbar_dropdown_act_cl'); ?>;
			}
			/* Navbar Item (Hover) */
			.dropdown-menu > li > a:hover,
			.dropdown-menu > li > a:focus {
				background-color: <?php echo get_theme_mod('tau_navbar_dropdown_hov_cl'); ?>;
				color: <?php echo get_theme_mod('tau_navbar_dropdown_hov_text_cl'); ?>;
			}
			/* Dropdown Menu (Mobile Style) */
			@media (max-width: 767px) {
				/* Dropdown Menu Item (Active) */
				.navbar-default .navbar-nav .open .dropdown-menu > .active > a,
				.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
				.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
					color: <?php echo get_theme_mod('tau_navbar_act_text_cl'); ?>;
					background-color: <?php echo get_theme_mod('tau_navbar_act_cl'); ?>;
				}

				/* Dropdown Menu Item (Hover) */
				.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
				.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
					color: <?php echo get_theme_mod('tau_navbar_hov_txt_cl'); ?>;
					background-color: <?php echo get_theme_mod('tau_navbar_hov_cl'); ?>;
				}
			}
		</style>
	<?php
	}
	add_action('wp_head', 'setup_tau_custom_css');

	// =========== WIDGET SETUP ===========
	function setup_tau_widgets() {

		// Register "Right" Sidebar
		register_sidebar(array(
			'name' => 'Right Sidebar',
			'id' => 'right_bar',

			// Title Formating
			'before_title' => '<div class="panel-heading"> <h4 class="panel-title">',
			'after_title' => '</h4> </div> <div class="panel-body"> ',

			// Widget Formating
			'before_widget' => '<div class="panel panel-default sidebar-panel">',
			'after_widget' => '</div> </div>'
		));

		// Register "News Right" Sidebar
		register_sidebar(array(
			'name' => 'Archive Sidebar',
			'id' => 'arch_bar',

			// Title Formating
			'before_title' => '<div class="panel-heading"> <h4 class="panel-title">',
			'after_title' => '</h4> </div> <div class="panel-body sidebar-body"> ',

			// Widget Formating
			'before_widget' => '<div class="panel panel-default sidebar-panel">',
			'after_widget' => '</div> </div>'
		));

		// Register Homepage 
		register_sidebar(array(
			'name' => 'Homepage Top Bar',
			'id' => 'home_bar'
		));

		// Register Carousel
		//register_widget('TAU_Carousel');

		// Register Search Widget
		register_widget('TAU_Search');
	}
	add_action('widgets_init', 'setup_tau_widgets');

	// =========== STYLE SHEETS ===========

	// Set Stylesheet
	function TAU_set_style() {
		wp_enqueue_style('style', get_stylesheet_uri());
	}
	add_action('wp_enqueue_scripts', 'TAU_set_style');

	
	// =========== READ MORE ===========

	// Set Read More Length
	$post_w_length = 50;
	function new_excerpt_length($len) {
		return $len;
	}
	add_filter('excerpt_length', 'new_excerpt_length', $post_w_length);

	// Read More Link
	function new_excerpt_more($more) {
		global $post;
		return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	// Prints Excerpt
	$more_post = False;
	function print_the_excerpt() {
		global $more_post, $post_w_length;

		$excerpt = get_the_excerpt();

		$exwords = explode(' ', $excerpt);
		$wcont = count($exwords);

		if ($wcont >= $post_w_length) {
			$more_post = True;
			$excerpt = $excerpt . " [...]";
		} else {
			$more_post = False;
		}

		echo $excerpt;
	}

?>
