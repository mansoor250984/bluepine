 $(document).ready(function() {
    $(".menu-bar").click(function(){
    $(".nav .navigation-menu, .overlay").toggle(500);
	$('body').css('overflow', 'hidden');
});

$(".navigation-menu .fa-times").click(function(){
    $(".nav div.navigation-menu, .overlay").toggle(500);
	$('body').css('overflow-y', 'visible');
});

$("#demo").carousel({
         interval : 4000,
         pause: false
     });
});