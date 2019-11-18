$(document).ready(function(){
  var dateToday = new Date();
  
  //color box
  $(".inline").colorbox({
    inline:true, 
    width:"95%",
    maxWidth: "800px"
  });

	
  if($('body').hasClass('home') && $(window).width() >= 1199) {
    
    $( "#EndDate1" ).datepicker({
    minDate: dateToday,
    dateFormat: 'dd/mm/yy'
    }).datepicker('setDate', dateToday);


    $( "#StartDate1" ).datepicker({
      minDate: dateToday,
      dateFormat: 'dd/mm/yy'    
    }).datepicker('setDate', dateToday);
    
    // home header style		// home header style
    $(window).scroll(function(){      
      
      if ($(document).scrollTop() > 100) {
        $('nav').addClass('shrink');
      }else{
        $('nav').removeClass('shrink');
      }
      
    });
    
    //remove active class from about us link
    if($('li#menu-item-31').hasClass('active')) {
      $('li#menu-item-31').removeClass('active');
    }
    
    //journey read more
    $('#journey-expand').click(function(e){
      e.preventDefault();
     
     $('#read-more-journey').slideToggle('slow');
      $(this).text(function(i, text){
        return text === "Read More" ? "Read Less" : "Read More";
      })
    });
      
    
    //scroll to about section
    $('a[href*="/#aboutsection"]').click(function(e){
      e.preventDefault();
      $('html, body').animate({
          scrollTop: $('[name="' + $.attr(this, 'href').substr(2) + '"]').offset().top
      }, 500);
      return false;
    });
    
    $('#about-expand').click(function(e){
      e.preventDefault();
            
      $('#read-more-about').slideToggle('slow');
      $(this).text(function(i, text){
        return text === "Read More" ? "Read Less" : "Read More";
      })
    });

		
  }
  
  //floating box for Adventure travel page default hide
  if($("body.page").hasClass("page-id-149")) {
     $(".float-form-wrapper").find("#floatFormHolder").removeClass("expand");     
  }
  
  //floating form
  var btnFormExpand = $("span.btn-expand");
  var floatingForm =  $("#floatFormHolder");
  $(window).scroll(function(){     
     if ($(document).scrollTop() > 100) {
        btnFormExpand.removeClass("hide-arrow");
        floatingForm.removeClass("expand");
     }else {
        btnFormExpand.addClass("hide-arrow");
        floatingForm.addClass("expand");
     }     
  });
  
  btnFormExpand.on("click", function(e){
     e.preventDefault();
     if(floatingForm.hasClass("expand")) {
        floatingForm.removeClass("expand");
     }else {
        floatingForm.addClass("expand");
     }
     if($(this).hasClass("fa-chevron-circle-down")) {
        $(this).removeClass("fa-chevron-circle-down");
        $(this).addClass("fa-chevron-circle-up");
     }else{
        $(this).addClass("fa-chevron-circle-down");
        $(this).removeClass("fa-chevron-circle-up");
     }
     return false;
  });
  
  //Leisure Travel read more
    $('#leisure-expand').click(function(e){
      e.preventDefault();
     
     $('#read-more-leisure').slideToggle('slow');
      $(this).text(function(i, text){
        return text === "Read More" ? "Read Less" : "Read More";
      })
    });
    
    //Corporate Travel read more
    $('#corporate-expand').click(function(e){
      e.preventDefault();
     $('#read-more-corporate').slideToggle('slow');
      $(this).text(function(i, text){
        return text === "Read More" ? "Read Less" : "Read More";
      })
    });

  // contact section scroll
  $('a[href*="#footercontact"]').click(function(){
    $('html, body').animate({
        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
    }, 500);
    return false;
  });
  
  var regExp = /^[-+]?[0-9]+$/;
  $('.wpcf7-intl-tel').on('keydown keyup', function(e){
     var value = String.fromCharCode(e.which) || e.key;
     //console.log(e);
     // Only numbers, dots and commas
    if (!regExp.test(value)
      && e.which != 188 // ,
      && e.which != 190 // .
      && e.which != 8   // backspace
      && e.which != 9   // tab
      && e.which != 46  // delete
      && (e.which < 37  // arrow keys
        || e.which > 40)
      && (e.which < 96 
        || e.which > 105)) {
          e.preventDefault();
          return false;
    }
  });
  
  $(window).scroll(function() {
   // Blog page form popup
    if($('body').hasClass('single-blog_type')) {
        var scrollTop = $(window).scrollTop();
        if(scrollTop >= 300 ) {
            $('#BlogFormHolder').addClass('show');
            $('#BlogFormHolder').removeClass('hide');
        }else{
            $('#BlogFormHolder').addClass('hide');
            $('#BlogFormHolder').removeClass('show');
        }
    } 
  });
  
  $('#btnCloseBlogForm').on('click', function(){
      $('#BlogFormHolder').addClass('do-not-show-again');
      return false;
  });
  
});