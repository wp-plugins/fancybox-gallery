<?php
/*
 * Plugin Name: FancyBox Gallery
 * Plugin URI: http://wordpress.org/extend/plugins/fancybox-gallery/
 * Description: Integrates the FancyBox jQuery plugin to generate pop-up image overlays for WordPress galleries. .
 * Author: Dougal Campbell
 * Author URI: http://dougal.gunters.org/
 * Version: 0.2
 * Min WP Version: 2.5
 * Max WP Version: 2.7
 */
 
class WPFancyBox {

  function WPFancyBox() {
    $urlpath = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__));
    wp_enqueue_script('fancybox', $urlpath . '/fancybox/jquery.fancybox-1.0.0.js', array('jquery'), '1.0.0');
    wp_enqueue_script('pngFix', $urlpath . '/fancybox/jquery.pngFix.pack.js', array('fancybox'), '1.1');
    wp_enqueue_style('fancybox', $urlpath . '/fancybox/fancy.css');
  }
  

}

function wpfb_init() {
  global $wpfb;
  
  $wpfb = new WPFancyBox();
}

function wpfb_activate() {
  global $wpfb;
  
?>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.gallery-icon a')
      .fancybox({'overlayShow': true, 'hideOnContentClick': true, 'overlayOpacity': 0.85});
  });
</script>
<?php
}

add_action('init', 'wpfb_init');
add_action('wp_head', 'wpfb_activate');
?>