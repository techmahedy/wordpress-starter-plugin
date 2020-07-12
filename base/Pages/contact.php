<?php 

/**
 * @package codechief
 */

namespace Base\Pages;

class Contact
{
    
    public static function codechief_contact_page_markup()
    {   
        /**
	      *--------------------------------------------------------------------
	      * get contact form options page data
	      *--------------------------------------------------------------------
	      */

    	$box_options = get_option('codecheif_contact');

        $class_name = $box_options['codechief_contact_custom_class_name'];
        
        $final_class = isset( $class_name ) ? $class_name : "input100";

    	echo '<form class="contact100-form validate-form" id="codechief_form">
    	        <p id="form_error" style="color:green"></p>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
				<span class="label-input100">'.esc_html(__('Full Name','codechief')).'</span>

				<input 
				     class="'.esc_html($final_class,'codechief').'" 
				     type="text" 
				     name="name" 
				     id="codechief_form_name"
				     placeholder="Enter full name">
				     <div class="name_error_text"></div>

				<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
				<span class="label-input100">'.__('Email','codechief').'</span>

				<input 
				      class="'.esc_html($final_class,'codechief').'" 
				      type="email" 
				      name="email"
				      id="codechief_form_email" 
				      placeholder="Enter email addess">
				      <span class="email_error_text"></span>

				<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Phone is required">
				<span class="label-input100">'.__('Subject','codechief').'</span>

				<input 
				       class="'.esc_html($final_class,'codechief').'" 
				       type="text" 
				       name="subject" 
				       id="codechief_form_subject"
				       placeholder="Enter subject">
				       <span class="subject_error_text"></span>

				<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Message is required">
				<span class="label-input100">'.__('Message','codechief').'</span>

				<textarea 
				         class="'.esc_html($final_class,'codechief').'" 
				         name="message" 
				         id="codechief_form_message"
				         placeholder="Your Comment...">
				</textarea>
				<span class="body_error_text"></span>

				<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
				<button class="contact100-form-btn" id="codechief_contact_submit">
				<span>
				Submit

				<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
				</span>
				</button>
				</div>
			</form>';
    }


}
