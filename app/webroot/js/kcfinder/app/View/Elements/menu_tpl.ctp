<li>
	<a href="/category/<?php echo $category['Category']['id'] ?>"><?php echo $category['Category']['title'] ?></a>
	<?php if( $category['children'] ) : ?>
	<ul>
		<?php echo $this->_catMenuHtml($category['children']); ?>
	</ul>
	<?php endif; ?>
</li>