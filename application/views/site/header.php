<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" href="poll-history">Lịch sử bình chọn</a> -->
                <a class="nav-link" onclick="not_yet()">Lịch sử bình chọn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="today-result">Kết quả hôm nay</a>
            </li>
            <?php if (isset($this->session->userdata('user')['id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Xin chào : <span style="color: #7fffd4"><?= $this->session->userdata('user')['username'] ?></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="home">Thông tin tài khoản</a></li>
                        <li><a class="dropdown-item" href="logout">Đăng xuất</a></li>
                        
                    </ul>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" type="button" data-toggle="modal" data-target="#Modal">Đăng nhập / Đăng ký</a>
                </li>
            <?php } ?>

        </ul>
    </div>
</nav>