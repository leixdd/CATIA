

$(document).ready(function(){



  $.get('/pgc',function(data){
      $.each(data, function(i, res){
          $("select.course").append("<option value="+res.id+">"+res.course+" ("+ res.req_hours + " HRS)</option>")
      });
    });

$.get('/genbatch/' + $(".path").val(),function(data){
    $.each(data, function(i, res){

        $("select.batch_sort").append("<option value="+res.batch+"> Batch "+res.batch+" ("+ res.population + " students)</option>")

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
       b.innerHTML = array[index].batch;
       c.innerHTML = array[index].Firstname;
       d.innerHTML = array[index].Lastname;
       e.innerHTML = array[index].Middlename;
       f.innerHTML = array[index].Contact;
       g.innerHTML = array[index].Address;
     });

          var pdf = new jsPDF();
          var base64Img = null;
          var totalPagesExp = "{total_pages_count_string}";
          imgToBase64('Catia_Logo.png', function(base64) {
               base64Img = base64;
          });

          function imgToBase64(url, callback) {
               if (!window.FileReader) {
                   callback(null);
                   return;
               }
               var xhr = new XMLHttpRequest();
               xhr.responseType = 'blob';
               xhr.onload = function() {
                   var reader = new FileReader();
                   reader.onloadend = function() {
                       callback(reader.result.replace('text/xml', 'image/jpeg'));
                   };
                   reader.readAsDataURL(xhr.response);
               };
               xhr.open('GET', url);
               xhr.send();
           }


          var pageContent = function (data) {
               // HEADER
               pdf.setFontSize(20);
               pdf.setTextColor(40);
               pdf.setFontStyle('normal');
               pdf.text($("#batx").text() + " Report", data.settings.margin.left, 22);
               pdf.setFontSize(10);
               pdf.text($("#cx").text(), data.settings.margin.left, 30);
               pdf.text("CATIA", data.settings.margin.left, 35);
               pdf.text("Gate 2, Tesda Complex East Service Road, South Superhighway Taguig City", data.settings.margin.left, 40);


               // FOOTER
               var str = "Page " + data.pageCount;
               // Total page number plugin only available in jspdf v1.0+
               if (typeof pdf.putTotalPages === 'function') {
                   str = str + " of " + totalPagesExp;
               }
               pdf.setFontSize(10);
               pdf.text(str, data.settings.margin.left, pdf.internal.pageSize.height - 10);

           };

          pdf.autoTable(headers, array,{
             addPageContent: pageContent,
             margin: {top: 43}
           });
           if (typeof pdf.putTotalPages === 'function') {
               pdf.putTotalPages(totalPagesExp);
           }
          var d = new Date();
          pdf.save('Applicant Report - '+d.getTime()+'.pdf');


  });

  $("#pz").click(function(){
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
             arrayItem[index] = $(item).text();
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

     var pdf = new jsPDF();
     var base64Img = null;
     var totalPagesExp = "{total_pages_count_string}";
     imgToBase64('Catia_Logo.png', function(base64) {
          base64Img = base64;
     });

     function imgToBase64(url, callback) {
          if (!window.FileReader) {
              callback(null);
              return;
          }
          var xhr = new XMLHttpRequest();
          xhr.responseType = 'blob';
          xhr.onload = function() {
              var reader = new FileReader();
              reader.onloadend = function() {
                  callback(reader.result.replace('text/xml', 'image/jpeg'));
              };
              reader.readAsDataURL(xhr.response);
          };
          xhr.open('GET', url);
          xhr.send();
      }


     var pageContent = function (data) {
          // HEADER
          pdf.setFontSize(20);
          pdf.setTextColor(40);
          pdf.setFontStyle('normal');
          pdf.text($("#batx").text() + " Report", data.settings.margin.left, 22);
          pdf.setFontSize(10);
          pdf.text($("#cx").text(), data.settings.margin.left, 30);
          pdf.text("CATIA", data.settings.margin.left, 35);
          pdf.text("Gate 2, Tesda Complex East Service Road, South Superhighway Taguig City", data.settings.margin.left, 40);


          // FOOTER
          var str = "Page " + data.pageCount;
          // Total page number plugin only available in jspdf v1.0+
          if (typeof pdf.putTotalPages === 'function') {
              str = str + " of " + totalPagesExp;
          }
          pdf.setFontSize(10);
          pdf.text(str, data.settings.margin.left, pdf.internal.pageSize.height - 10);

      };

     pdf.autoTable(headers, array,{
        addPageContent: pageContent,
        margin: {top: 43}
      });

      if (typeof pdf.putTotalPages === 'function') {
          pdf.putTotalPages(totalPagesExp);
      }

     var d = new Date();
     pdf.save('Applicant Report - '+d.getTime()+'.pdf');

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

          var pdf = new jsPDF();
          var base64Img = null;
          var totalPagesExp = "{total_pages_count_string}";
          imgToBase64('Catia_Logo.png', function(base64) {
               base64Img = base64;
          });

          function imgToBase64(url, callback) {
               if (!window.FileReader) {
                   callback(null);
                   return;
               }
               var xhr = new XMLHttpRequest();
               xhr.responseType = 'blob';
               xhr.onload = function() {
                   var reader = new FileReader();
                   reader.onloadend = function() {
                       callback(reader.result.replace('text/xml', 'image/jpeg'));
                   };
                   reader.readAsDataURL(xhr.response);
               };
               xhr.open('GET', url);
               xhr.send();
           }


          var pageContent = function (data) {
               // HEADER
               pdf.setFontSize(20);
               pdf.setTextColor(40);
               pdf.setFontStyle('normal');
               pdf.text($("#batx").text() + " Report", data.settings.margin.left, 22);
               pdf.setFontSize(10);
               pdf.text($("#cx").text(), data.settings.margin.left, 30);
               pdf.text("CATIA", data.settings.margin.left, 35);
               pdf.text("Gate 2, Tesda Complex East Service Road, South Superhighway Taguig City", data.settings.margin.left, 40);


               // FOOTER
               var str = "Page " + data.pageCount;
               // Total page number plugin only available in jspdf v1.0+
               if (typeof pdf.putTotalPages === 'function') {
                   str = str + " of " + totalPagesExp;
               }
               pdf.setFontSize(10);
               pdf.text(str, data.settings.margin.left, pdf.internal.pageSize.height - 10);

           };

          pdf.autoTable(headers, array,{
             addPageContent: pageContent,
             margin: {top: 43}
           });
           if (typeof pdf.putTotalPages === 'function') {
               pdf.putTotalPages(totalPagesExp);
           }
          var d = new Date();
          pdf.save('Applicant Report - '+d.getTime()+'.pdf');

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

  // $("#tog-down").click(function(){
  //     $("#panel-down").slideToggle("fast");
  //     $("#tog-down").toggleClass("active");
  // });

  $("#main-down").click(function(){
    $("#panel-down").slideUp("fast");
    $("#tog-down").removeClass("active");
    $("#mainpane-down").slideToggle("fast");
    $("#main-down").toggleClass("active");
  });

  $("#tog-down").click(function(){
      $("#panel-down").slideToggle("fast");
      $("#tog-down").toggleClass("active");
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
