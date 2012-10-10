<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo Input::server('APP_NAME'); ?></title>
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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo Input::server('GTRID'); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="logo"></div>
            <div style="margin-left:108px;margin-top:-24px;font-family:serif"><h2><?php echo Input::server('APP_SUFFIX'); ?></h2></div>
		</div>
	</div>
	<div class="container">

<?php

$cnt = 1;
foreach ($tweets as $tweet) {
    if (($cnt % 4) == 1) {
        echo "<div class=\"row thumbnails\">";
    }

    echo "<div class=\"span3\"><div class=\"thumbnail\" style=\"height:300px\"><a alt=\"{$tweet->text}\" href=\"{$tweet->entities->urls[0]->expanded_url}\" target=\"_blank\"><img src=\"{$tweet->entities->urls[0]->expanded_url}/media?size=m\" /></a><p>{$tweet->text}</p></div></div>";

    if (($cnt % 4) == 0) {
        echo "</div>\n";
    }
    $cnt++;
}

if (($cnt % 4) != 1) {
    echo "</div>";
}

?>
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
