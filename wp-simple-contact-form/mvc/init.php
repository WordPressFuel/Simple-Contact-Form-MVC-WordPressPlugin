<?PHP
if(defined('_WP_FUEL_MVC') == false)
{
    if(class_exists('absMVC_Plugin') == false)
    {
         $mvc_loader = WP_PLUGIN_DIR . "/wpfuel/load.php";
        
        if ( ! file_exists( $mvc_loader ) ) {
            wp_die( __('WordPress Fuel: Plugin Simple Contact Form requires WordPress Fuel.'));
        }
        else
        {
            
            require_once $mvc_loader;
        }

    }
}
?>