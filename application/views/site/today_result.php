<div class="container">
	<div class="show-result" >
		<a class="btn btn-gold" href="javascript:void(0)">Kết quả hôm này là ....</a>
			<div class="congrats">
				<div class="el ang-a animated d-none" data-in="zoomOut"></div>
				<div class="el ang-b animated d-none" data-in="zoomOut"></div>
				<div class="el glow animated d-none" data-in="fadeIn"></div>
				<div class="el bg bg-1 animated d-none" data-in="fadeIn" data-out="zoomOut"></div>
				<div class="el dots animated d-none"> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i></div>
				<div class="el bg bg-2 animated d-none" data-in="zoomIn" data-out="bounceOut"></div>
				<div class="el ang-c animated d-none" data-in="zoomOut"></div>
				<div class="el shine animated d-none" data-in="shineIn" data-out="fadeOut"></div>
				<div class="el text animated d-none" data-in="zoomOutIn" data-out="zoomOutLeft"><?= isset($result->name)?$result->name:'Ăn NĂN' ?></div>
			</div>
	</div>
	<div class="ressult-content">
		<h1 class="text-align-center"><?= isset($result->name)?$result->name:'Ăn NĂN' ?></h1>
		<div class="introduce"><?= isset($result->description)?$result->description:'' ?></div>
	</div>
</div>
<style type="text/css">
	.ressult-content{
		display: none;
		color: #000;
		padding: 10px 30px;
	}
	.text-align-center{
		color: #000;
	}
	.introduce{
		font-size: 16px;
		font-weight: normal;
	}
	.ressult-content{
		background-color: #fff;
	}
</style>
<link rel="stylesheet" type="text/css" href="/assets/css/today_result.css">
<script src="/assets/js/today_result.js"></script>
<script type="text/javascript">
	$('.btn-gold').click(function() {
		$(this).remove();
		setTimeout(function(){
			$('body').css('background','#fff');
			$('body').css('background-image','url(/../../images/bg.jpg)');
			$('.ressult-content').css('display','block');
		},5000);
		
	});
</script>