<?php 


	// Enqueue Scripts
	
	function dl_enqueue_scripts() {
		$theme_data = wp_get_theme();

		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'jquery-migrate' );
		
		wp_register_script('jQuery3', get_parent_theme_file_uri('/assets/javascripts/lib/jquery.min.js'), null, '3.2.1', false);
		wp_register_script('jQuery_migrate', get_parent_theme_file_uri('/assets/javascripts/lib/jquery-migrate.min.js'), array('jQuery3'), '3.0.0', false);
		wp_register_script('scrollOverFlow', get_parent_theme_file_uri('/assets/javascripts/lib/scrolloverflow.js'), array('jQuery_migrate'), null, false);
		wp_register_script('fullPage', get_parent_theme_file_uri('/assets/javascripts/lib/fullpage.js'), array('jQuery_migrate'), null, false);
		wp_register_script('mainJS', get_parent_theme_file_uri('/assets/javascripts/scripts.js'), array('jQuery_migrate'), null, true);

		wp_enqueue_script('scrollOverFlow');
		wp_enqueue_script('fullPage');
		wp_enqueue_script('mainJS');
	}
	
	add_action( 'wp_enqueue_scripts', 'dl_enqueue_scripts' );


	// Enqueue Styles

	function dl_enqueue_style() {
		$theme_data = wp_get_theme();
		
		wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,600|Saira+Condensed:700');
		wp_register_style('fullPage', get_parent_theme_file_uri('/assets/stylesheets/fullpage.css'), null, $theme_data->get( 'Version' ), 'screen');
		wp_register_style('animate', get_parent_theme_file_uri('/assets/stylesheets/animate.css'), null, $theme_data->get( 'Version' ), 'screen');
		wp_register_style('mainCSS', get_parent_theme_file_uri('/assets/stylesheets/main.css'), null, $theme_data->get( 'Version' ), 'screen');
		wp_register_style('masonry', get_parent_theme_file_uri('/assets/stylesheets/masonry.css'), null, $theme_data->get( 'Version' ), 'screen');
		wp_register_style('form', get_parent_theme_file_uri('/assets/stylesheets/form.css'), null, $theme_data->get( 'Version' ), 'screen');
		
		wp_enqueue_style('fonts');
		wp_enqueue_style('fullPage');
		wp_enqueue_style('animate');
		wp_enqueue_style('mainCSS');
		wp_enqueue_style('masonry');
		wp_enqueue_style('form');
		
	}

	add_action( 'wp_enqueue_scripts', 'dl_enqueue_style' );

	// Hide admin bar

	add_filter('show_admin_bar', '__return_false');

	// Featured image

	add_theme_support( 'post-thumbnails' ); 

	// Excerpt lenght

	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

 //Modificar el nombre de menú Entradas
	function modificar_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Servicios';
    $submenu['edit.php'][5][0] = 'Servicios';
    $submenu['edit.php'][10][0] = 'A&ntilde;adir Servicios';
   
    echo '';
}

function modificar_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Servicios';
    $labels->singular_name = 'Servicio';
    $labels->add_new = 'A&ntilde;adir Nuevo';
    $labels->add_new_item = 'A&ntilde;adir Nuevo Servicio';
    $labels->edit_item = 'Editar Servicio';
    $labels->new_item = 'Nuevo Servicio';
    $labels->view_item = 'Ver Servicio';
    $labels->search_items = 'Buscar Servicios';
    $labels->not_found = 'No se han encontrado Servicios';
    $labels->not_found_in_trash = 'No se han encontrado Servicios en la papelera';
    $labels->all_items = 'Todas los Servicios';
    $labels->menu_name = 'Servicios';
    $labels->name_admin_bar = 'Servicios';
    
}

add_action( 'admin_menu', 'modificar_post_label' );
add_action( 'init', 'modificar_post_object' );
?>