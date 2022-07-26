<link rel="stylesheet" type="text/css" href="/assets/css/create_post.css">
<div class="modal fade" id="CreatePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <section class="create-post">
                <header>Tạo bài viết</header>
                <form action="#">
                    <div class="content">
                        <img src="<?= $this->session->userdata('user')['avatar'] ?>" alt="<?= $this->session->userdata('user')['username'] ?>">
                        <div class="details">
                            <p><?= $this->session->userdata('user')['username'] ?></p>
                            <div class="privacy">
                                <i class="fas fa-user-friends"></i>
                                <span>Bạn bè</span>
                                <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    <textarea placeholder="<?= $this->session->userdata('user')['username'] ?> ơi, bạn đang nghĩ gì thế?" spellcheck="false" required=""></textarea>
                    <div class="theme-emoji">
                        <img src="/assets/icons/theme.svg" alt="theme">
                        <img src="/assets/icons/smile.svg" alt="smile">
                    </div>
                    <div class="options">
                        <p>Thêm vào bài viết của bạn</p>
                        <ul class="list">
                            <li><img src="/assets/icons/gallery.svg" alt="gallery"></li>
                            <li><img src="/assets/icons/tag.svg" alt="gallery"></li>
                            <li><img src="/assets/icons/emoji.svg" alt="gallery"></li>
                            <li><img src="/assets/icons/mic.svg" alt="gallery"></li>
                            <li><img src="/assets/icons/more.svg" alt="gallery"></li>
                        </ul>
                    </div>
                    <button>Đăng</button>
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
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-globe-asia"></i></div>
                            <div class="details">
                                <p>Công khai</p>
                                <span>Mọi người trên hoặc ngoài Facbook</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li class="active">
                        <div class="column">
                            <div class="icon"><i class="fas fa-user-friends"></i></div>
                            <div class="details">
                                <p>Bạn bè</p>
                                <span>Bạn bè của bạn trên Facebook</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-user"></i></div>
                            <div class="details">
                                <p>Bạn bè ngoại trừ...</p>
                                <span>Không hiển thị với một số bạn bè</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-lock"></i></div>
                            <div class="details">
                                <p>Chỉ mình tôi</p>
                                <span>Only you can see your post</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-cog"></i></div>
                            <div class="details">
                                <p>Tùy chỉnh</p>
                                <span>Bao gồm và loại trừ bạn bè, danh sách</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    changeAudience();
    function changeAudience() {
        const parent = $('#CreatePost');
        privacy = parent.find(".create-post .privacy");
        arrowBack = parent.find(".audience .arrow-back");
        privacy.click(function(){
            parent.addClass("active");
        });
        arrowBack.click(function(){
            parent.removeClass("active");
        });
    }
    $('.audience .list li').click(function(e){
    	if (!$(this).hasClass('active')) {
    		$('.audience .list li').removeClass('active');
    		$(this).addClass('active');
    	}
    });
</script>
