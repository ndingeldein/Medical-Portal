<?php 

error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (is_file('/home/webgalle/public_html/modules/ezergallery/config.php'))
{
	require('/home/webgalle/public_html/modules/ezergallery/config.php');
	require('/home/webgalle/public_html/modules/ezergallery/neil/functions.php');
} else{
	require('../modules/ezergallery/config.php');
	require('../modules/ezergallery/neil/functions.php');
}

function createContact($category_images){

	$image = get_cat_image($category_images, 'filename', 'contact.png');
	$str = $image['linktext01'];
	$image_url = get_image_url($image);

	$url = $image['link01'];
	$target = get_target($image, '_blank');
	
	echo '<a href="'.$url.'" target="'.$target.'">
			<div id="contact" class="navitem-bg"

	style="background-image:url('.$image_url.');">

	<span>'.$str.'</span>

	</div></a>';

}

function createContent($category_images){

	$image = get_cat_image($category_images, 'filename', 'logo.png');
	$image_url = get_image_url($image);

	$url = $image['link01'];
	$target = get_target($image, '_self');
	
	//echo '<a class="logo" href="'.$url.'" target="'.$target.'">';

	if(strlen ($image['field01'] )){		

		echo '<p class="logo">'.$image['field01']."</p>";

	}else{

		echo '<img id="logo" src="'.$image_url.'">';

	}

	echo '</a>';


	echo '<hr class="content-divider">';	

	echo '<p class="about ezedit_body">';

	if (file_exists('./sources/about.html')) {

	    include('./sources/about.html');

	    echo '<hr class="content-divider">';

	}

	echo '</p>';	
	

	if(strlen ($image['field06'] ) > 8){		

		echo '<p class="blurb">'.$image['field06'].'</p>';

	}

	echo '<a id="button" class="gradient" href="'.$url.'" target="'.$target.'">'.$image['linktext01'].'</a>';

}

function createPhone($category_images){

	$image = get_cat_image($category_images, 'filename', 'phone.png');
	$str = $image['field01'];
	$image_url = get_image_url($image);

	echo '<div id="phone" class="navitem-bg"

	style="background-image:url('.$image_url.');">

	<span>'.$str.'</span>

	</div>';
}

function createMap($category_images){

	$image = get_cat_image($category_images, 'filename', 'map.png');
	$str = $image['field01'];
	$image_url = get_image_url($image);

	$url = $image['link01'];
	$target = get_target($image, '_blank');
	
	echo '<a href="'.$url.'" target="'.$target.'">
			<div id="map" class="navitem-bg"

	style="background-image:url('.$image_url.');">

	<span>'.$str.'</span>

	</div></a>';
}

function createCopy($category_images){

	$image = get_cat_image($category_images, 'filename', 'copy.png');
	$str = '&copy'.(date("Y")).'&nbsp;'.$image['field01'];
	$image_url = get_image_url($image);

	echo $str.' | All rights reserved. | <a href="http://www.modiphy.com" target="_blank" class="modiphy"><img src="'.$image_url.'" width="19" height="19" border="0" style="margin-bottom:3px;"></a>';

}
 


?>