<?php 

namespace Base\Admin;

class SendMailToAuthorAfterPublishPost
{
    
    public function __construct()
    {
    	add_action(
            'publish_post',
             array($this,'CodechiefSendMailToAuthorAfterPublishingPost')
        );
    }

    public function CodechiefSendMailToAuthorAfterPublishingPost()
    {   

    	$check_email = get_option('codecheif_email_options');
        
        if( $check_email['email_check'] == 1 )
        {
        	global $post;

		    $author = $post->post_author; 

		    $name = get_the_author_meta( 'display_name', $author );

		    $email = get_the_author_meta( 'user_email', $author );

		    $title = $post->post_title;

		    $permalink = get_permalink($ID);

		    $edit = get_edit_post_link($ID, '');

		    $to[] = sprintf('%s <%s>',$name,$email);

		    $subject = sprintf('Published: %s',$title);

		    $message = sprintf("Congratulations , %s! Your article '%s' has been published." ."\n\n", $name,$title);

		    $message .= sprintf('View: %s',$permalink);

		    $headers[] = '';

		    wp_mail($to , $subject, $message, $headers);
        }
       else
        {
        	return null;
        }

    }
}
