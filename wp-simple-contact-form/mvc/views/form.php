<div class="main_container"><div class="form_container">
        
        <?PHP if(isset($message)): ?>
        <ul class="system_messages" id="msg_flash_ul">
            <li id="li_msg" class="<?PHP echo $message['type']; ?>">
                    <span class="ico"></span>
                    <strong class="system_title">
                        
                    <?PHP foreach($message['message'] as $k => $message_text): ?>
                        <?PHP echo $message_text; ?><br />
                     <?PHP endforeach; ?>
                        
                    </strong>
            </li>
        </ul>
        <?PHP endif; ?>
        
        <form method="POST" class="rounded_form" action="<?PHP echo clsUri::currentURL(); ?>">
            <fieldset>
                
                <div class="field_box">

                        <span class="field_area">
                            <label>Your Name *</label>
                            <input type="text" id="full_name" name="full_name" value="<?PHP echo $row['full_name']; ?>">
                        </span>


                </div>
                
                <div class="field_box">

                        <span class="field_area">
                                <label>Email *</label>
                            <input type="text" id="email" name="email" value="<?PHP echo $row['email']; ?>">
                        </span>

                </div>
      
                <div class="field_box">

                        <span class="field_area">
                            <label>Subject *</label>
                             <input type="text" id="subject" name="subject" value="<?PHP echo $row['subject']; ?>">
                          
                        </span>

                </div>
                
                <div class="field_box">

                        <span class="field_area">
                                <label>Message *</label>
                           <textarea id="message" name="message"><?PHP echo $row['message']; ?></textarea>
                        </span>
   
                </div>
       
                <div class="field_box">

                    <span class="field_area">
                          <input type="submit" value="Submit" id="submit_btn" class="form-btn-submit" name="submit_form_btn">
                          <span style="display:none;" id="msg_bottom" class="info_area bottom_info"></span>
                    </span>

                </div>
            </fieldset>
        </form>
    </div>
</div>