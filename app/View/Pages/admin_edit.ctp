<h3>Редакитрвоание страницы <?php echo $page['Page']['title']?></h3>
<?php
echo $this->Form->create('Page');
echo $this->Form->input('title');
echo $this->Form->input('alias');
echo $this->Form->input('body', ['id' => 'editor']);
echo $this->Form->end('save');
?>
<script>
	CKEDITOR.replace('editor');
</script>
