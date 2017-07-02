<div class="main-container col2-left-layout">
	<div class="main">
		<div class="col-main">
			<!--Category Title-->
			<div class="page-title category-title">
				<h1>Womens</h1>
			</div>
			<!--Category Image-->
			<div class="category-products">
				<?php if(!is_array($search_res)): ?>
					<h3><?php echo $search_res?></h3>
				<?php elseif(!empty($search_res)):?>
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

					<ul class="products-grid first odd">

						<?php
						$count = 1;
						foreach($search_res as $search):?>
							<li class="item <?php echo $count%3== 0? 'last' : 'first'; ?>"> <a href="/product/<?php echo $search['Product']['id']?>" title="Lorem ipsum dolor sit amet," class="product-image">
									<?php echo $this->Html->image('product_img/thumbs/pro1.jpg', array('alt' => $search['Product']['title'])) ?></a>
								<h2 class="product-name"> <a href="/product/<?php echo $search['Product']['id']?>" title="Lorem ipsum dolor sit amet,"><?php echo $search['Product']['title']?></a> </h2>
								<div class="price-box"> <span class="regular-price"> <span class="price"><?php echo $search['Product']['price']?></span> </span> </div>
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
				<?php else: ?>
					<h3>По данном запросу ничего не найдено</h3>
				<?php endif;?>
			</div>
		</div>
		<div class="col-left sidebar">
			<!--Start Magic Category Block-->
			<div class="magicat-container">
				<div class="block">
					<div class="block-title cat_heading"> <strong><span><?php echo $cats_menu_sidebar[$cat_id][$cat_id]?></span></strong> </div>
					<?php if(!empty($cats_menu_sidebar[$cat_id]['children'])):?>
						<?php foreach($cats_menu_sidebar[$cat_id]['children'] as $key => $value):?>
							<ul id="magicat">
								<li class="first level0-inactive level0 inactive"><span class="magicat-cat"><a href="/category/<?php echo $key?>"><span><?php echo $value?></span></a></span></li>
							</ul>
						<?php endforeach;?>
					<?php endif;?>
				</div>
			</div>
			<!--End Magic Category Block-->
		</div>
	</div>
	<div style="display: none;" id="back-top"> <a href="#"><img alt="" src="/images/backtop.gif"/></a> </div>
</div>
