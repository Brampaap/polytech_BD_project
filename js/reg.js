
$(document).ready(function() { 

  //Search
  $(".search-r").change(function() {
      $(".wr").css({"display":"none"});
    $.ajax({
      method: "POST",
      url: "/php/search.php",
      data: $(".search-r").serialize(),
      success: function(array) {
          var out = JSON.parse(array);
          for (var i = 0; i <= JSON.parse(array).length; i++) {
            $("#"+out[i][0]).parent().parent().css({"display":"flex"});
          }
          }
      });
  });
  //Search
  $(".search-Re").change(function() {
      $(".wr").css({"display":"none"});
    $.ajax({
      method: "POST",
      url: "/php/search-r.php",
      data: $(".search-Re").serialize(),
      success: function(array) {
          var out = JSON.parse(array);
          for (var i = 0; i <= JSON.parse(array).length; i++) {
            $("#"+out[i][0]).css({"display":"flex"});
          }
          }
      });
  });
  //Edit catalog
$(".edit_catal").click(function() {
var a = jQuery(this).attr("name");
var b = jQuery(this).attr("id");
var status_form = 1;
        if(status_form){
        $.ajax({
            method: "POST",
            url: "/php/_catalog-form.php",
            data: {"id_prod":a, "id-rest":window.location.href},
            success: function(data) {
                $('.modal-body').html(data);
                status_form = 0;
                $('#catalog-edit').on('submit', function(e){
                    e.preventDefault();
                    
                   $.ajax({
                       type: 'POST',
                       url: 'php/catalog_prog.php',
                       data: $('#catalog-edit').serialize()+ '&id=' + b +"&id-rest="+window.location.href,
                       success: function(msg){
                        $('.modal').modal('hide');
                        location.reload();
                        },
                        error: function(msg){
                        location.reload();
                        }
                   });  
                });
            }
        });
        };
});
$(".del").click(function() {
var b = jQuery(this).attr("id");
console.log(b);
  $.ajax({
   type: 'POST',
   url: 'php/catalog_prog.php',
   data: {"erase" : b, "id-rest" : window.location.href},
   success: function(msg){
    $('.modal').modal('hide');
      $("#"+b).parent().parent().slideUp();
    },
    error: function(msg){
      location.reload();
    } 
  });
});
$(".add").click(function() {
var status_form = 1;
 if(status_form){
        $.ajax({
            method: "POST",
            url: "/php/new_catalog-form.php",
            success: function(data) {
                $('.modal-body').html(data);
                status_form = 0;
                $('#catalog-edit').on('submit', function(e){
                    e.preventDefault();  
                   $.ajax({
                       type: 'POST',
                       url: 'php/catalog_prog.php',
                       data: $('#catalog-edit').serialize()+ '&add=' + 1+"&id-rest="+window.location.href,
                       success: function(msg){
                        $('.modal').modal('hide');
                        location.reload();
                        },
                        error: function(msg){
                        location.reload();
                         }
                   });  
                });
            }
        });
        };
    });
//ADD restaurant 
$(".add-rest").click(function() {
var status_form = 1;
 if(status_form){
    $.ajax({
      method: "POST",
      url: "/php/_new_rest_form.php",
      success: function(data) {
        $('.modal-body').html(data);
        status_form = 0;
        $('#rest-add').on('submit', function(e){
          e.preventDefault();
           $.ajax({
             type: 'POST',
             url: 'php/manage.php',
             data: $('#rest-add').serialize()+"&adds-res="+1,
             success: function(msg){
              console.log(msg);
              $('.modal').modal('hide');
              // location.reload();
              },
              error: function(msg){
              // location.reload();
              console.log(msg);
               }
           });  
        });
      }
    });
  };
});
  //Random color RestPage
   var palettes = [
  'rgba(180, 161, 23, 0.6)', 'rgba(250, 2, 2, 0.6)', 'rgba(86, 21, 112, 0.6)',
  'rgba(56, 31, 196, 0.6)', 'rgba(233, 14, 2, 0.6)', 'rgba(124, 208, 83, 0.6)',
  'rgba(23, 160, 186, 0.6)', 'rgba(237, 116, 17, 0.6)', 'rgba(8, 0, 250, 0.6)'
  ];
  var randomPalette = palettes[Math.floor(Math.random() * palettes.length)];
  
  $('.social .profile-header').css({
    "box-shadow": "inset 0 0 0 2000px " + randomPalette
  });
  //SlimScroll for basket
 $(".basket .main-part .podcts").slimScroll({
        width: "26em",
        height:"200px",
        wheelStep: 4,
        touchScrollStep: 20,
        color: "#1c222c",
        size: "2px",
        borderRadius: "3px",
        alwaysVisible: !1,
        position: "right"
    });

  //Don't off basket window when clicked inside 
  $(document).on('click', '.basket .dropdown-menu', function (e) {
  e.stopPropagation();
  });
    // sidebar navigation
    $('#main-menu').metisMenu();
      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
      //Dropify
  $('.dropify').dropify({
    messages: {
        'default': 'Перетащите файл или нажмите на окно. <br>(Допустимые расширения изображений: .jpeg, .png, .jpg.<br> Размер изображения <strong style="color: red;">строго</strong> 512x512)',
        'replace': 'Перетащите новый файли или кликните для замены',
        'remove':  'Удалить',
        'error':   'Ууупс, что-то пошло не так.'
    },
    error: {
        'fileSize':  'Размер изображения строго 512x512px.',
        'minWidth':  'Размер изображения строго 512x512px.',
        'maxWidth':  'Размер изображения строго 512x512px.',
        'minHeight': 'Размер изображения строго 512x512px.',
        'maxHeight': 'Размер изображения строго 512x512px.',
        'imageFormat': 'Формат не поддерживается. Доступны: ({{ value }} ).',
        'fileExtension': 'Формат не поддерживается. Доступны: ({{ value }} ).',
    }
  });
  //Reset button
  $('.reset').on('click', function() {
     $('#edit-profile-rest')[0].reset();
    });
//Collapse edit form
    $('.collapse').collapse({toggle: false})

    $(".out").on("click", function() {
  		$.ajax({
    		method: "POST",
    		url: "/php/login.php",
    		data: out = true,
    		success: function(data) {
    		}
  		});

	});

    $('.modal').on('show.bs.modal', function () {
        $('#myInput').trigger('focus');
    });
  var status_form = 1;
     $('.collapse').on('show.bs.collapse', function () {
        $('.col_but').text("Закрыть");
        if(status_form){
        $.ajax({
            method: "POST",
            url: "/php/_edit-form.php",
            data: {"id-rest":window.location.href},
            success: function(data) {
                $('#collapseOne .card-footer').html(data);
                status_form = 0;
                
                $('.reset').on('click', function() {
                $('#edit-profile-rest')[0].reset();
                });
                //submit edit form
                $('#edit-profile-rest').on('submit', function(e){
                    e.preventDefault();
                   $.ajax({
                       type: 'POST',
                       url: 'php/manage.php',
                       data: $('#edit-profile-rest').serialize()+"&id-rest="+window.location.href,
                       success: function(msg){
                        console.log(msg);                    
                        $('.collapse').collapse('hide');
                        toastr.success('Изменения внесены, обновите страницу!');
                        },
                        error: function(msg){
                        $('.collapse').collapse('hide');
                        toastr.warning('Что-то пошло не так, попробуйте ещё раз!');
                        }
                   });  
                });
            }
        });
        };

    });
     $('.collapse').on('hide.bs.collapse', function () {
      $('.col_but').text(" Редактировать информацию о ресторане ");
    });

//Image
var RestCurrID = window.location.href;
(function($) {
$.fn.serializefiles = function() {
    var obj = $(this);
    /* ADD FILE TO PARAM AJAX */
    var formData = new FormData();
    $.each($(obj).find("input[type='file']"), function(i, tag) {
        $.each($(tag)[0].files, function(i, file) {
            formData.append(tag.name, file);
        });
    });
    var params = $(obj).serializeArray();
    $.each(params, function (i, val) {
        formData.append(val.name, val.value);
    });
    formData.append("id_rest", RestCurrID);
    
    return formData;
  };
  })(jQuery);
  $('#image-file').on('submit', function(e){
    e.preventDefault();
   var formData = $('#image-file').serializefiles();
   $.ajax({
           type: 'POST',
           url: '/php/manage.php',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(msg){
            $('.modal').modal('hide');
            $('.im-log').fadeOut("slow", function() {
                $('.im-log').css('background-image', 'url(' + msg + ')');});
             setTimeout(
             $('.im-log').fadeIn(),2000)},
            error: function(msg) {

            console.log(msg);
          }
   });
 
  });
//Validate image form
    var a = 0;
   $("#work_phone").mask("+7(999)999-99-99");
   $("#work_phone").blur(function() {
            a = $(this).mask();
        });

 

});//On ready


