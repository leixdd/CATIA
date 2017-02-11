

$(document).ready(function(){



  $.get('/pgc',function(data){
      $.each(data, function(i, res){
          $("select.course").append("<option value="+res.id+">"+res.course+" ("+ res.req_hours + " HRS)</option>")
      });
    });

$.get('/city',function(data){
    $.each(data, function(i, res){
        //console.log(res.citymunDesc);
        $("select.city-enter").append("<option value="+res.citymunDesc+">"+res.citymunDesc+"</option>")
    });
  });

    $.get('/region',function(data){
      $.each(data, function(i, res){
        $("select.city-region").append("<option value="+res.regDesc+">"+res.regDesc+"</option>")
      });
    });

    $.get('/province',function(data){
      $.each(data, function(i, res){
        $("select.city-province").append("<option value="+res.provDesc+">"+res.provDesc+"</option>")
      });
    });

  $('.yb').change(function(){
    var currentYear = new Date();
        userYear = $(this).val();
        a = userYear == 0 ? 0 : currentYear.getFullYear() - userYear;
        $('#age').val(a);
  });

  $('.rd').click(function(){

          var isValid = true;
        $('.xzf input').each(function() {
          if ( !$.trim($(this).val())){

              isValid = false;
              $('#rs').text("Opps.. Looks like you got some errors");
              $('.rs-main').removeClass('alert-info');
              $('.rs-main').addClass('alert-danger');
          }

        });

        if(isValid){
          $('.by').show();
          $('#rs').text('Your application is on set, Press "Print" .. ');
          $('.rs-main').removeClass('alert-danger');
          $('.rs-main').addClass('alert-info');
          $('#xclose').hide();

        }
  });

  $('.by').click(function(){
    $('#rs').text('Please go back to main page');
    $('.xclose').show();
    $('.by').hide();
  });

$('.xclose').click(function(){
  window.location.replace('/');
});

  // $('.yb').focusout(function(){
  //   var currentYear = new Date();
  //       userYear = $(this).text();
  //       $('#age').text(currentYear - userYear);
  // });


  $("#printz").click(function(){
    var url = $(this).attr("data-link");
     var array = [];
     var headers = [];
     $('#dataTable th').each(function(index, item) {
        if(index < 6){
          headers[index] = $(item).html();
        }
     });

     $('#dataTable tr').has('td').each(function() {
         var arrayItem = {};
         $('td', $(this)).each(function(index, item) {
           if(index < 6)
             arrayItem[headers[index]] = $(item).html();
         });
         array.push(arrayItem);
     });


     $.each(array, function(index, item){
       var x = document.getElementById("db").insertRow();
       var a = x.insertCell(0);
       var b = x.insertCell(1);
       var c = x.insertCell(2);
       var d = x.insertCell(3);
       var e = x.insertCell(4);
       var f = x.insertCell(5);

       a.innerHTML = array[index].id;
       b.innerHTML = array[index].Firstname;
       c.innerHTML = array[index].Lastname;
       d.innerHTML = array[index].Middlename;
       e.innerHTML = array[index].Contact;
       f.innerHTML = array[index].Address;

     });
     var pdf = new jsPDF('p', 'pt', 'letter');
      // source can be HTML-formatted string, or a reference
      // to an actual DOM element from which the text will be scraped.
      source = $('#pdb')[0];

      // we support special element handlers. Register them with jQuery-style
      // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
      // There is no support for any other type of selectors
      // (class, of compound) at this time.
      specialElementHandlers = {
          // element with id of "bypass" - jQuery style selector
          '#bypassme': function (element, renderer) {
              // true = "handled elsewhere, bypass text extraction"
              return true
          }
      };
      margins = {
          top: 80,
          bottom: 60,
          left: 40,
          width: 522
      };
      // all coords and widths are in jsPDF instance's declared units
      // 'inches' in this case
      pdf.fromHTML(
      source, // HTML string or DOM elem ref.
      margins.left, // x coord
      margins.top, { // y coord
          'width': margins.width, // max width of content on PDF
          'elementHandlers': specialElementHandlers
      },

      function (dispose) {
        var d = new Date();
          // dispose: object with X, Y of the last line add to the PDF
          //          this allow the insertion of new lines after html
          pdf.save('Applicant Report - '+d.getTime()+'.pdf');
      }, margins);


  });


    $("#printy").click(function(){
    var url = $(this).attr("data-link");
     var array = [];
     var headers = [];
     $('#dataTable th').each(function(index, item) {
        if(index < 7){
          headers[index] = $(item).html();
        }
     });

     $('#dataTable tr').has('td').each(function() {
         var arrayItem = {};
         $('td', $(this)).each(function(index, item) {
           if(index < 7)
             arrayItem[headers[index]] = $(item).html();
         });
         array.push(arrayItem);
     });


     $.each(array, function(index, item){
       var x = document.getElementById("db").insertRow();
       var a = x.insertCell(0);
       var b = x.insertCell(1);
       var c = x.insertCell(2);
       var d = x.insertCell(3);
       var e = x.insertCell(4);
       var f = x.insertCell(5);
       var g = x.insertCell(6);
       a.innerHTML = array[index].id;
       b.innerHTML = array[index].Firstname;
       c.innerHTML = array[index].Lastname;
       d.innerHTML = array[index].Middlename;
       e.innerHTML = array[index].Course_Fee;
       f.innerHTML = array[index].Payment;
       g.innerHTML = array[index].Balance;

     });
     var pdf = new jsPDF('p', 'pt', 'letter');
      // source can be HTML-formatted string, or a reference
      // to an actual DOM element from which the text will be scraped.
      source = $('#pdb')[0];

      // we support special element handlers. Register them with jQuery-style
      // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
      // There is no support for any other type of selectors
      // (class, of compound) at this time.
      specialElementHandlers = {
          // element with id of "bypass" - jQuery style selector
          '#bypassme': function (element, renderer) {
              // true = "handled elsewhere, bypass text extraction"
              return true
          }
      };
      margins = {
          top: 80,
          bottom: 60,
          left: 40,
          width: 522
      };
      // all coords and widths are in jsPDF instance's declared units
      // 'inches' in this case
      pdf.fromHTML(
      source, // HTML string or DOM elem ref.
      margins.left, // x coord
      margins.top, { // y coord
          'width': margins.width, // max width of content on PDF
          'elementHandlers': specialElementHandlers
      },

      function (dispose) {
        var d = new Date();
          // dispose: object with X, Y of the last line add to the PDF
          //          this allow the insertion of new lines after html
          pdf.save('Applicant Report - '+d.getTime()+'.pdf');
      }, margins);


  });


  $('.modal-open').click(function(){
    var applicant_id = $(this).val();

     $.ajax({
       type: "GET",
       url: "/application/" + applicant_id,
       beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        dataType: 'json',
       success: function(data){
         $.each(data, function(x, d){
           $("#modtitle").text('#' + d.id + " - " + d.last_name + ", " + d.first_name + " " + d.last_name
            + " (" + d.entry_date + ") ");
         })
         $.each(data, function(i, testa) {

             $("#course").text(testa);


           if(testa.is_active == 1){
             $("#is_active").removeClass("text-danger");
             $("#is_active").addClass("text-success");
             $("#is_active").text("ACCEPTED");
           }else{
             $("#is_active").removeClass("text-sucess");
             $("#is_active").addClass("text-danger");
             $("#is_active").text("PENDING");
           }



           //CORE - ACCESSORS
           $("#applicant_image").attr("src", testa.image_href);
           $("#last_name").text(testa.last_name);
           $("#first_name").text(testa.first_name );
           $("#middle_name").text(testa.middle_name);
           var x = testa.last_name;
           var y = testa.first_name
           $("#modtitle").text();
           if(testa.is_active != 0){
             $("#is_active").removeClass("text-danger");
             $("#is_active").addClass("text-success");
             $("#is_active").text("ACCEPTED");
           }else{
             $("#is_active").removeClass("text-sucess");
             $("#is_active").addClass("text-danger");
             $("#is_active").text("PENDING");
           }


           //manpower_profile
           $("#num_street").text(testa.num_street);
           $("#barangay").text(testa.barangay);
           $("#district").text(testa.district);
           $("#city").text(testa.city);
           $("#province").text(testa.province);
           $("#region").text(testa.region);
           $("#email").text(testa.email);
           $("#contact").text(testa.contact);
           $("#nationality").text(testa.nationality);


           $.each(testa.personal_infos, function(k, v){
             //personal_infos
             $("#sex").text(v.sex);
             $("#cv_status").text(v.cv_status);
             $("#emp_status").text(v.emp_status);

             //Birthdate
             $("#bdate").text(v.bdate_month + ' ' + v.bdate_day + ', ' + v.bdate_year);
             $("#age").text(v.age);

             //Birthplace
             $("#bplace").text(v.bplace_region + ', ' + v.bplace_province + ', ' + v.bplace_city);

             //educ_attain
             $("#educ_attain").text(v.educ_attain);

           });

           $.each(testa.other_infos, function(k, v){
             $("#classification").text(v.classification);

           });


         });

       }
    });
  });

  $('.modal-post').click(function(){
    var hold_id = $(this).val();

    $.ajax({
      type: "GET",
      url: "/post/" + hold_id,
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
  $('.modal-click').click(function(){

    var applicant_id = $(this).val();
    $.ajax({
      type: "GET",
      url: "/msg_show/" + applicant_id,
      beforeSend: function (xhr) {
           var token = $('meta[name="csrf_token"]').attr('content');

           if (token) {
                 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           }
       },
       dataType: 'json',
      success: function(data){
        $(".em_ajx").val(data.email);
        $(".name_ajx").val(data.title);
        $(".msg_ajx").val(data.messagez);
      }
   });
    $.ajax({
      type: "GET",
      url: "/inbox/" + applicant_id,
      beforeSend: function (xhr) {
           var token = $('meta[name="csrf_token"]').attr('content');

           if (token) {
                 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           }
       },
       dataType: 'json',
      success: function(data){
        $("#lst").empty();
        $.each(data, function(i, cnt){
          $("#lst").append("<li class='list-group-item'> <h4 class='list-group-item-heading'>CATIA -> " + cnt.name + " ("+ cnt.time_e +")</h4> <hr></hr> <blockquote class='list-group-item-text h5'> " + cnt.messagez + " </blockquote></li>");
        });
      }
   });

  });

  $('.modal-delete').click(function(){
    var applicant_id = $(this).val();
    $('.delete-val').val(applicant_id);
  });

  $("#tog-down").click(function(){
      $("#panel-down").slideToggle("fast");
      $("#tog-down").toggleClass("active");
  });

  $("#main-down").click(function(){
    $("#panel-down").slideUp("fast");
    $("#tog-down").removeClass("active");
      $("#mainpane-down").slideToggle("fast");
      $("#main-down").toggleClass("active");
  });

  $("#tog-down23").click(function(){
      $("#panel-down23").slideToggle("fast");
      $("#tog-down23").toggleClass("active");
  });

  $("#main-down23").click(function(){
    $("#panel-down23").slideUp("fast");
    $("#tog-down23").removeClass("active");
      $("#mainpane-down23").slideToggle("fast");
      $("#main-down23").toggleClass("active");
  });


  $("#pen-down").click(function(){
      $("#penpane-down").slideToggle("fast");
      $("#pen-down").toggleClass("active");
  });


  $("#con-down").click(function(){
      $("#conpane-down").slideToggle("fast");
      $("#con-down").toggleClass("active");
  });

  $("#cms-down").click(function(){
      $("#cmspane-down").slideToggle("fast");
      $("#cms-down").toggleClass("active");
  });

  $('#summernote').summernote({
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['misc',['undo','redo','codeview','help']]
    ]
  });

});
