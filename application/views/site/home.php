<?php if(isset($_COOKIE['user_id'])){$user_id = $this->session->userdata('user')['id'];} ?>
<div class="container">
    <div class="main">
        <div class="wrapper">
            <marquee>
                <div class="run-text d-flex">
                    <p class="mr-5">Trưa ăn gì cũng được chứ đừng ăn NĂN</p>
                    <p>Bình chọn đi mọi người !!!</p>
                </div>
            </marquee>
            <div class="poll-area">
                <ul class="items">
                <?php foreach($arrFood as $food): ?>
                    <?php  $selected = '';$checked = '';
                    if ($food['user'] && isset($user_id)) {
                        if(isset($food['user'][$user_id])){
                            $selected = 'selected';
                            $checked = 'checked';
                        }
                    } ?>
                    <li class="item <?= $selected ?>" id="opt-<?= $food['food_id'] ?>" data-id = "<?= $food['food_id'] ?>">
                        <div class="option">
                            <label for="poll" class="label-checkbox"><input type="checkbox" class="checkbox" name="poll" value="<?= $food['food_id'] ?>" <?= $checked ?>><?= $food['name'] ?></label>
                            <div class="percent"><?= $food['percent'] ?></div>
                        </div>
                        <div class="list-poll">
                            <div class="poll-by">
                                <img src="/images/avatar/202207/106926041089704775598-20220703185324.png">
                            </div>
                            <div class="poll-by">
                                <img src="/images/avatar/202207/106926041089704775598-20220703185324.png">
                            </div>
                            <div class="tooltip_templates">
                                <p>Hồng</p>
                                <p>Phúc</p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $food['percent'] ?>"></div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="add-option">
                <p type="button" class="btn-add" data-toggle="modal" data-target="#ModalFood"><i class="fa fa-plus"></i>Thêm món ăn</p>
            </div>
        </div>
    </div>
</div>
<?php echo $this->load->view('site/modal_add_food','',true); ?>