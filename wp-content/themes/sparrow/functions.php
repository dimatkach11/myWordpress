<?php
// hook wp_enqueue_scripts: si collega nel momento che WordPress comincia a collegare i suoi style attraverso l'hook wp_head();
add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');

add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('portfolio', array(
		'labels'             => array(
			'name'               => 'portfolio', // Основное название типа записи
			'singular_name'      => 'portfolio', // отдельное название записи типа Book
			'add_new'            => 'aggiungere lavoro',
			'add_new_item'       => 'aggiunta lavoro',
			'edit_item'          => 'modifica lavoro',
			'new_item'           => 'nuovo lavoro',
			'view_item'          => 'vedi lavoro',
			'search_items'       => 'cerca lavoro nel portfolio',
			'not_found'          => 'non trovat',
			'not_found_in_trash' => 'non trovato nel cestino',
			'parent_item_colon'  => '',
			'menu_name'          => 'Portfolio'

		  ),
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'query_var'             => false,
		'rewrite'               => true,
		'capability_type'       => 'post',
		'has_archive'           => false,
		'hierarchical'          => false,
		'menu_position'         => 4,
    'supports'              => array('title','editor','author','thumbnail','excerpt','comments'),
    'taxonomies'            => array('Skills')
    // 'exclude_from_search'   => false
	) );
}

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
	register_taxonomy( 'skills', [ 'portfolio' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Skills',
			'singular_name'     => 'Skill',
			'search_items'      => 'Search Skill',
			'all_items'         => 'All Skill',
			'view_item '        => 'View Skill',
			'parent_item'       => 'Parent Skill',
			'parent_item_colon' => 'Parent Skill:',
			'edit_item'         => 'Edit Skill',
			'update_item'       => 'Update Skill',
			'add_new_item'      => 'Add New Skill',
			'new_item_name'     => 'New Skill Name',
			'menu_name'         => 'Skills',
		],
		'description'           => 'Skills più utilizzate nel progetto', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		// 'capabilities'          => array(),
		// 'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		// 'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		// 'show_in_rest'          => null, // добавить в REST API
		// 'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

add_filter( 'document_title_separator', 'my_sep' );
function my_sep( $sep ){
	$sep = ' | ';
	return $sep;
}

add_filter('the_content', 'test_content');
function test_content($content) {
  $content.='Testo in più aggiunto attraverso il filtro';
  return $content;
}

add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => "left_sidebar",
		'description'   => '',
    'class'         => '',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title'  => '<h5 class="widget-title">',
		'after_title'   => "</h5>\n",
  ) );
	register_sidebar( array(
		'name'          => 'Right Sidebar',
		'id'            => "right_sidebar",
		'description'   => '',
    'class'         => '',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title'  => '<h5 class="widget-title">',
		'after_title'   => "</h5>\n",
	) );
}

/**
 * Funzione degli stili.
 *
 * @see header.php -> dove viene richiamato attraverso wp_nav_menu();
 */
function theme_register_nav_menu() {
  register_nav_menu( 'top', 'Menu header' );
  register_nav_menu( 'footer', 'Menu footer' );

  add_theme_support( 'title-tag' );

  add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) );
  add_image_size( 'post_thumb', 1300, 500, true );

  add_theme_support( 'post-formats', array( 'video', 'aside' ) );

  add_filter( 'excerpt_more', 'new_excerpt_more' );
  function new_excerpt_more( $more ){
    global $post;
    return '<a href="'. get_permalink($post) . '"> [...]</a>';
  }

  // удаляет H2 из шаблона пагинации
  add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
  function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
      <h2 class="screen-reader-text">%2$s</h2>
      <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
    <nav class="navigation %1$s" role="navigation">
      <div class="nav-links">%3$s</div>
    </nav>    
    ';
  }

  // выводим пагинацию
  the_posts_pagination( array(
    'end_size' => 2,
  ) ); 
}

/**
 * Funzione degli stili.
 *
 * @see header.php -> dove viene richiamato attraverso wp_head();
 */
function style_theme() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
  wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
  wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');
function send_mail() {
  $contactName = $_POST['contactName'];
  $contactEmail = $_POST['contactEmail'];
  $contactSubject = $_POST['contactSubject'];
  $contactMessage = $_POST['contactMessage'];

  // подразумевается что $to, $subject, $message уже определены...

  // удалим фильтры, которые могут изменять заголовок $headers
  remove_all_filters( 'wp_mail_from' );
  remove_all_filters( 'wp_mail_from_name' );

  $to = 'dimitritkach@gmail.com';

  $headers = array(
    'From: ' . $contactEmail,
    'content-type: text/html'
  );



  wp_mail( "dimitritkach@gmail.com", $contactSubject, $contactMessage, $headers );
  wp_die();
}

/**
 * Funzione degli scripts.
 *
 * @see header.php -> dove viene richiamato attraverso wp_footer();
 */
function scripts_theme() {
  // отменяем зарегистрированный jQuery
  // вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
  //jQuery
	//wp_deregister_script( 'jquery-core' );
  wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');

	// регистрируем
	wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
	wp_register_script( 'jquery', false, array('jquery-core'), null, true );

	// подключаем
	wp_enqueue_script( 'jquery' );
  
  wp_enqueue_script('js/jquery-migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js');
  wp_enqueue_script('jquery-flexsliderjs', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery'], null, true);
  wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery'], null, true);
  wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js', ['jquery'], null, true);
  wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', ['jquery'], null, null, false);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true);
}

//shortcodes
add_shortcode('my_shortcode', 'my_shortcode_function');
function my_shortcode_function() {
  return '<p>Questo è uno shortcode di test </p>';
}

add_shortcode( 'iframe', 'Generate_iframe' );

function Generate_iframe( $atts ) {
	$atts = shortcode_atts( array(
		'href'   => 'http://example.com',
		'height' => '550px',
		'width'  => '600px',     
	), $atts );

	return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
}

// использование: 
// [iframe href="http://www.exmaple.com" height="480" width="640"]