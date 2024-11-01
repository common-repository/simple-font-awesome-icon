<?php
/*
  Plugin Name: Simple Font Awesome Icon
  Plugin URI: https://wordpress.org/plugins/simple-font-awesome-icon/
  Version: 1.0.1
  Author: Jomol MJ
  Author URI: https://codingdom.wordpress.com/
  Description: Simple Font Awesome Icon plugin will give you the option for adding font awesome icons as a custom field to your post or pages.
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: simple-font-awesome-icon
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function simple_fontawesome_icon_meta_box_markup($object){
    wp_nonce_field(basename(__FILE__), 'meta-box-font-awesome-nonce');
    $icon_class = get_post_meta($object->ID, 'font-awesome-icon', true);
    ?>
        <div>
            <label for="meta-box-font-awesome">Font Awesome Icon</label>
            <input name="meta-box-font-awesome" autocomplete="off" class="font-text-box" id="fontIcon" type="text" value="<?php echo esc_html( $icon_class ); ?>">
            <div id="loader" class="hide">Loading...</div>
            <div id="listIcons"></div>            
        </div>
    <?php  
}

function simple_font_awesome_add_meta_box(){
    add_meta_box('font-awesome-meta-box', 'Font Awesome Icon Box', 'simple_fontawesome_icon_meta_box_markup',
    	array('post','page'), 'normal', 'high', null);
}

add_action('add_meta_boxes', 'simple_font_awesome_add_meta_box');

function simple_font_awesome_save_meta_box($post_id, $post, $update){
    if (!isset($_POST['meta-box-font-awesome-nonce']) || !wp_verify_nonce($_POST['meta-box-font-awesome-nonce'], basename(__FILE__)))
        return $post_id;

    if(!current_user_can('edit_post', $post_id))
        return $post_id;

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;    

    $meta_box_font_awesome_value = '';
    if(isset($_POST['meta-box-font-awesome'])){
        $meta_box_font_awesome_value = sanitize_text_field($_POST['meta-box-font-awesome']);
    }   
    update_post_meta($post_id, 'font-awesome-icon', $meta_box_font_awesome_value);     
}

add_action('save_post', 'simple_font_awesome_save_meta_box', 10, 3);


function simple_font_awesome_admin_scripts() {
	wp_register_style( 'font-awesome-admin-css',plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', false, '4.7.0' );
  wp_enqueue_style( 'font-awesome-admin-css' );
  wp_register_style( 'admin-style-css',plugin_dir_url( __FILE__ ) . 'css/style.css', false, '4.7.0' );
  wp_enqueue_style( 'admin-style-css' );
	wp_enqueue_script('font-awesome-yaml-js', plugin_dir_url( __FILE__ ) . 'js/js-yaml.min.js');
	wp_enqueue_script('custom-js', plugin_dir_url( __FILE__ ) . 'js/custom.js');
  $translation_array = array( 'pluginUrl' =>plugin_dir_url(__FILE__) );
  wp_localize_script( 'custom-js', 'jsVars', $translation_array );

}
add_action('admin_enqueue_scripts', 'simple_font_awesome_admin_scripts');

function simple_font_awesome_scripts() {
	wp_register_style( 'fontawesome-css',plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', false, '4.7.0' );
  wp_enqueue_style( 'fontawesome-css' );
}

add_action( 'wp_enqueue_scripts', 'simple_font_awesome_scripts' );