<?php defined('_WP_FUEL_MVC') or die('No direct script access.');
class wpsimplecontactform_form_controller extends absController
{	

    public function index()
    {
        if(WPFuel::isPost())
        {
            $responseMessage = $this->_process();
            $this->ViewData('message',$responseMessage);
        }
        
        $this->View('form');
    }
    
    private function _process()
    {
        
        $data = $this->_request->getParams();
        if(isset($data['submit_form_btn']) == false)
            return;
        
        $errors = array();
        if(clsValidate::not_empty($data['full_name']) == false)
        {
            $errors['full_name'] = 'Name required';
        }
        else if(clsValidate::alpha_space($data['full_name']) == false)
        {
            $errors['full_name'] = 'Invalid name';
        }
        
        if(clsValidate::not_empty($data['email']) == false)
        {
            $errors['email'] = 'Email required';
        }
        elseif(clsValidate::email($data['email']) == false)
        {
            $errors['email'] = 'Invalid email address';
        }
        
        if(clsValidate::not_empty($data['subject']) == false)
        {
            $errors['subject'] = 'Subject required';
        }
        
        if(clsValidate::not_empty($data['message']) == false)
        {
            $errors['message'] = 'Message required';
        }
     
        if(count($errors) > 0)
        {
            $this->ViewData('row',$data);
            return array('type' => 'error', 'message' => $errors);
        }
        
 
        $this->_mail($data);
        return array('type' => 'success', 'message' => array('Thank you. Our representative will contact you shortly.'));

    }
    
    private function _mail($data)
    {
        $subject = "New Contact Request from ".$data['full_name']."";

        $message = "<html><body><table cellpadding='0' cellspacing='0' width='100%'>";

        foreach($data as $label=>$value)
        {
            if($value != "")
            {
                $label = ucWords(str_replace("_"," ",$label));
                $message .="<tr><td width='30%'>".$label."</td><td width='70%' colspan='2'>".nl2br($value)."</td></tr>";
            }
        }
        
        $message .="</table></body></html>";
        $message .="<tr><td>IP Address</td><td colspan='2'>".$_SERVER['REMOTE_ADDR']."</td></tr></table></body></html>";
       
        @wp_mail(get_option('admin_email'), $subject, $message);
        
    }
}
?>