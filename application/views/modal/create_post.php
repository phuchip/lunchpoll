<link rel="stylesheet" type="text/css" href="/assets/css/create_post.css">
<?php $arrSubject = Globals::$arrSubject;
$arrSubjectJson = json_encode($arrSubject); ?>
<div class="modal fade" id="CreatePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <section class="create-post">
                <header>Tạo bài viết</header>
                <form id="create_post" onsubmit="return false">
                    <div class="content">
                        <img src="<?= $this->session->userdata('user')['avatar'] ?>" alt="<?= $this->session->userdata('user')['username'] ?>">
                        <div class="details">
                            <p><?= $this->session->userdata('user')['username'] ?></p>
                            <div class="privacy">
                                <i class="fas <?= $arrSubject[$this->session->userdata('user')['subject']]['icon'] ?>"></i>
                                <span><?= $arrSubject[$this->session->userdata('user')['subject']]['name'] ?></span>
                                <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    <textarea name="content_post" placeholder="<?= $this->session->userdata('user')['username'] ?> ơi, bạn đang nghĩ gì thế?" spellcheck="false" required></textarea>
                    <input type="file" id="file_post" name="image_post[]" multiple accept="image/*">
                    <div id="drop-area" class="hidden">
                    </div>
                    <div class="theme-emoji">
                        <img src="/assets/icons/theme.svg" alt="theme">
                        <img src="/assets/icons/smile.svg" alt="smile">
                    </div>
                    <div class="options">
                        <p>Thêm vào bài viết của bạn</p>
                        <ul class="list">
                            <li class="add-image"><img src="/assets/icons/gallery.svg" alt="gallery"></li>
                            <li class="add-tag"><img src="/assets/icons/tag.svg" alt="gallery"></li>
                            <li class="add-emoji"><img src="/assets/icons/emoji.svg" alt="gallery"></li>
                            <li class="add-event"><img src="/assets/icons/mic.svg" alt="gallery"></li>
                            <li><img src="/assets/icons/more.svg" alt="gallery"></li>
                        </ul>
                    </div>
                    <button type="submit" class="btn-post">Đăng</button>
                </form>
            </section>
            <section class="audience">
                <header>
                    <div class="arrow-back"><i class="fas fa-arrow-left"></i></div>
                    <p>Chọn đối tượng</p>
                </header>
                <div class="content">
                    <p>Ai có thể xem bài viết của bạn?</p>
                    <span>Your post may show up in News Feed, on your profile, in search results, and in Messenger</span>
                </div>
                <ul class="list">
                    <?php foreach ($arrSubject as $key => $subject) : ?>
                        <li data-id="<?= $key ?>" <?= $this->session->userdata('user')['subject'] == $key ? 'class="active"' : '' ?>>
                            <div class="column">
                                <div class="icon"><i class="fas <?= $subject['icon'] ?>"></i></div>
                                <div class="details">
                                    <p><?= $subject['name'] ?></p>
                                    <span><?= $subject['description'] ?></span>
                                </div>
                            </div>
                            <div class="radio"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>
    </div>
</div>
<script>
    $('.add-image').click(function() {
        $('#drop-area').removeAttr('class');
        $('#drop-area').addClass('show');
        var html = '';
        html += `<div class="remove-post-image"><i class="fa fa-times"></i></div>
                        <div class="drag-area">
                            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                            <p>Thêm ảnh</p>
                            <p>hoặc kéo và thả</p>
                        </div>
                        <div id="gallery"></div>`;
        $('#drop-area').html(html);
        addImage();
        remveImageCreatePost()
    });

    function remveImageCreatePost() {
        $('.remove-post-image').click(function() {
            $('#drop-area').removeAttr('class');
            $('#drop-area').addClass('hidden');
            $('#drop-area').html('');
            e.preventDefault();
            e.stopPropagation();
        });
    }

    function addImage() {
        $('.drag-area').click(function(){
            $('#file_post').click();
        });
        // ************************ Drag and drop ***************** //
        let dropArea = document.getElementById("drop-area");
        let filePost = document.getElementById("file_post");

        // Prevent default drag behaviors
        ;
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false)
            document.body.addEventListener(eventName, preventDefaults, false)
        })

        // Highlight drop area when item is dragged over it
        ;
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false)
        })

        ;
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false)
        })

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            dropArea.classList.add('highlight')
        }

        function unhighlight(e) {
            dropArea.classList.remove('active')
        }

        function handleDrop(e) {
            var dt = e.dataTransfer
            var files = dt.files
            document.getElementById("file_post").files = files;
            handleFiles(files);
        }

        // Hàm thực hiện việc xử lý files sau khi User chọn
        function handleFileSelect(event) {
            // Lấy danh sách các files mà User chọn
            var files = event.target.files;
            if (files.length > 3) {
                alert('Vui lòng chọn tối đa 3 ảnh');
                return;
            }
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                // Duyệt từng file trong danh sách và render vào DIV trống đặt sẵn
                previewFile(file);
            }
        }

        function handleFiles(files) {
            files = [...files]
            if (files.length > 3) {
                alert('Chọn tối đa 3 ảnh');
                return false;
            }
            document.getElementById("file_post").FileList = files;
            files.forEach(previewFile);
            $('#drop-area .drag-area').addClass('hidden');
        }

        function previewFile(file) {
            let reader = new FileReader()
            reader.readAsDataURL(file)
            reader.onloadend = function() {
                let img = document.createElement('img')
                img.className = 'post-image';
                img.src = reader.result
                document.getElementById('gallery').appendChild(img)
            }
            $('.drag-area').addClass('hidden');
        }
        // Gắn sự kiện xử lý files sau khi User chọn
        document.getElementById("file_post").addEventListener('change', handleFileSelect, false);
    }
</script>
<script type="text/javascript">
    changeAudience();
    var arrSubject = <?= $arrSubjectJson; ?>;

    function changeAudience() {
        const parent = $('#CreatePost');
        privacy = parent.find(".create-post .privacy");
        arrowBack = parent.find(".audience .arrow-back");
        privacy.click(function() {
            parent.addClass("active");
        });
        arrowBack.click(function() {
            parent.removeClass("active");
        });

    }
    $('.audience .list li').click(function(e) {
        if (!$(this).hasClass('active')) {
            $('.audience .list li').removeClass('active');
            $(this).addClass('active');
        }
        var icon_change = 'fas ';
        var id = $(this).attr('data-id');
        var privacy_icon = $('.privacy').find('i').first();
        var privacy_text = $('.privacy').find('span');
        icon_change += arrSubject[id]['icon'];
        var name_change = arrSubject[id]['name'];
        privacy_icon.removeAttr('class');
        privacy_icon.addClass(icon_change);
        privacy_text.text(name_change);
        $('.privacy').attr('data-id', id);
        $('#CreatePost').removeClass('active');
        if (id != <?= $this->session->userdata('user')['subject'] ?>) {
            $.post('Api/change_subject', {
                subject_id: id
            });
        }
    });

    $('#create_post').submit(function(e) {
        var formData = new FormData(document.querySelector('#create_post'));
        var content = formData.get('content_post');
        var object = $('#file_post' ).prop('files');
        if(object.length > 3){
            alert ('Vui lòng chọn tối đa 3 ảnh');
        }
        for(let i =0; i < object.length; i++){
            formData.append('file[]',object[i]);
        }
        $.ajax({
            url: "api/post",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(result) {
                var data = $.parseJSON(result);
                if (data.success) {
                    var html_image = '';
                    if(data.images.length > 0){
                        html_image += '<div class="post-image-area">';
                        $.each(data.images,function(index,value){
                            html_image += `<img class="image-post" src="`+value+`">`;
                        });
                        html_image += '</div>';
                    }
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

                                <div class="post-content">` + content + `</div>
                                `+html_image+`
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
                } else {
                    $('.btn-post').append('<p class="error error_post text-center">' + data.mes + '</p>');
                }
            }
        });
    });
</script>