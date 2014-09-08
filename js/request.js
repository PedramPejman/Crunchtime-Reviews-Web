$(document).ready(function() {
	document.getElementById('request_form').style.display = 'none';
	$('#request_form').slideToggle(1000);
});




function change_course() {
var course_select = document.getElementById('course-list');
var course = course_select.value;


$.ajax({ url: './request.php',
         data: {action: 'get_form', course: course_select.value},
         type: 'post',
         success: function(output) {
					document.getElementById('html').innerHTML = output;
					document.getElementById('c2').select;
					
					//remove selected one
					$('option:selected', 'select[name="course-list"]').removeAttr('selected');
					//Using the value
					var command = "option[value='" + course + "']";
					$('select[name="course-list"]').find(command).attr("selected",true);

					
                  }
});

};
