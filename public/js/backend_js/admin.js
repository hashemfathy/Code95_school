$(document).ready(function(){
    //------------------------------------- admin Setting password check-------------------------- 
	$('#current_pwd').keyup(_.debounce(function(){
		var current_pwd = $('#current_pwd').val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				if(resp=='false'){
					$('#chkpwd').html("<font color='red'>Current password is incorrect</font>");
				}else if(resp=='true'){
					$('#chkpwd').html("<font color='green'>Current password is correct</font>");
				}
			}
		});
	},300));
    //------------------------------------- admin Setting Validation-------------------------- 
    $("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
    });
    //------------------------------------- student Setting password check-------------------------- 
	$('#current_Stpwd').keyup(_.debounce(function(){
		var current_Stpwd = $('#current_Stpwd').val();
		$.ajax({
			type:'get',
			url:'/student/check-pwd',
			data:{current_Stpwd:current_Stpwd},
			success:function(resp){
				if(resp=='false'){
					$('#chkStpwd').html("<font color='red'>Current password is incorrect</font>");
				}else if(resp=='true'){
					$('#chkStpwd').html("<font color='green'>Current password is correct</font>");
				}
			}
		});
    },300));
    //------------------------------------- student Setting Validation-------------------------- 
    $("#Stpassword_validate").validate({
		rules:{
			current_Stpwd:{
				required: true,
				minlength:6,
			},
			new_Stpwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_Stpwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_Stpwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
    });
     //------------------------------------- teacher Setting password check-------------------------- 
	$('#current_Tepwd').keyup(_.debounce(function(){
		var current_Tepwd = $('#current_Tepwd').val();
		$.ajax({
			type:'get',
			url:'/teacher/check-pwd',
			data:{current_Tepwd:current_Tepwd},
			success:function(resp){
				if(resp=='false'){
					$('#chkTepwd').html("<font color='red'>Current password is incorrect</font>");
				}else if(resp=='true'){
					$('#chkTepwd').html("<font color='green'>Current password is correct</font>");
				}
			}
		});
    },300));
    //------------------------------------- teacher Setting Validation-------------------------- 
    $("#Tepassword_validate").validate({
		rules:{
			current_Tepwd:{
				required: true,
				minlength:6,
			},
			new_Tepwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_Tepwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_Tepwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	// === Sidebar navigation === //
	
	$('.submenu > a').click(function(e)
	{
		e.preventDefault();
		var submenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var submenus = $('#sidebar li.submenu ul');
		var submenus_parents = $('#sidebar li.submenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenu.slideUp();
			} else {
				submenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenus.slideUp();			
				submenu.slideDown();
			} else {
				submenus.fadeOut(250);			
				submenu.fadeIn(250);
			}
			submenus_parents.removeClass('open');		
			li.addClass('open');	
		}
	});
});