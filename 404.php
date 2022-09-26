<?php
/*
Template Name: 404
*/
?>
<?php 
	include 'blocks/head.php';
 ?>
<body>

	<div  class="main page-mb" id="main">
		<?php 
			include 'blocks/header.php';
		 ?>

	</div>
	
	<div class="section main-pages-wrap psr">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<div class="container-big main-pages psr">
			<div class="main-pages-left">
				
		
				<div class="title-b rel fw4 msm tal"> <span class="techno-block-item-num fwb">404</span> <span class="title">страница не найдена</span>
					<div class="fl-dot"></div>
				</div>
				<a href="<?php the_permalink(2); ?>" class="show-link show-link_fw">
					<img src="http://dm-bar-site.ru/tractorwp/wp-content/themes/trc/assets/img/news/arrl.svg" alt="" class="show-img2 mr">
					<span class="text link mr">
						На главную
					</span>


				</a>
			</div>
		
			<!-- <div class="main-pages-right">
				<img src="<?php the_field('img_n',170); ?>" alt="">
			</div> -->
		
		
		</div>
	</div>


	



	 <?php 
		include 'blocks/modals.php';
	 ?>
	<?php 
		include 'blocks/footer-big.php';
	 ?>

	



		
	<?php 
		include 'blocks/scripts.php';
	 ?>


	 <script>
	 	$('.pg-item').on('click', function(event) {
	 		
	 		
	 		if($(this).hasClass('active')){
	 			event.preventDefault();
	 		}
	 		
	 	});
	 </script>

</body>
</html>