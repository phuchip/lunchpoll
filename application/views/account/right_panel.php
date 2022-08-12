<?php 
$CI = get_instance();
$user_id = $_COOKIE['user_id'];
$user_id = $CI->encryption->decrypt($user_id);
$arrFriend = $CI->db->select('username,name,email,avatar,description,active')
->where('id !=',$user_id)
->order_by('active desc,updated desc')
->get('user')->result(); ?>
<div class="right-panel">
    <div class="pages-section">
        <h4>Trang của bạn</h4>
        <a class='page' href="#">
            <div class="dp">
                <img src="/assets/image/logo.png" alt="">
            </div>
            <p class="name">Cody</p>
        </a>

        <a class='page' href="#">
            <div class="dp">
                <img src="/assets/image/dp.jpg" alt="">
            </div>
            <p class="name">Cody Tutorials</p>
        </a>
    </div>

    <div class="friends-section">
        <h4>Bạn bè</h4>
        <?php foreach($arrFriend as $friend): ?>
            <a class='friend' href="#">
                <div class="dp">
                    <?= Globals::createTagImage($friend->avatar,null,$friend->name,'avatar'); ?>
                    <i class="fa fa-circle <?= $friend->active == 1?'avatar-active':'avatar-non-active' ?>"></i>
                </div>
                <p class="name"><?= $friend->name ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</div>