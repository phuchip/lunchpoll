<link rel="stylesheet" href="/assets/css/profile.css">
<link rel="stylesheet" href="/assets/css/material-icon.css">
<main>
    <div id="profile-upper">
        <div id="profile-banner-image">
            <img src="https://imagizer.imageshack.com/img921/9628/VIaL8H.jpg" alt="Banner image">
        </div>
        <div id="profile-d">
            <div id="profile-pic">
                <img src="https://imagizer.imageshack.com/img921/3072/rqkhIb.jpg">
                <div class="caption">
                    <span>
                        <label for="colorgbChangeAvatar" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></label>
                        <input type="file" accept="image/*" id="colorgbChangeAvatar" name="file" class="hide form-control">
                    </span>
                </div>
            </div>
            <div id="u-name"><?= $this->session->userdata('user')['username'] ?></div>
            <div class="tb" id="m-btns">
                <div class="td">
                    <div class="m-btn"><i class="material-icons">format_list_bulleted</i><span>Chỉnh sửa trang cá nhân</span></div>
                </div>
                <div class="td">
                    <div class="m-btn"><i class="material-icons">lock</i><span>Change Password</span></div>
                </div>
            </div>
            <div id="edit-profile"><i class="material-icons">camera_alt</i></div>
        </div>
        <div id="black-grd"></div>
    </div>
    <div id="main-content">
        <div class="tb">
            <div class="td" id="l-col">
                <div class="l-cnt">
                    <div class="cnt-label">
                        <i class="l-i" id="l-i-i"></i>
                        <span>Giới thiệu chung</span>
                        <div class="lb-action"><i class="material-icons">edit</i></div>
                    </div>
                    <div id="i-box">
                        <div id="intro-line">Front-end Engineer</div>
                        <div id="u-occ">I love making applications with Angular.</div>
                        <div id="u-loc"><i class="material-icons">location_on</i><a href="#">Bengaluru</a>, <a href="#">India</a></div>
                    </div>
                </div>
                
            </div>
            <div class="td" id="m-col">
                <div class="m-mrg" id="composer">
                    <div class="middle-panel">
                        <div class="post create">
                            <div class="post-top">
                                <div class="dp">
                                    <img class="avatar" src="/<?= $this->session->userdata('user')['avatar'] ?>" alt="<?= $this->session->userdata('user')['username'] ?>">
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
                            <?php if (isset($arrPost)) : ?>
                                <?php foreach ($arrPost as $post) : ?>
                                    <?php $emoji = '';
                                    $arrPostImage = [];
                                    if (!empty($post->image)) {
                                        $arrPostImage = explode(',', $post->image);
                                    }
                                    if (isset($arrPostEmoji)) {
                                        if (isset($arrPostEmoji[$post->id]) && $arrPostEmoji[$post->id]['emoji_id'] != 0) {
                                            $emoji = 'active';
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
                                        <?php if (count($arrPostImage) > 0) : ?>
                                            <div class="post-image-area">
                                                <?php foreach ($arrPostImage as $image) : ?>
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
                            <?php else : ?>
                                <p>Không có bài đăng nào</p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>