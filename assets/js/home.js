function notification(theme,message,position=null) {
    var positionClass = 'nfc-bottom-right';
    if(position == 'top'){
        positionClass = 'nfc-top-right';
    }
    window.createNotification({
        positionClass: positionClass,
        showDuration: 3000,
        theme: theme
    })({
        title: 'Thông báo',
        message: message
    });
}
$('.post-bottom .like').click(function(e){
	var like;
	var parent = $(this).parents('.post');
	var postId = parent.attr('data-id');
	var userId = parent.attr('data-user');
	if($(this).hasClass('active')){
		$(this).removeClass('active');
		like = 0;
	}else{
		$(this).addClass('active');
		like = 1;
	}
	$.post('api/emoji',{emoji:like,post_id:postId,user_id:userId});
});
$('.left-panel-items li').click(function(){
	var url = $(this).data('url');
	window.location.href = url;
});
$(document).ready(function () {
	//Login
	$("#login-submit").click(function () {
		var email = $("#email-login").val().trim();
		var password = $("#password-login").val().trim();

		if (email != "" && password != "") {
			$.ajax({
				url: "Site/check_login",
				type: "post",
				data: { email: email, password: password },
				dataType: "json",
				success: function (response) {
					$("#message").html(response.message);
					if (response.error) {
						$("#responseDiv")
							.removeClass("alert-success")
							.addClass("alert-danger")
							.show();
					} else {
						$("#responseDiv")
							.removeClass("alert-danger")
							.addClass("alert-success")
							.show();
						// $('#logForm')[0].reset();
						setTimeout(function () {
							window.location.reload();
						}, 2000);
					}
				},
			});
		}
	});
	//Register
	$("#register-submit").click(function () {
		var username = $("#username-register").val().trim();
		var email = $("#email-register").val().trim();
		var password = $("#password-register").val().trim();
		var repassword = $("#Re-password-register").val().trim();
		if (username != "" && email != "" && password != "" && repassword != "") {
			$.ajax({
				url: "Site/register",
				type: "post",
				data: {
					username: username,
					email: email,
					password: password,
					repassword: repassword,
				},
				dataType: "json",
				success: function (response) {
					$("#message2").html(response.message);
					if (response.error) {
						$("#responseDiv2")
							.removeClass("alert-success")
							.addClass("alert-danger")
							.show();
					} else {
						$("#responseDiv2")
							.removeClass("alert-danger")
							.addClass("alert-success")
							.show();
						setTimeout(function () {
							window.location.reload();
						}, 2000);
					}
				},
			});
		}
		$(document).on("click", "#clearMsg", function () {
			$("#responseDiv2").hide();
		});
	});
	$(".btn-register").click(function () {
		$(".register").css("display", "block");
		$(".login").css("display", "none");
	});

	//Poll food
	$('.poll-area .item').click(function(){
        var id_food = $(this).data('id');
        $.ajax({
            url : 'poll-food',
            type : 'POST',
            data : {id_food:id_food},
            success : function(result){
                let data = JSON.parse(result);
                if (data['status'] == false) {
                    alert(data['mes']);
                }else{
                    actionOption(id_food);
                    $.each(data,function(index,value){
                        var percent = value['percent'];
                        var parent = $('#opt-'+value['food_id']);
                        parent.find('.percent').html(percent);
                        parent.find('.progress-bar').css('width',percent);
						addPollUser(parent,value['user']);
						tooltip();
                    });
                }
            }
        });
    });

	function addPollUser(parent,user){
		var html = '';
		var username = '';
		$.each(user,function(key,value){
			html += `<div class="poll-by">`;
			html += `<img src="`+value['avatar']+`" onerror="this.onerror=null;this.src='/images/avatar/no-user.png';">`;
			html += `</div>`;
		});
		html += `<div class="tooltip_templates">`;
		$.each(user,function(key,value){
			username += `<p>`+value['username']+`</p>`;
		});
		html += username;
		html += `</div>`;
		parent.find('.list-poll').html(html);
		parent.find('.list-poll').attr("data-original-title", username);;
		tooltipAjax();
	}

    function actionOption(id_food){
        $('li.item').addClass('show');
        if ($('#opt-'+id_food).hasClass('selected')) {
            $('#opt-'+id_food).removeClass('selected');
            $('#opt-'+id_food).find('.checkbox').prop('checked', false);
        }else{
            $('#opt-'+id_food).addClass('selected');
            $('#opt-'+id_food).find('.checkbox').prop('checked', true);
        }
    }
    $('#form-food').submit(function(e){
        e.preventDefault();
        var food_name = $('input[name=food_name]').val();
        if (food_name.length < 1) {
            alert('Vui lòng điền món ăn');
            return false;
        }
        var formData = new FormData(this);
        $.ajax({
            url : 'add-food',
            type : 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data : formData,
            success : function(result){
                let data = JSON.parse(result);
                if (data['status'] == false) {
                    alert(data['mes']);
                    return false;
                }
                $('#ModalFood').modal('hide');
                var html = `<li class="item" id="opt-`+data['id']+`" data-id="`+data['id']+`">
                    <div class="option">
                        <label for="poll" class="label-checkbox"><input type="checkbox" class="checkbox" name="poll" value="`+data['id']+`">`+food_name+`</label>
                        <div class="percent">0%</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                </li>`;
                $('.items').append(html);
                setTimeout(function () {
					window.location.reload();
				}, 2000);
            }
        });
    });
	tooltip();
    function tooltip(){
        $('.tooltip-poll').each(function () {
            $(this).tooltip(
            {
                html: true,
                placement : 'right',
                title: $(this).find('.tooltip_templates').html()
            });
        });
    }
	function tooltipAjax(){
		$('.tooltip-poll').tooltip({html: true,placement : 'right'});
	}
});
function not_yet(){
	alert('Chức năng này chưa có nhé !!! Chờ update');
}
