//smoothscroll
jQuery(document).ready(function($) {

	$(".scroll").click(function(event){
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
	});
});

//background stretch
$(function() {
	$.backstretch("/images/2232874_2.jpg");
	//$.backstretch("/images/8thAve-JStreet_SanDiego.jpg");

});
