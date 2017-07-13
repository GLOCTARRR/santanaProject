<h3>Редакитрвоание продуктов</h3>
<?php
echo $this->Form->create('Product');
//echo $this->Form->input('category_id');
?>

<div class = "input select">
	<label for="ProductCategoryId">Category</label>
	<select id = "ProductCategoryId" name = data[Product][category_id]>
		<?php echo $categories;?>
	</select>
</div>

<?php
echo $this->Form->input('title');
echo $this->Form->input('body');
echo $this->Form->input('price');
echo $this->Form->input('is_new', [	'type' => 'checkbox', 'label' => 'Новинка']);
echo $this->Form->end('save');
?>
