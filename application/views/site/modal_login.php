<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header border-bottom-0">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
      		</div>
	      	<div class="modal-body">
	      		<div class="login">
			        <div class="form-title text-center">
			          <h4>Đăng nhập</h4>
			        </div>
		        	<div class="d-flex flex-column text-center">
			          	<form class="login-register">
			          		<div id="responseDiv" class="alert text-center" style="display: none;">
			          			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
								<span id="message" style="font-size: 13px;"></span>
							</div>
			              	<input type="email" class="form-control" id="email-login" placeholder="Nhập địa chỉ email..." required>
			              	<input type="password" class="form-control" id="password-login" placeholder="Nhập mật khẩu..." required>
				            <button type="button" id="login-submit" class="btn btn-info btn-round">Đăng nhập</button>
			          	</form>
			          	<div class="text-center text-muted delimiter"><i>Hoặc</i></div>
			          	<div class="d-flex justify-content-center social-buttons">
				            <!-- a onclick="not_yet()" class="btn-login-social login-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
				            <a onclick="not_yet()" class="btn-login-social login-facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-official"></i></a> -->
				            <a href="<?= Globals::getLinkLogin(); ?>" class="btn-login-social login-google" data-toggle="tooltip" data-placement="top" title="Google"><i class="fa fa-google"></i></a>
			          	</div>
		        	</div>
			      	<div class="modal-footer d-flex justify-content-center">
			        	<div class="signup-section">Bạn chưa có tài khoản ? <a href="javascript:void(0)" class="text-info btn-register"> Đăng ký</a>.</div>
			      	</div>
		      	</div>
		      	<div class="register" style="display: none;">
		      		<div class="form-title text-center">
			          <h4>Đăng ký</h4>
			        </div>
		        	<div class="d-flex flex-column text-center">
			          	<form class="login-register">
			          		<div id="responseDiv2" class="alert text-center" style="display: none;">
			          			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
								<span id="message2" style="font-size: 13px;"></span>
							</div>
			          		<input type="text" class="form-control" id="username-register" placeholder="Nhập tên tài khoản...">
		              		<input type="email" class="form-control" id="email-register" placeholder="Nhập địa chỉ email...">
			              	<input type="password" class="form-control" id="password-register" placeholder="Nhập mật khẩu...">
			            	<input type="password" class="form-control" id="Re-password-register" placeholder="Nhập lại mật khẩu...">
				            <button type="button" id="register-submit" class="btn btn-info btn-round btn-signup">Đăng ký</button>
			          	</form>
		        	</div>
			      	<div class="modal-footer d-flex justify-content-center">
			        	<div class="signup-section">Quay lại đăng nhập ? <a href="javascript:void(0)" class="text-info btn-go-back"> Quay lại</a>.</div>
			      	</div>
		      	</div>
	  		</div>
		</div>
	</div>
</div>