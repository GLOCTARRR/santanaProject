<option <?php if($product['Category']['id'] == $category['Category']['id']) echo 'selected'?> value = "<?php echo $category['Category']['id']?>"><?php echo $tab?><?php echo $category['Category']['title']?></option>

<?php if($category['children']):?>

	<?php echo  $this->_catsSelect($category['children'], $product, $tab.'-');?>
<?php endif; ?>

