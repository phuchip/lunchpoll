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
            }
        }
    });
});
$('.icon-option').click(function(){
    var parent = $(this).parents('.post-option');
    parent.find('.options').toggleClass('show');
});
// Close if the user clicks outside of it
$(document).click(function (e) {
    if (!$(e.target).hasClass("icon-option") 
        && $(e.target).parents(".post-option").length === 0) 
    {
        $(".post-option .options").removeClass('show');
    }
});