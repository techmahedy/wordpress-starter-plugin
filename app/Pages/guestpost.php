<?php 

/**
 * @package codechief
 */

namespace App\Pages;

class GuestPost
{
    
    public static function LoadGuestPostPageMarcup()
    {  

    	?>

		 <div class="container">
		  <form action="action_page.php">
		    <div class="row">
		      <div class="col-25">
		        <label for="fname"><?php echo esc_html("Title","codechief") ?> </label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="fname" name="firstname" placeholder="Enter post title">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="subject"><?php echo esc_html("Content","codechief") ?></label>
		      </div>
		      <div class="col-75">
		        <textarea id="mytextarea" name="subject" placeholder="Write something.." style="height:200px" class="tinymce-enabled required"></textarea>
		      </div>
		    </div>
		    <div class="row">
		      <input type="submit" value="Submit">
		    </div>
		  </form>
		</div>'

<?php

    }

}
