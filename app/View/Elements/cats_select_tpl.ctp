<option <?php if($category_id == $category['Category']['id']) echo 'selected'?> value = "<?php echo $category['Category']['id']?>"><?php echo $tab?><?php echo $category['Category']['title']?></option>

<?php if($category['children']):?>

	<?php echo  $this->_catsSelect($category['children'], $category_id, $tab.'-');?>
<?php endif; ?>

