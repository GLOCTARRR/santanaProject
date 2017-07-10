<div class="main-container col2-left-layout">
	<div class="main">
		<div class="col-main">
			<!--Category Title-->
			<div class="page-title category-title">
				<h1>Womens</h1>
			</div>
			<!--Category Image-->
			<div class="category-products">
				<?php if($products):?>
					<!--Start toolbar-->
					<div class="toolbar">
						<div class="pagination">
							<div class="pages"> <strong>Page:</strong>
								<?php echo $this->Paginator->counter(['separator' => ' из '])?>
								<?php echo $this-> Paginator->first('<<')?>
								<ol>
									<?php echo $this->Paginator->numbers([
										'tag' => 'li',
										'separator' => '',
										'modulus' => 4
									]);	?>
								</ol>
								<?php echo $this-> Paginator->last('>>')?>
							</div>
						</div>
					</div>
					<!--End toolbar-->

					<!--Start Category Product List-->


					<ul class="products-grid first odd">

						<?php
						$count = 1;
						foreach($products as $product):?>
							<li class="item <?php echo $count%3== 0? 'last' : 'first'; ?>"> <a href="/admin/product/edit/<?php echo $product['Product']['id']?>" title="Lorem ipsum dolor sit amet," class="product-image">
									<?php echo $this->Html->image('product_img/thumbs/pro1.jpg', array('alt' => $product['Product']['title'])) ?></a>
								<h2 class="product-name"> <a href="/admin/product/edit/<?php echo $product['Product']['id']?>" title="Lorem ipsum dolor sit amet,"><?php echo $product['Product']['title']?></a> </h2>
								<div class="price-box"> <span class="regular-price"> <span class="price"><?php echo $product['Product']['price']?></span> </span> </div>
								<div class="actions">
									<button type="button" title="Add to Cart" class="button btn-cart"><span><span>Add to Cart</span></span></button>
									<a href="<?php echo '/'.IMAGES_URL.'product_img/zoom1.jpg' ?>" class="fancybox quick_view">quick view</a>
									<ul class="add-to-links">
										<li><a href="#" class="link-wishlist">Add to Wishlist</a></li>
										<li class="last"><a href="#" class="link-compare">Add to Compare</a></li>
									</ul>
								</div>
							</li>
							<?php $count++; endforeach;?>

					</ul>
					<!--End Category Product List-->

					<!--Start toolbar bottom-->
					<div class="toolbar-bottom">
						<div class="toolbar">
							<div class="pagination">
								<div class="pages"> <strong>Page:</strong>
									<?php echo $this->Paginator->counter(['separator' => ' из '])?>
									<?php echo $this-> Paginator->first('<<')?>
									<ol>
										<?php echo $this->Paginator->numbers([
											'tag' => 'li',
											'separator' => '',
											'modulus' => 4
										]);	?>
									</ol>
									<?php echo $this-> Paginator->last('>>')?>
								</div>
							</div>
						</div>
					</div>
					<!--End toolbar bottom-->
				<?php else :?>
					<h3>Товары не найдены</h3>
				<?php endif;?>
			</div>
		</div>
		<div class="col-left sidebar">
			<!--Start Magic Category Block-->
			<div class="magicat-container">
				<div class="block">
					<div class="block-title cat_heading"> <strong><span>Меню админки</span></strong> </div>
							<ul id="magicat">
								<li class="first level0-inactive level0 inactive"><span class="magicat-cat"><a href="#"><span>Редактирование профиля</span></a></span></li>
							</ul>
				</div>
			</div>
			<!--End Magic Category Block-->
		</div>
	</div>
	<div style="display: none;" id="back-top"> <a href="#"><img alt="" src="/images/backtop.gif"/></a> </div>
</div>

