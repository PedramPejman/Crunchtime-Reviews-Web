var first_flag = 0;
var second_flag = 0;
var flag_signup_occurred = false;
var current_overlay_course;
var current_overlay_date;
var current_overlay_id;

$(window).load(function() {	
  setTimeout(function () {					
  		$('.loader').fadeOut(1500);
		
	},1000);	
  	
  if (first_flag ==0){
  $('.caption').delay(1500).slideToggle(1000);
  $('.main-nav').delay(1500).slideToggle(1500);
  
  }
  first_flag=1;
});

$('.to-gallery').click(function() {
  (document.getElementById('gallery-tab')).click();
})



$('.main-nav ul li').click(function() {
  //take care of the scrollbar size issue
  var temp = this.getAttribute("class"); 
  if (temp == "about") {
    $(".page-centerer").addClass('active');
  } else {
    $(".page-centerer").removeClass('active');
  }
  
  $('.main-nav ul li').removeClass('active');
  $(this).addClass('active');
  $('.sessions-content').removeClass('active');
  $('.gallery-content').removeClass('active');
  $('.about-content').removeClass('active');
  $('.ask-content').removeClass('active');
  var name = '.' + temp + '-content';
  $(name).addClass('active');
  


  

  
  if (second_flag == 0){
  $('#crunchtime').slideToggle(1000);
  $('#reviews').slideToggle(1000);
  $('#college').slideToggle(1000);  
  second_flag=1;
  }
});


$('.sessions').click(function() {
  document.getElementById('sessions').style.display = "block";
});




$('.attend').click(function() {
  
  //displaying the overlay
     var clickBtnValue = $(this).val();
	 current_overlay_course = this.getAttribute('data-course');
	 current_overlay_date = this.getAttribute('data-date');
	 current_overlay_id = this.getAttribute('data-session-id');
		
    //if signing up for another session, some housekeeping is in order
    (document.getElementById('sign-me-up')).innerHTML = "Sign Me Up!" ;
    $('#student-id').show();
    $('#thank-you-note').hide();
    
  $('#sign-up-overlay').fadeIn(1000);
  $('#overlay-container').fadeIn(500); 
  
})
  
  
$('#sign-up-overlay').unbind('submit').submit(function(e) {
  
  e.preventDefault();
  var $button = $('#sign-me-up');
  
  //button graphics  
  if (! flag_signup_occurred){
    
    var email = (document.getElementById('student-id').value);
	
  $.ajax({ url: './sendEmail.php',
         data: {action: 'send_email', student_id: email, course: current_overlay_course, date: current_overlay_date, session_id: current_overlay_id},
         type: 'post',
         success: function() {
                  }
});

	
    $button.fadeOut(1000, function() {
      (document.getElementById('sign-me-up')).innerHTML = "<img src='http://jimpunk.net/Loading/wp-content/uploads/loading81.gif' width='50' height='50'>" ;
    });
    $button.fadeIn(500, function() {
      $('#thank-you-note').show(1000);
    });
    $button.delay(500).fadeOut(500, function() { 
	  (document.getElementById('sign-me-up')).innerHTML = "Thank you!" ;
      $('#student-id').hide(500);
    });
    $button.fadeIn(500, function() {
    });
    flag_signup_occurred = true;
  }
  else{ 
    //reached only when button is "thank you"
    close_overlay();
  }
  
})

$('#close-icon').click(function() {
  close_overlay();
})  
  
function close_overlay() {
  flag_signup_occurred = false;
  $('#sign-up-overlay').fadeOut(1000);
  $('#overlay-container').fadeOut(500); 
  flag_signup_occurred = false;
}

function request() {
 $("#html").fadeOut("slow");
 setTimeout(redirect_doc,1000);
}

function redirect_doc() {
 document.location = "request.php";
}

$('.link_out').click(function() {
	event.preventDefault();
	newLocation = this.href;
	$('#html').fadeOut(500, newpage);
});


function newpage() {
window.location = newLocation;
}





