<?php
/* 
Plugin Name: WP Simple Contact Form
Description: Simple Form to email. Send form submission to admin. Shortcode: [simple_contact_form][/simple_contact_form]
Author: Muneeb
Version: 0.1
*/
require_once "mvc/init.php";

if(class_exists('WPFuel_SimpleContactForm_Plugin') == false)
{
    class WPFuel_SimpleContactForm_Plugin extends absMVC_Plugin
    {
        /*
        * Unique Slug for every plugin
        * Must be one word without any special characters
        */
        protected $_plugin_slug = "wpsimplecontactform";
        
        protected function _init()
        {
            //nothing to init
        }
        
        /**
         * Initialize any front-end related code for this plugin
         * @uses absMVC_Shortcode
         */
        public function initFront()
        {
            $this->add_shortcode("simple_contact_form", "scoWPSimpleContactForm_ShortCode","render_form");
        }
    }
}

new WPFuel_SimpleContactForm_Plugin(__FILE__);
?>