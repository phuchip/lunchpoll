<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="keywords" content="<?php if(isset($meta_key)){echo $meta_key;} ?>"/>
    <meta name="description" content="<?php if(isset($meta_des)){echo $meta_des;} ?>"/>
    <link rel="alternate" href="<?php if(isset($canonical)){echo $canonical;}else{echo base_url();} ?>" hreflang="vi" />
    <meta name="robots" content="noindex,nofollow" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css" />
</head>
<body>
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
                        <?php if ($food['user'] && isset($food['user'][$this->session->userdata('user')['id']])) {
                            $selected = 'selected';
                            $checked = 'checked';
                        }else{
                            $selected = '';
                            $checked = '';
                        } ?>
                        <li class="item <?= $selected ?>" id="opt-<?= $food['food_id'] ?>" data-id = "<?= $food['food_id'] ?>">
                            <div class="option">
                                <label for="poll" class="label-checkbox"><input type="checkbox" class="checkbox" name="poll" value="<?= $food['food_id'] ?>" <?= $checked ?>><?= $food['name'] ?></label>
                                <div class="percent"><?= $food['percent'] ?></div>
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
    <script src="assets/js/home.js"></script>
</body>
</html>