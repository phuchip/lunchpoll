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
})