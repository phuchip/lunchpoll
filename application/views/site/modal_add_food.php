<div class="modal fade" id="ModalFood" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			          <h4>Thêm món ăn</h4>
			        </div>
		      	</div>
		      	<div class="area_food">
		      		<form method="post" id="form-food" onsubmit="return false">
						<div class="form-item">
							<label>Món ăn</label>
							<input type="text" name="food_name" required>
						</div>
						<div class="form-item">
							<label>Mô tả</label>
							<textarea name="food_desc"></textarea>
						</div>
						<div class="form-item">
							<label>Ảnh</label>
							<input type="file" name="food_image">
						</div>
						<div class="form-submit">
							<button type="submit" class="btn-submit-food">Thêm</button>
						</div>
					</form>
		      	</div>
	  		</div>
		</div>
	</div>
</div>