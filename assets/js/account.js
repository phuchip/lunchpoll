$("#btn-change-password").click(function () {
    var password_new = $('#password-new').val().trim();
    $.ajax({
        url : 'api/change_password',
        type : 'POST',
        data : {password_new:password_new},
        success : function(result){
            let data = JSON.parse(result);
            $('#change_password').modal('hide');
            if (data['status'] == 'success') {
                notification('success',data['message']);
            }else{
                notification('warning',data['message']);
            }
        }
    });
});
$('#ChangeAvatar').change(function(){
    var file = $(this).prop("files")[0];
    var formData = new FormData();
    formData.append('file', file);
    $.ajax({
        url: '/api/change_avatar',
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function (result) {
            data = JSON.parse(result);
            if(data['status'] == 'success'){
                $('#profile-pic img').attr('src', data['image']);
                notification('success',data['message']);
            }else{
                notification('error',data['message']);
            }
        }
    });
});