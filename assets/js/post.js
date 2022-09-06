function actionPostOption(){
    $('.post-option .options .item').click(function(){
        var parent = $(this).parents('.post-option');
        var post_id = parent.data('id');
        var action = $(this).data('value');
        $.ajax({
            url: "api/action_post",
            type: "POST",
            data : {'post_id':post_id,'action':action},
            success: function(result) {
                let data = JSON.parse(result);
                if(data['status'] == 'success' && data['action'] == 'delete'){
                    $('.post[data-id="'+post_id+'"]').remove();
                    notification('success',data['message']);
                }else if(data['status'] == 'success' && data['action'] == 'report'){
                    notification('success',data['message']);
                }
                parent.find('.options').toggleClass('show');
            }
        });
    });
}
function showPostOption(){
    $('.icon-option').click(function(){
        var parent = $(this).parents('.post-option');
        parent.find('.options').toggleClass('show');
    });
}
function closePostOption(){
    // Close if the user clicks outside of it
    $(document).click(function (e) {
        if (!$(e.target).hasClass("icon-option") 
            && $(e.target).parents(".post-option").length === 0) 
        {
            $(".post-option .options").removeClass('show');
        }
    });
}
actionPostOption();
showPostOption();
closePostOption();