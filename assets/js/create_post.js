$('#create_post').submit(function(e){
    var formData = new FormData(document.querySelector('#create_post'));
    var content = formData.get('content_post');
    $.ajax({
        url: "Api/post",
        type : "POST",
        data : formData,
        processData: false,
        contentType: false,
        success : function (result){
            var data = $.parseJSON(result);
            if(data.success){
                var html = '';
                html += `<div class="post">
                            <div class="post-top">
                                <div class="dp">
                                    <img src="<?= $this->session->userdata('user')['avatar'] ?>" alt="<?= $this->session->userdata('user')['username'] ?>">
                                </div>
                                <div class="post-info">
                                    <p class="name"><?= $this->session->userdata('user')['username'] ?></p>
                                    <span class="time">Vừa xong</span>
                                </div>
                                <i class="fas fa-ellipsis-h"></i>
                            </div>

                            <div class="post-content">`+content+`</div>

                            <div class="post-bottom">
                                <div class="action">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>Thích</span>
                                </div>
                                <div class="action">
                                    <i class="far fa-comment"></i>
                                    <span>Bình luận</span>
                                </div>
                                <div class="action">
                                    <i class="fa fa-share"></i>
                                    <span>Chia sẻ</span>
                                </div>
                            </div>
                        </div>`;
                $('#CreatePost').modal('hide');
                $('textarea[name="content_post"]').val('');
                $('#list_post').prepend(html);
            }else{
                $('.btn-post').append('<p class="error error_post text-center">'+data.mes+'</p>');
            }
        }
    });
});