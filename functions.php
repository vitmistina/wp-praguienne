<?php

function themeSetup ()
{
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  register_nav_menu( 'primary', 'Horní menu' );
  register_sidebar( array(
		'name'          => 'Hlavní sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Hlavní sidebar do kterého lze přidávat widgety',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'after_setup_theme', 'themeSetup' );

add_image_size( 'extra-large', 1920, 1080 ); // Soft Crop Mode

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'extra-large' => __( 'Extra Large' ),
    ) );
}

function themeScripts ()
{
  wp_enqueue_style( 'praguienne-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700|Amatic+SC:700|Rock+Salt&amp;subset=latin-ext' , array(), null );
  wp_enqueue_style( 'bootstrap-min-css',get_theme_file_uri( '/css/bootstrap.min.css'));
  wp_enqueue_style( 'praguienne-style', get_stylesheet_uri(), null, filemtime(get_stylesheet_directory()."/style.css") );
  // wp_enqueue_script( 'jquery-min', get_theme_file_uri( '/js/jquery-3.1.1.min.js' ) );
  wp_enqueue_script( 'praguienne-js', get_theme_file_uri( '/js/script.js' ), array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'themeScripts' );


function praguienneEchoTimePostedLink()
{
  echo '<span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
  the_time( get_option( 'date_format' ) );
  echo '</a></span>';
}

function praguienneEchoTimePosted()
{
  echo '<span>';
  the_time( get_option( 'date_format' ) );
  echo '</span>';
}

function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts','SearchFilter');


 ?>
