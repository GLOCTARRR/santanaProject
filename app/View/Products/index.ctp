<!--START OF MAIN CONTENT-->
<div class="main-container col1-layout">
	<div class="main">
		<div class="col-main">
			<div id="messages_product_view"></div>
			<div class="product-view">
				<div class="product-essential">
					<!--Start Product Information Right-->
					<div class="product-shop">
						<!--Product Title-->
						<div class="product-name">
							<h1><?php echo $product['Product']['title']?></h1>
						</div>
						<p class="availability in-stock"><span><?php echo $product['Product']['is_new'] 	 ? 'new' : ''?></span></p>
						<div class="price-box"> <span class="regular-price" id="product-price-167"> <span class="price"><?php echo $product['Product']['price']?>$</span> </span> </div>
						<div class="content">
							<?php echo $product['Product']['body']?>
						</div>
					</div>
					<!--End Product Information Right-->

					<!--Start Product Image Zoom Left-->
					<div class="product-img-box">
						<p class="product-image product-image-zoom"> <a href='/<?php echo IMAGES_URL?>/product_img/zoom1.jpg' class = 'cloud-zoom' id='zoom1'
																		rel="adjustX: 10, adjustY:-4"> <img style="max-height:400px; width:400px;" src="/<?php echo IMAGES_URL?>/product_img/zoom1.jpg" alt='' title="Optional title display" /> </a> </p>
					</div>
					<!--End Product Image Zoom Left-->
					<div class="clearer"></div>
				</div>
			</div>
		</div>
	</div>
	<div style="display: none;" id="back-top"> <a href="#"><img alt="" src="images/backtop.gif" /></a> </div>
</div>
<!--END OF MAIN CONTENT-->
