$( window ).load(function() {
    document.getElementById('gallery').style.display = 'none';
	$('#gallery').slideToggle(500);
});

$('.link_out').click(function() {
	event.preventDefault();
	newLocation = this.href;
	$('#gallery').slideToggle(700, newpage);
});

function newpage() {
window.location = newLocation;
}