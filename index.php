<!doctype html>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="robots" content="all" />
<meta name="description" content="<?php readfile("./sources/description.html") ?>" />
<meta name="keywords" content="<?php readfile("./sources/keywords.html") ?>" />

<title><?php readfile("./sources/website_title.html") ?>
</title>

<link rel="icon" href="./images/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="./images/iui-logo-touch-icon.png" />

<?php 

	require_once("./php/manager.php");

?>

<?php

	function url_get_param($url, $name) {
	    parse_str(parse_url($url, PHP_URL_QUERY), $vars);
	    return isset($vars[$name]) ? htmlspecialchars($vars[$name]) : null;
	}

	$category_id = url_get_param($_SERVER['REQUEST_URI'], 'cid');
	
	if(!is_numeric($category_id) || !strlen($category_id)){
		$category_id = '5716';
	}

	$cat_images = get_category_images($category_id);

	$bg_image = get_cat_image($cat_images, 'filename', 'bg.jpg');	
	$bg_url = get_image_url($bg_image);

	$watermark = get_cat_image($cat_images, 'filename', 'watermark.png');
	$watermark_url = get_image_url($watermark);

 ?>	 

<?php

	if (is_file('/usr/local/lib/php/google_fonts.php'))
	{

	    require_once('/usr/local/lib/php/google_fonts.php');
	
	}

?>

<link href="./css/normalize.min.css" rel="stylesheet" type="text/css" />
<link href="./css/html5bp.css" rel="stylesheet" type="text/css" />
<link href="./css/main.css" rel="stylesheet" type="text/css" />
<link href="./css/ezedit.css" rel="stylesheet" type="text/css" />

<script src="./js/vendor/modernizr-2.6.1.min.js"></script>
<script src="./js/vendor/jquery-1.8.2.min.js"></script>
<script src="./js/plugins.js"></script>



<style>
	
.bg{
	
	position: absolute;
	left: 0;
	top: 0;
	z-index: -1;
	width: 100%;
	height: 100%;
	background-image: url(<?php echo $bg_url ?>);
	background-repeat: no-repeat;
	background-position: center center;
	background-attachment: fixed;

}

.content{

	background-image: url(<?php echo $watermark_url ?>);
	background-repeat: no-repeat;
	background-position: 476px  213px;

}

#loader{
	
	position: absolute;
	left: 0;
	top: 0;
	z-index: -2;
	width: 100%;
	height: 100%;
	
}

</style>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

</head>

<body>

<div class="content-wrapper">
	<div class="content">
		
		<?php //createContact($category_id, 'contact'); ?>

		<?php createContent($cat_images); ?>

	</div>
</div>

<div class="footer-wrapper">	
	
	<div class="footer">

		<div class="info">
			
			<?php createPhone($cat_images); ?>

			<?php createMap($cat_images); ?>

		</div>

		<div class="copy"> 
              
             <?php createCopy($cat_images); ?>

        </div>
		
	</div>

</div>


<div class="bg">
	
</div>

<div id="loader">
	
</div>

<script>

(function(){

	var opts = {
		lines: 11, // The number of lines to draw
		length: 21, // The length of each line
		width: 6, // The line thickness
		radius: 31, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#666', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: 'auto', // Top position relative to parent in px
		left: 'auto' // Left position relative to parent in px
	};

	var target = document.getElementById('loader');
	var spinner = new Spinner(opts).spin(target);

	jQuery(document).ready(function($) {
		$('.bg').hide();
		$('.content-wrapper').hide();
		$('.footer-wrapper').hide();
	});
	
	
	jQuery(window).load(function() {
		
		$('body').imagesLoaded(function(){
			$('.bg').fadeIn({'easing':'easeInOutSine', 'duration':1000});
			$('.footer-wrapper').fadeIn({'easing':'easeInOutSine', 'duration':1000});
			$('.content-wrapper').delay(500).fadeIn({'easing':'easeInOutSine', 'duration':1000});
			$('#loader').fadeOut({'easing':'easeInOutSine', 'duration':500, 'complete':function(){
				spinner.stop();
			}});
		});
	});
	


})();

</script>

</body>
</html>