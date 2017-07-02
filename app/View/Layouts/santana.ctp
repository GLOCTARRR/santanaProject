<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<?php
		echo $this->Html->css(['http://fonts.googleapis.com/css?family=Telex', 'styles', 'skin', 'cloud-zoom', 'light_box', 'mix', 'banner', 'magicat']);
	?>

	<?php
		echo $this->Html->script(['prototype', 'jquery-1.6.1.min', 'common', 'menu', 'banner_pack', 'light_box', 'cloud-zoom.1.0.2', 'jquery.easing.1.3', 'jquery.jcarousel.min', 'jquery.mix'],
			['block' => 'scriptBottom'])
	?>


</head>
<body id="bg_color" class=" cms-index-index cms-home">
<!--START OF WRAPPER-->
<div class="wrapper">
	<div class="page">

		<!--START OF HEADER-->
		<div class="header-container">
			<div class="quick-access">

				<!--Start Toplinks-->
				<ul class="links">
					<li class=" last"><a href="#" title="Log In">Log In</a></li>
				</ul>
				<!--End Toplinks-->

				<!--Start Top Menu-->
				<?php echo $this->element('main_menu')?>
				<!--End Top Menu-->

			</div>
			<!--Start Header Content-->
			<div class="header">
				<ul id="logo">
					<!--Left-->
					<li class="head-container"> <span>{</span>
						<h2 class="classy">Free shipping over $9.99</h2>
						<span>}</span>
						<p class="top-welcome-msg">Default welcome msg!</p>
					</li>
					<!--Left-->
					<!--Center Logo-->
					<li class="logo-box">
						<h1 class="logo"><strong>Santana Commerce</strong><a href="#" title="Santana Commerce" class="logo"><img src="/images/logo.png" alt="Santana Commerce" /></a></h1>
					</li>
					<!--Center Logo-->

					<!--Right-->
					<li class="head-container"> <span>{</span>
						<h2 class="classy">Call us - +1 999 999 9999</h2>
						<span>}</span>
						<div id="search-bar">
							<div class="top-bar">
								<form id="search_mini_form" action="/products/search/">
									<div class="form-search">
										<input
											onfocus="if(this.value=='Search') {this.value=''};" onblur="if(this.value=='') {this.value='Search'};"
											id="search" name="q" value="Search" class="input-text" type="text" />
										<button type="submit" title="Go" class="button">Go</button>
									</div>
								</form>
							</div>
						</div>
					</li>
					<!--Right-->
				</ul>
				<!--Start of Navigation-->
				<div class="nav-container">
					<?php echo $this->element('menu')?>
				</div>
				<!--End of Navigation-->
			</div>
			<!--End Header Content-->
		</div>
		<!--END OF HEADER-->

		<!--START OF MAIN CONTENT-->

				<?php echo $this->fetch('content')?>

		<!--END OF MAIN CONTENT-->

		<!--START OF FOOTER-->
		<div class="footer-container">
			<div class="footer">
				<div class="f-fix">
					<div class="frame">.</div>
					<!--Shipping Block-->
					<div class="free-shipping">Enjoy free shipping <span>on all orders as our holiday gift for you!</span></div>
					<!--Shipping Block-->

					<!--Newsletter-->
					<form method="post" id="newsletter-validate-detail" action="">
						<div class="form-subscribe">
							<div class="form-subscribe-header">Sign up for newsletter</div>
							<div class="input-box">
								<input
									onfocus="if(this.value=='Enter email address') {this.value=''};" onblur="if(this.value=='') {this.value='Enter email address'};"
									value="Enter email address" name="email" id="newsletter" title="Sign up for newsletter" class="input-text required-entry validate-email" type="text" />
								<button type="submit" title="Submit" class="button"><span>Submit</span></button>
							</div>
						</div>
					</form>
					<!--Newsletter-->

				</div>
				<div class="f-left bottom_links">
				</div>
			</div>
			<address>
				© 2012 Santana Demo Store. All Rights Reserved. Design &amp; Develop by <a href="http://www.magicdesignlabs.com/">MagicDesignLabs</a>
			</address>
		</div>
		<!--END OF FOOTER-->
	</div>
</div>

<!--END OF WRAPPER-->
<?php echo $this->fetch('scriptBottom');?>
</body>
</html>
