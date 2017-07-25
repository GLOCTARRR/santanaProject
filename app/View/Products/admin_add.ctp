<h3>Добавление товара</h3>
<?php
echo $this->Form->create('Product');
?>

<div class = "input select">
	<label for="ProductCategoryId">Category</label>
	<select id = "ProductCategoryId" name = data[Product][category_id]>
		<?php echo $categories;?>
	</select>
</div>

<?php
echo $this->Form->input('title');
echo $this->Form->input('body', ['id' => 'editor']);
echo $this->Form->input('price', ['value' => 0]);
echo $this->Form->input('is_new', [	'type' => 'checkbox', 'label' => 'Новинка']);
echo $this->Form->end('save');
?>
<script>
	CKEDITOR.replace('editor');
</script>
