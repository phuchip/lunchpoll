<nav>
    <div class="nav-left">
        <a class="back-poll" href="./"><img src="/assets/image/back.png"> Quay lại LunchPoll</a>
    </div>

    <div class="nav-middle">
        <a href="#" class="active" title="Trang chủ">
            <i class="fa fa-home"></i>
        </a>

        <a href="#" title="Bạn bè">
            <i class="fa fa-user-friends"></i>
        </a>

        <a href="#" title="Videos">
            <i class="fa fa-play-circle"></i>
        </a>

        <a href="#" title="Nhóm">
            <i class="fa fa-users"></i>
        </a>
    </div>

    <div class="nav-right">
        <span class="profile"><?= Globals::createTagImage($this->session->userdata('user')['avatar'],'avatar',$this->session->userdata('user')['username']) ?></span>

        <a href="#">
            <i class="fa fa-bell"></i>
        </a>

        <a href="#">
            <i class="fa fa-ellipsis-h"></i>
        </a>
    </div>
</nav>