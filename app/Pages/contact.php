<?php 


namespace App\Pages;

class Contact
{
    
    public static function LoadContactPageMarcup()
    {
    	echo '<form class="contact100-form validate-form" id="codechief_form">
    	        <p id="form_error" style="color:green"></p>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
				<span class="label-input100">Full Name:</span>

				<input 
				     class="input100" 
				     type="text" 
				     name="name" 
				     id="codechief_form_name"
				     placeholder="Enter full name">
				     <div class="name_error_text"></div>

				<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
				<span class="label-input100">Email:</span>

				<input 
				      class="input100" 
				      type="email" 
				      name="email"
				      id="codechief_form_email" 
				      placeholder="Enter email addess">
				      <span class="email_error_text"></span>

				<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Phone is required">
				<span class="label-input100">Subject:</span>

				<input 
				       class="input100" 
				       type="text" 
				       name="subject" 
				       id="codechief_form_subject"
				       placeholder="Enter subject">
				       <span class="subject_error_text"></span>

				<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Message is required">
				<span class="label-input100">Message:</span>

				<textarea 
				         class="input100" 
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
