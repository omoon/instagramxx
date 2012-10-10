<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Instagramen</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		#logo{
			display: block;
            background-image: url(<?php echo Asset::get_file('logo.png', 'img'); ?>);
			width: 108px;
			height: 45px;
			position: relative;
			top: 15px;
		}
		#header{
			background-image: url();
			height: 75px;
			width: 100%;
			margin-bottom: 20px;
		}
		#header .row{
			width: 940px;
			margin: 0 auto;
		}
		a{
			color: #883ced;
		}
		a:hover{
			color: #af4cf0;
		}
		.btn.btn-primary{color:#ffffff!important;background-color:#883ced;background-repeat:repeat-x;background-image:-khtml-gradient(linear, left top, left bottom, from(#fd6ef7), to(#883ced));background-image:-moz-linear-gradient(top, #fd6ef7, #883ced);background-image:-ms-linear-gradient(top, #fd6ef7, #883ced);background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fd6ef7), color-stop(100%, #883ced));background-image:-webkit-linear-gradient(top, #fd6ef7, #883ced);background-image:-o-linear-gradient(top, #fd6ef7, #883ced);background-image:linear-gradient(top, #fd6ef7, #883ced);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fd6ef7', endColorstr='#883ced', GradientType=0);text-shadow:0 -1px 0 rgba(0, 0, 0, 0.25);border-color:#883ced #883ced #003f81;border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		body { margin: 0px 0px 40px 0px; }
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="logo"></div>
            <div style="margin-left:108px;margin-top:-24px;font-family:serif"><h2>en</h2></div>
		</div>
	</div>
	<div class="container">

<?php

foreach ($tweets as $tweet) {
    echo "<img src=\"{$tweet}\" />";
}

?>
		<div class="hero-unit">
			<h1>Welcome!</h1>
			<p>You have successfully installed the FuelPHP Framework.</p>
			<p><a class="btn btn-primary btn-large" href="http://docs.fuelphp.com">Read the Docs</a></p>
		</div>
		<div class="row">
			<div class="span4">
				<h2>Get Started</h2>
				<p>The controller generating this page is found at <code>APPPATH/classes/controller/welcome.php</code>.</p>
				<p>This view can be found at <code>APPPATH/views/welcome/index.php</code>.</p>
				<p>You can modify these files to get your application started quickly.</p>
			</div>
			<div class="span4">
				<h2>Learn</h2>
				<p>The best way to learn FuelPHP is reading through the <a href="http://docs.fuelphp.com">Documentation</a>.</p>
				<p>Another good resource is the <a href="http://fuelphp.com/forums">Forums</a>.  They are fairly active, and you can usually get a response quickly.</p>
			</div>
			<div class="span4">
				<h2>Contribute</h2>
				<p>FuelPHP wouldn't exist without awesome contributions from the community.  Use the links below to get contributing.</p>
				<ul>
					<li><a href="http://docs.fuelphp.com/general/coding_standards.html">Coding Standards</a></li>
					<li><a href="http://github.com/fuel/fuel">GitHub Respository</a></li>
					<li><a href="http://fuelphp.com/contribute/issue-tracker">Issue Tracker</a></li>
				</ul>
			</div>
		</div>
		<hr/>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
