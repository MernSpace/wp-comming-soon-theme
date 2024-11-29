<?php
function launcher_setup_theme(){
    load_theme_textdomain('launcher');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'launcher_setup_theme');



function launcher_scripts(){
    wp_enqueue_style('launcher-style', get_stylesheet_uri());
    wp_enqueue_style('animate-css', get_theme_file_uri('/assets/css/animate.css'));
    wp_enqueue_style('icommon-css', get_theme_file_uri('/assets/css/icomoon.css'));
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('/assets/css/bootstrap.css'));
    wp_enqueue_style('style-css', get_theme_file_uri('/assets/css/style.css'));

    //js enqueue
    wp_enqueue_script('jquery','//code.jquery.com/jquery-3.6.0.min.js');
    wp_enqueue_script('easing-jquery-js',get_theme_file_uri('/assets/js/jquery.easing.1.3.js'),array('jquery'),true);
    wp_enqueue_script('bootstrap-jquery-js',get_theme_file_uri('/assets/js/bootstrap.min.js'),array('jquery'),true);
//    wp_enqueue_script('waypoints-jquery-js',get_theme_file_uri('/assets/js/jquery.waypoints.min.js'),array('jquery'),true);
    wp_enqueue_script('countdown-jquery-js',get_theme_file_uri('/assets/js/simplyCountdown.js'),array('jquery'),true);
//    wp_enqueue_script('waypoints','//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js');
    wp_enqueue_script('waypoints','//cdn.jsdelivr.net/npm/waypoints@4.0.1/lib/jquery.waypoints.min.js');

    wp_enqueue_script('main-jquery-js',get_theme_file_uri('/assets/js/main.js'),array('jquery'),true);



}
add_action('wp_enqueue_scripts', 'launcher_scripts');







function launcher_widgets_init(){
    register_sidebar(array(
        'name' => __('Footer Left', 'launcher'),
        'id' => 'footer-left',
        'description' => __('Footer Left', 'launcher'),
        'before_widget' => '<aside id="%1$s" class="text-right widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',

    ));
    register_sidebar(array(
        'name' => __('Footer Right', 'launcher'),
        'id' => 'footer-right',
        'description' => __('Footer Right', 'launcher'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',

    ));
}
add_action('widgets_init', 'launcher_widgets_init');

function launcher_style()
{
    if(is_page()){
        $thumbnail_url = get_the_post_thumbnail_url(null, 'large');
        ?>
<style>
    .home-slide{
        background-image: url(<?php echo $thumbnail_url; ?>);
    }
</style>
<?php
    }
}



add_action('wp_head', 'launcher_style');