$(document).ready(function(){

  $.ajax({
    type: "POST",
    url: "/visit",
    beforeSend: function (xhr) {
         var token = $('meta[name="csrf_token"]').attr('content');

         if (token) {
               return xhr.setRequestHeader('X-CSRF-TOKEN', token);
         }
     },
     dataType: 'json',
     success: function(data){
       $(".post_title").text(data.post_title);
        $(".post_content").empty();
       $(".post_content").append(data.post_content);
       $(".post_thumb").attr("src", data.post_thumb);
     }
  });


});
