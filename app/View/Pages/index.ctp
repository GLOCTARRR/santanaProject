<!--START OF MAIN CONTENT-->
<div class="main-container col1-layout">
	<div class="main">
		<div class="col-main">
			<div id="messages_product_view"></div>
			<div class="product-view">
				<div class="product-essential">
						<!--Product Title-->
						<div class="product-name">
							<h1><?php echo $page['Page']['title'];?></h1>
						</div>

						<div class="content">
							<?php echo $page['Page']['body'];?>

							<?php //debug($this->request->pass[])?>
							<?php echo $this->Session->flash() ?>
							<?php echo $page_alias == 'contacts' ? $this->element('contact_mail') : ''?>
						</div>
					<div class="clearer"></div>
			</div>
		</div>
	</div>
	<div style="display: none;" id="back-top"> <a href="#"><img alt="" src="images/backtop.gif" /></a> </div>
</div>
<!--END OF MAIN CONTENT-->
