<?php defined('_WP_FUEL_MVC') or die('Silence is golden.');
class scoWPSimpleContactForm_ShortCode extends absMVC_Shortcode
{
    public function render_form($shortcode_attributes,$content = null)
    {
        global $post;
        
        if(is_single($post))
        {
            $oPlugin = $this->getPlugin();
            $plugin_file = $oPlugin->getPluginFile();

            wp_enqueue_style('contact-simple-form-styles', plugins_url( '/assets/css/style.css', $plugin_file ),false,'1.1','all');
            
            return $oPlugin->dispatchRequest("form",array('shortcode_attributes' => (array)$shortcode_attributes));
        }
    }
}
?>