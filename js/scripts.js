$(document).ready(function() {
	
	$('input#email').removeAttr('disabled').val('');
	
	var showMessage = function($type, $message){
		$('div.message').stop().hide().css('opacity', '0').attr('class', 'message ' + $type).html($message).show().animate({'opacity':'1'});
	}
    
	$('button#submit_button').click(function(){
		
		if( !$(this).hasClass('disabled') ){
		
			var $testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			
			if( $('input#email').val() == '' ){
				showMessage('notice', 'پر کردن فیلد ایمیل الزامی است!');
			}
			else if( !$testEmail.test($('input#email').val()) ){
				showMessage('notice', 'ایمیل وارد شده نامعتبر است!');
			}
			else{
				showMessage('sending', '');
				$('button#submit_button').addClass('disabled');
				
				$.post('ajax/subscribe.php', {email:$('input#email').val()}, function($result){
					
					$('button#submit_button').removeClass('disabled');
						
					if($result == 'success'){
						showMessage('success', 'ایمیل شما با موفقیت ثبت شد!');
						$('input#email').attr('disabled', 'disabled').addClass('disabled');
						$('button#submit_button').addClass('disabled');
					}
					else if($result == 'exist'){
						showMessage('notice', 'ایمیل وارد شده قبلا ثبت شده است!');
					}
					else{
						showMessage('error', 'خطا در ثبت ایمیل!');
					}
				});
			}
		}
	});
	
});