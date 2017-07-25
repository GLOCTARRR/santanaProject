<div class="col-left sidebar">
	<!--Start Magic Category Block-->
	<div class="magicat-container">
		<?php if(!empty($cat_id)):?>
			<div class="block">
				<div class="block-title cat_heading"> <strong><span>Управление товарами</span></strong> </div>
				<ul id="magicat">
					<li class="first level0-inactive level0 inactive"><span class="magicat-cat"><a href="/admin/product/add/<?php echo $cat_id?>"><span>Добавления товара</span></a></span></li>
				</ul>
			</div>
		<?php endif;?>
		<div class="block">
			<div class="block-title cat_heading"> <strong><span>Управление страницами</span></strong> </div>
			<ul id="magicat">
				<li><span class="magicat-cat"><a href="/admin/page/"><span>Список страниц</span></a></span></li>
				<li><span class="magicat-cat"><a href="/admin/page/add/"><span>Добавить страницу</span></a></span></li>
			</ul>
		</div>
	</div>
	<!--End Magic Category Block-->
</div>
