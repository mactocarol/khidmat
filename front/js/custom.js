(function($) {
	"use strict";
  //Responsive menu show js
  $(".navbar_toggle").on("click", function(){
    $(".navigation_wrap").slideToggle(300);
  });
  $(document).ready(function(){
         $('.cat_check_list label').on('click', function(){
            if($(this).children("input").prop("checked") == true){
                $(this).parents(".cat_check_list").addClass("checked_d");
            }
            else if($(this).children("input").prop("checked") == false){
                $(this).parents(".cat_check_list").removeClass("checked_d");
            }
        });
    });
  
  //location modal show
  $(window).load(function(){
   $('#location').modal('show');
  });
  //location modal Hide
  $(document).ready(function(){        
    $('#manually').click(function(){        
      $('#location').modal('hide');
    }); 
  });
  //file upload drag $ drop code
  $('#file_upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file_upload')[0].files[0].name;
    $(this).prev('label').html(file);
  });
  //service tab menu
  //show data on click
  $('.tab_menu li').on('click',function(){
    $('.tab_menu li').removeClass("active");
    $(this).addClass("active");
    var content= $(this).attr('data-show');
    $(".tab_content").removeClass("active");
    $("#"+content).addClass("active");
  });
  //quantity spiner
  if($(".quant_spinner").length > 0){
	$(".quant_spinner").spinner({
	  min: 1
	});  
  }
})(jQuery);
