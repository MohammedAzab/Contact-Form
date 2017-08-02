/*global $, alert, console */

$(function () {
	'use strict';
	var emailError = true,
		userError = true, 
		msgError = true;
	$('.username').blur(function(){
		if($(this).val().length <= 3){
			$(this).parent().find('.custom-alert').fadeIn(300).end().find('.asterisx').fadeIn(100);
			userError = true;
		} else{
			$(this).parent().find('.custom-alert').fadeOut(300).end().find('.asterisx').fadeOut(100);
			userError = false;
		}
		});

			$('.email').blur(function(){
		if($(this).val() === ''){
			$(this).parent().find('.custom-alert').fadeIn(300).end().find('.asterisx').fadeIn(100);
			emailError = true;
		} else{
			$(this).parent().find('.custom-alert').fadeOut(300).end().find('.asterisx').fadeOut(100);
			emailError = false;
		}
	});

		$('.message').blur(function(){
		if($(this).val().length <= 10){
			$(this).parent().find('.custom-alert').fadeIn(300).end().find('.asterisx').fadeIn(100);
			msgError = true;
		} else{
			$(this).parent().find('.custom-alert').fadeOut(300).end().find('.asterisx').fadeOut(100);
			msgError = false;
		}
	});

	$('.contact-form').submit(function(e) {
		if(emailError === true || userError === true || msgError === true){
			e.preventDefault();
			$('.username, .email, .message').blur();
		}
	})
});
