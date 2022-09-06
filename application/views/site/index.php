<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="keywords" content="<?php if(isset($meta_key)){echo $meta_key;} ?>"/>
    <meta name="description" content="<?php if(isset($meta_des)){echo $meta_des;} ?>"/>
    <link rel="alternate" href="<?php if(isset($canonical)){echo $canonical;}else{echo base_url();} ?>" hreflang="vi" />
    <meta name="robots" content="noindex,nofollow" />
    <!-- Library -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/tooltipster/css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css" />
</head>
<body>
    <?php echo $this->load->view('site/header','',true); ?>
    <?php echo $this->load->view($content,'',true); ?>
    <?php echo $this->load->view('site/modal_login','',true); ?>
    <!-- <?php echo $this->load->view('site/footer','',true); ?> -->
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/home.js"></script>
    <script type="text/javascript" src="/assets/tooltipster/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/assets/js/lazysizes.min.js"></script>
</body>
</html>