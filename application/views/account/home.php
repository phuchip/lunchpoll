<div class="container">
    <?php $this->load->view('account/left_panel'); ?>
    <div class="middle-panel">

        <div class="story-section">

            <div class="story create">
                <div class="dp-image">
                    <img src="/assets/image/dp.jpg" alt="Profile pic">
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
                    <img src="/assets/image/girl.jpg" alt="">
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

        <div class="post">
            <div class="post-top">
                <div class="dp">
                    <img src="/assets/image/girl.jpg" alt="">
                </div>
                <div class="post-info">
                    <p class="name">Anuska Sharma</p>
                    <span class="time">12 hrs ago</span>
                </div>
                <i class="fas fa-ellipsis-h"></i>
            </div>

            <div class="post-content">
                Roses are red <br>
                Violets are blue <br>
                I'm ugly & you are too😏
            </div>

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
        </div>

        <div class="post">
            <div class="post-top">
                <div class="dp">
                    <img src="/assets/image/dp.jpg" alt="">
                </div>
                <div class="post-info">
                    <p class="name">Ramesh GC</p>
                    <span class="time">2 days ago</span>
                </div>
                <i class="fas fa-ellipsis-h"></i>
            </div>

            <div class="post-content">
                Mountains are so cool
                <img src="/assets/image/mountains.jpg" />
            </div>

            <div class="post-bottom">
                <div class="action">
                    <i class="far fa-thumbs-up"></i>
                    <span>Like</span>
                </div>
                <div class="action">
                    <i class="far fa-comment"></i>
                    <span>Comment</span>
                </div>
                <div class="action">
                    <i class="fa fa-share"></i>
                    <span>Share</span>
                </div>
            </div>
        </div>

        <div class="post">
            <div class="post-top">
                <div class="dp">
                    <img src="/assets/image/boy.jpg" alt="">
                </div>
                <div class="post-info">
                    <p class="name">Priyank Saksena</p>
                    <span class="time">1 week ago</span>
                </div>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="post-content">
                Happy birthday dear
                <img src="/assets/image/girl_with_light.jpg" alt="Mountains">
            </div>
            <div class="post-bottom">
                <div class="action">
                    <i class="far fa-thumbs-up"></i>
                    <span>Like</span>
                </div>
                <div class="action">
                    <i class="far fa-comment"></i>
                    <span>Comment</span>
                </div>
                <div class="action">
                    <i class="fa fa-share"></i>
                    <span>Share</span>
                </div>
            </div>
        </div>

        <div class="post">
            <div class="post-top">
                <div class="dp">
                    <img src="/assets/image/model.jpg" alt="">
                </div>
                <div class="post-info">
                    <p class="name">Pragati Adhikari</p>
                    <span class="time">5 mins ago</span>
                </div>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="post-content">
                Hey, everybody! My new shoes are here
                <img src="/assets/image/shoes.jpg" alt="Shoes">
            </div>
            <div class="post-bottom">
                <div class="action">
                    <i class="far fa-thumbs-up"></i>
                    <span>Like</span>
                </div>
                <div class="action">
                    <i class="far fa-comment"></i>
                    <span>Comment</span>
                </div>
                <div class="action">
                    <i class="fa fa-share"></i>
                    <span>Share</span>
                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view('account/right_panel'); ?>
</div>
<?php $this->load->view('modal/create_post'); ?>