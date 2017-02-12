$(document).ready(function(){

  $.ajax({
    type: "GET",
    url: "/visit",
    beforeSend: function (xhr) {
         var token = $('meta[name="csrf_token"]').attr('content');

         if (token) {
               return xhr.setRequestHeader('X-CSRF-TOKEN', token);
         }
     },
     dataType: 'json',
     success: function(data){
       console.log(data);
     }
  });


});
