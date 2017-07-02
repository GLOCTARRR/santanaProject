<ul class="menu">
	<li><a href="<?php echo FULL_BASE_URL?>">Главная</a></li>
	<?php if($main_menu):?>
		<?php foreach($main_menu as $item_menu):?>
			<li><a href="/page/<?php echo $item_menu['Page']['alias']?>"><?php echo $item_menu['Page']['title']?></a></li>
		<?php endforeach; ?>

	<?php endif;?>
</ul>
