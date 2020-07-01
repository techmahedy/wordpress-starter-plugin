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

             //disabled();
         },
         error: function(error){

           console.log(error.responseText)

         }
       });

    })

    // function disabled() {
      
    //   $("#codechief-like").submit(function (e) {

    //       $("#codechief-like").attr("disabled", true);

    //       return true;

    //   });
    // }

  });
}(jQuery));