<div class="main-container col2-left-layout">
	<div class="main">
		<div class="col-main">
			<!--Category Title-->
			<div class="page-title category-title">
				<h1>Womens</h1>
			</div>
			<!--Category Image-->
			<div class="category-products">
				<h1>Список страниц</h1>
				<?php if($pages):?>
					<ul>
						<?php foreach($pages as $page):?>
							<li><?php echo $page['Page']['title']?> | <a href="/admin/pages/edit/<? echo $page['Page']['id']?>">Изменить</a> | <a><?php $this->Form->postLink('Удалить', "/admin/pages/delete/{$page['Page']['id']}", 'Удалить страницу')?>Удалить</a></li>
						<?php endforeach;?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
		<?php echo $this->Element('menu_sidebar')?>
	</div>
	<div style="display: none;" id="back-top"> <a href="#"><img alt="" src="/images/backtop.gif"/></a> </div>
</div>

