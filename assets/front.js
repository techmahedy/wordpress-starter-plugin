(function($){

  $(document).ready(function(){

    $("body").on("click","#codechief-like",function(){

      var _id = $(this).data('id');
      var _result = $('#message');
      

       jQuery.ajax({

         url: my_ajax_object.ajax_url,

         type: 'post',

         data: {
             action: 'codechief_like_ajax_post_request',

             post_id: _id,

         },
         success: function(response){

             jQuery(_result).html("Thanks for your feedback");

         },
         error: function(error){

           console.log(error.responseText)

         }
       });

    })



    //Contact form
    $("body").on("click","#codechief_contact_submit",function(e){
       
       e.preventDefault();
       var _show_success_message = $('#form_error');
       
       var _name = $('#codechief_form_name').val().length;
       var _email = $('#codechief_form_email').val().length;
       var _subject = $('#codechief_form_subject').val().length;
       var _body = $('#codechief_form_message').val().length;
       
       if( _name < 1) 
       {
         $(".name_error_text")
         .html("")
         .addClass('alert-validate focus-input100')
       }

      if( _name > 1) 
       {
          $(".name_error_text")
         .html("")
         .removeClass('alert-validate focus-input100')
       }

      if( _email < 5) 
       {
         $(".email_error_text")
         .html("")
         .addClass('alert-validate focus-input100')
       }

       if( _email > 5) 
       {
         $(".email_error_text")
         .html("")
         .removeClass('alert-validate focus-input100')
       }

      if( _subject < 1) 
       {
         $(".subject_error_text")
         .html("")
         .addClass('alert-validate focus-input100')
       }

      if( _subject > 1) 
       {
         $(".subject_error_text")
         .html("")
         .removeClass('alert-validate focus-input100')
       }

      if( _body < 10) 
       {
         $(".body_error_text")
         .html("")
         .addClass('alert-validate focus-input100')
       }

      if( _body > 10) 
       {
         $(".body_error_text")
         .html("")
         .removeClass('alert-validate focus-input100')
       }

       var _name = $('#codechief_form_name').val();
       var _email = $('#codechief_form_email').val();
       var _subject = $('#codechief_form_subject').val();
       var _body = $('#codechief_form_message').val();


       if( _name.length > 1 && _email.length > 5 && _subject.length > 1 && _body.length > 10) 
       {
        jQuery.ajax({
           
           url: my_ajax_object.ajax_url,
           type: 'post',
           data: {
            action: 'codechief_submit_contact_form_request',
            name: _name,
            email: _email,
            subject: _subject,
            body: _body
           },

         success: function(response){
             
             $( '#codechief_form' ).each(function(){
                 this.reset();
             });

             jQuery(_show_success_message).html("Thanks for your message");
         },
        });

       }
      
     

      });
  });
}(jQuery));