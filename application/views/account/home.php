<?php echo $this->load->view('account/header','',true); ?>

<div class="container">
    <?php $this->load->view('account/left_panel'); ?>
    <div class="middle-panel">

        <div class="story-section">

            <div class="story create">
                <div class="dp-image">
                    <img class="avatar" src="<?= $this->session->userdata('user')['avatar'] ?>" alt="<?= $this->session->userdata('user')['username'] ?>">
                </div>
                <span class="dp-container">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="name">Create Story</span>
            </div>


            <div class="story">
                <img src="/assets/image/model.jpg" alt="Anuska's story">
                <div class="dp-container">
                    <img src="/assets/image/girl.jpg" alt="">
                </div>
                <p class="name">Anuska Sharma</p>
            </div>

            <div class="story">
                <img src="/assets/image/boy.jpg" alt="Story image">
                <span class="dp-container">
                    <img src="/assets/image/dp.jpg" alt="Profile pic">
                </span>
                <span class="name">Gaurav Gall</span>
            </div>

            <div class="story">
                <img src="/assets/image/mountains.jpg" alt="Story image">
                <span class="dp-container">
                    <img src="/assets/image/boy.jpg" alt="Profile pic">
                </span>
                <span class="name">Priyank Saksena</span>
            </div>

            <div class="story">
                <img src="/assets/image/shoes.jpg" alt="Story image">
                <span class="dp-container">
                    <img src="/assets/image/model.jpg" alt="Profile pic">
                </span>
                <span class="name">Pragati Adhikari</span>
            </div>
        </div>

        <div class="post create">
            <div class="post-top">
                <div class="dp">
                    <img class="avatar" src="<?= $this->session->userdata('user')['avatar'] ?>" alt="<?= $this->session->userdata('user')['username'] ?>">
                </div>
                <div class="create-post-area" data-toggle="modal" data-target="#CreatePost">
                    <span class="create-post"><?= $this->session->userdata('user')['username'] ?> ơi, bạn đang nghĩ gì thế?</span>
                </div>
            </div>

            <div class="post-bottom">
                <div class="action">
                    <i class="fa fa-video"></i>
                    <span>Video Trực tiếp</span>
                </div>
                <div class="action">
                    <i class="fa fa-image"></i>
                    <span>Ảnh/video</span>
                </div>
                <div class="action">
                    <i class="fa fa-smile"></i>
                    <span>Cảm xúc/Hoạt động</span>
                </div>
            </div>
        </div>

        <div id="list_post">
            <?php if(isset($arrPost)): ?>
                <?php foreach($arrPost as $post): ?>
                    <?php $emoji='';
                    $arrPostImage = [];
                    if(!empty($post->image)){$arrPostImage = explode(',',$post->image);}
                    if(isset($arrPostEmoji)){
                        if(isset($arrPostEmoji[$post->id]) && $arrPostEmoji[$post->id]['emoji_id'] != 0){
                            $emoji ='active';
                        }
                    } ?>
                    <div class="post" data-id="<?= $post->id ?>" data-user="<?= $this->encryption->encrypt($post->user_id) ?>">
                        <div class="post-top">
                            <div class="post-account">
                                <div class="dp">
                                    <img src="<?= $post->avatar ?>" alt="<?= $post->user_name ?>">
                                </div>
                                <div class="post-info">
                                    <p class="name"><?= $post->user_name ?></p>
                                    <span class="time"><?= Globals::timming($post->created) ?></span>
                                </div>
                            </div>
                            <div class="post-option" data-id="<?= $post->id ?>">
                                <i class="fas fa-ellipsis-h icon-option"></i>
                                <ul class="options">
                                    <li class="item" data-value="report"><i class="fa fa-flag"></i> Báo cáo</li>
                                    <li class="item" data-value="delete"><i class="fa fa-trash"></i> Xóa bài viết</li>
                                </ul>
                            </div>
                        </div>

                        <div class="post-content"><?= $post->content ?></div>
                        <?php if(count($arrPostImage) > 0): ?>
                            <div class="post-image-area">
                                <?php foreach($arrPostImage as $image): ?>
                                    <img class="image-post lazyload" src="/assets/loading3.gif" data-src="<?= $image ?>">
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="post-bottom <?= $emoji ?>">
                            <div class="action like <?= $emoji ?>">
                                <i class="far fa-thumbs-up"></i>
                                <span>Thích</span>
                            </div>
                            <div class="action comment">
                                <i class="far fa-comment"></i>
                                <span>Bình luận</span>
                            </div>
                            <div class="action share">
                                <i class="fa fa-share"></i>
                                <span>Chia sẻ</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có bài đăng nào</p>
            <?php endif; ?>
        </div>

    </div>
    <?php $this->load->view('account/right_panel'); ?>
</div>
<?php $this->load->view('modal/create_post'); ?>
<script>
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
</script>