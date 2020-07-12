<?php 

/**
 * @package codechief
 */

namespace Base\Pages;

class GuestPost
{
    
    public static function codechief_guestpost_markup()
    {   

	   if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") 
	   {
        
        $title = sanitize_text_field($_POST['title']);
        $content = sanitize_text_field($_POST['content']);

		$codechief_guest_post = array(
		    'post_title'    =>  $title,
		    'post_content'  =>  $content,
		    'post_status'   => 'pending ',
		    'post_type'     => 'post'
		);
         
        if ( $title == '' || $content == '')
        {
		
		 echo '<span style="color:red;">'.esc_html('Errors: please enter title and body','codechief').'<span>';
 
		}
	    else 
	    {
           wp_insert_post($codechief_guest_post);

           echo "<span style='color:green;'> Success: your post have been submitted to admin! <span>";
	    }
	   }

    ?>

		 <div class="container">
		  <form id="new_post" name="new_post" method="post" action="">
		    <div class="row">
		      <div class="col-25">
		        <label for="title"><?php echo esc_html("Title","codechief") ?> </label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="title" name="title" placeholder="Enter post title">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="subject"><?php echo esc_html("Content","codechief") ?></label>
		      </div>
		      <div class="col-75">
		        <textarea id="mytextarea" name="content" placeholder="Write something.." style="height:200px" class="tinymce-enabled required"></textarea>
		      </div>
		    </div>
		    <div class="row">
		      <input type="submit" value="Submit" style="margin-top: 10px;">
		    </div>
		      <input type="hidden" name="action" value="new_post" />
		    <?php wp_nonce_field( 'new-post' ); ?>
		  </form>
		</div>'

<?php

    }

}
