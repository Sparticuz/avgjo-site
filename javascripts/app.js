jQuery(document).ready(function ($) {

	/* DROPDOWN NAV ------------- */
	$('.current-menu-item, .current-menu-parent, .current-menu-ancestor').addClass('active');
	var topLevelLi = $('.nav-bar li');
	/*topLevelLi.addClass('two columns');*/
	topLevelLi.has('ul').addClass('has-flyout');
	var subLevelUl = $('.nav-bar li ul');
	subLevelUl.addClass('flyout');
	subLevelUl.children('li').css({
		'width': '100%',
		'text-align': 'left',
		'padding': '0'
	});

	var lockNavBar = false;
	/* Windows Phone, sadly, does not register touch events :( */
	if (Modernizr.touch || navigator.userAgent.match(/Windows Phone/i)) {
		$('.nav-bar a.flyout-toggle').on('click.fndtn touchstart.fndtn', function(e){
			e.preventDefault();
			var flyout = $(this).siblings('.flyout').first();
			if (lockNavBar === false) {
				$('.nav-bar .flyout').not(flyout).slideUp(500);
				flyout.slideToggle(500, function(){
					lockNavBar = false;
				});
			}
			lockNavBar = true;
		});
		$('.nav-bar>li.has-flyout').addClass('is-touch');
	} else {
		$('.nav-bar>li.has-flyout').hover(function() {
			$(this).children('.flyout').stop(true,true).slideDown();
		}, function() {
			$(this).children('.flyout').stop(true,true).slideUp();
		});
	}

});
