<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
	      	<div class="modal-body">
	      		<div class="login">
			        <div class="form-title text-center">
			          <h4>Đổi mật khẩu</h4>
			        </div>
		        	<div class="d-flex flex-column text-center">
			          	<form id="change-password">
			          		<div id="responseDiv" class="alert text-center" style="display: none;">
			          			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
								<span id="message" style="font-size: 13px;"></span>
							</div>
			              	<input type="password" class="form-control" id="password-new" placeholder="Nhập mật khẩu mới..." required>
				            <button type="button" id="btn-change-password" class="btn btn-info btn-round">Đổi mật khẩu</button>
			          	</form>
		        	</div>
		      	</div>
	  		</div>
		</div>
	</div>
</div>
<script src="/assets/js/account.js"></script>