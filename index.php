<?php
/*
Plugin Name: Simple Slideshow Builder
Plugin URI: http://
Description: A simple slideshow that uses a short code to easily place onto your website! 
Version: 0.1
Author: Logan Wheeler
Author URI: http://profiles.wordpress.org/loganw
License: :)
*/


register_activation_hook();
register_deactivation_hook();
register_uninstall_hook();
add_action('admin_menu', 'add_new_pages');

add_option('color', '');
add_option('slide_delay', '');
add_option('upload_image', '');
add_option('upload_image2', '');
add_option('upload_image3', '');
add_option('upload_image4', '');
add_option('upload_image_content', '');
add_option('upload_image_content2', '');
add_option('upload_image_content3', '');
add_option('upload_image_content4', '');
add_option('simple_option', '');
add_option('add_div', '');
add_option('animate', '');
add_option('content_animate', '');
add_option('height', '');
add_option('width', '');
add_option('font-size', '');

add_action('admin_enqueue_scripts', 'my_admin_scripts');
 
function my_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'SimpleSlideshowBuilder') {
        wp_enqueue_media();
        wp_register_script('my-admin-js', WP_PLUGIN_URL.'/simple-slideshow-builder/my-admin.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
    }
}


function add_new_pages() {

	add_menu_page('Simple Slideshow Options', 'Simple Slideshow', 5, 'SimpleSlideshowBuilder', 'simple_slideshow_builder', plugin_dir_url( __FILE__ ) . 'images/icon.png');

}


function simple_slideshow_builder() { ?>

<div class="admin_content" style="width:95%;margin-left:15px;">
<?php echo "<h1>" . __( 'Simple Slideshow Builder') . "</h1>"; ?>
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>

<div class="translucent_cover" id="overlay1" style="visibility: hidden;">
</div>
<div class="top_block1" id="top_block1">
<h1>Preview</h1>
<br>
<div class="slider">
<center>
				<?php if (get_option('upload_image') != '') { ?>
     <div class="simple_slide_slides">

        <input type="radio" id="slide1" name="slide" checked>
 <label for="slide1" id="dot1" ></label> 
<div class="simple_slider">
 <img src="<?php echo get_option('upload_image'); ?>"<?php echo get_option('upload_image'); ?>"Panel 1">
   <?php if (get_option('upload_image_content') != '') { ?>
<div class="simple_slider_content"><?php echo get_option('upload_image_content'); ?></div>  <? } else { }?></div>

    </div>
                <? } else { }?>
<?php if (get_option('upload_image2') != '') { ?>

    <div class="simple_slide_slides">
        <input type="radio" id="slide2" name="slide" >
 <label for="slide2" id="dot2" ></label> 
        <div class="simple_slider">
         <img src="<?php echo get_option('upload_image2'); ?>"Panel 2">
  <?php if (get_option('upload_image_content2') != '') { ?>

<div class="simple_slider_content"><?php echo get_option('upload_image_content2'); ?></div> <? } else { }?>
</div>

    </div>

    <? } else { }?>
<?php if (get_option('upload_image3') != '') { ?>

    <div class="simple_slide_slides">

        <input type="radio" id="slide3" name="slide" >
 <label for="slide3" id="dot3" ></label> 
        <div class="simple_slider">
         <img src="<?php echo get_option('upload_image3'); ?>"Panel 3">
<?php if (get_option('upload_image_content3') != '') { ?>
<div class="simple_slider_content"><?php echo get_option('upload_image_content3'); ?></div><? } else { }?></div>

    </div>

    <? } else { }?>
<?php if (get_option('upload_image4') != '') { ?>

    <div class="simple_slide_slides">
 
        <input type="radio" id="slide4" name="slide" >
 <label for="slide4" id="dot4" ></label> 
<div class="simple_slider">
        <img src="<?php echo get_option('upload_image4'); ?>"Panel 4">
<?php if (get_option('upload_image_content4') != '') { ?>
<div class="simple_slider_content"><?php echo get_option('upload_image_content4'); ?></div><? } else { }?></div>
<center>
    </div>

 <? } else { }?>
</div>​
<div align="right">

<input class="blue_button" onclick="close_pop()" type="button" value="Close" />
</div></div>





<style>

#overlay1 {
z-index:9999999999;
background-color:black;
height:100%;
width:100%;
position:fixed;
top:0px;
left:0px;
opacity:0.5;
}


.top_block1
{
border:solid 2px yellow;
z-index:99999999999;
color:white;
position: fixed;
top: 0%;
right: -200%;
 //adjust as per need
width: 100%; //adjust as per need
z-index: 1;
background-color:white;
padding:25px;
transition:all 0.4s;
visiblity:hidden;
}

ul.tabs
{
    padding: 7px 0;
    font-size: 0;
    margin:0;
    list-style-type: none;
    text-align: left; /*set to left, center, or right to align the tabs as desired*/
}
        
ul.tabs li
{
    display: inline;
    margin: 0;
    margin-right:3px; /*distance between tabs*/
}
        
ul.tabs li a
{
    font: normal 12px Verdana;
    text-decoration: none;
    position: relative;
    z-index: 1;
    padding: 7px 16px;
    border: 1px solid #CCC;
    border-bottom-color:#B7B7B7;
    color: #000;
    background-color:#<?php echo get_option('color'); ?>;
    border-radius: 2px 2px 0 0;
    outline:none;
    cursor:pointer;
}

ul.tabs li a input
{
    font: normal 12px Verdana;
    background-color:#<?php echo get_option('color'); ?>;
    border:solid 2px #<?php echo get_option('color'); ?>;
    cursor:pointer;
}
        
ul.tabs li a:visited
{
    color: #000;
}
        
ul.tabs li a:hover
{
    border: 1px solid #B7B7B7;
}
        
ul.tabs li.selected a
{
    /*selected tab style */
    position: relative;
    top: 0px;
    font-weight:bold;
    background: white;
    border: 1px solid #B7B7B7;
    border-bottom-color: white;
}
        
        
ul.tabs li.selected a:hover
{
    /*selected tab style */
    text-decoration: none;
   background-color:white;
}
        
div.tabcontent
{
    display: block;
}

div.tabcontents
{
    background-color:#FFF;
   
}


.ECLIPSE
{
display:block;
font-family: 'Alice', serif;
border-bottom:solid 1px grey;
}

.HEROES
{
height:100px;
width:100px;
border:solid 2px #<?php echo get_option('color'); ?>;
}

</style>

<link href='http://fonts.googleapis.com/css?family=Alice' rel='stylesheet' type='text/css'>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="upload_image,upload_image2,upload_image3,upload_image4,upload_image_content,upload_image_content2,upload_image_content3,upload_image_content4,height,width,color,animate,content_animate,slide_delay,simple_option,font-size,left,top" onsubmit="return false;"/>

 <div class="tabcontentss" style="float:left;width:30%;">
<h2>Images</h2>
<ul class="tabs" > <li><a href="#" rel="image1">1</a></li> <li><a href="#" rel="image2">2nd Image</a></li> <li><a href="#" rel="image3">3rd Image</a></li><li><a href="#" rel="image4">4th Image</a></li></ul>


<div id="image1" class="tabcontent" > 
<img class="HEROES" src="<?php echo get_option('upload_image'); ?>">
<br>
  <input id="upload_image_button" type="button" value="Upload" /><input id="upload_image" type="text" name="upload_image" value="<?php echo get_option('upload_image'); ?>" />
<h3>Content </h3>
<textarea style="width:100%;" name="upload_image_content" id="upload_image_content"  /><?php echo get_option('upload_image_content'); ?></textarea>
</div>


<div id="image2" class="tabcontent" > 
<img class="HEROES" src="<?php echo get_option('upload_image2'); ?>">
<br>
   <input id="upload_image_button2" type="button" value="Upload" /><input id="upload_image2" type="text" name="upload_image2" value="<?php echo get_option('upload_image2'); ?>" />
<h3> Content </h3>
<textarea style="width:100%;" name="upload_image_content2" id="upload_image_content2"  /><?php echo get_option('upload_image_content2'); ?></textarea>

</div>

<div id="image3" class="tabcontent" > 
<img class="HEROES" src="<?php echo get_option('upload_image3'); ?>">
<br>
   <input id="upload_image_button3" type="button" value="Upload" /><input id="upload_image3" type="text" name="upload_image3" value="<?php echo get_option('upload_image3'); ?>" />
<h3> Content </h3>
<textarea style="width:100%;" name="upload_image_content3" id="upload_image_content3"  /><?php echo get_option('upload_image_content3'); ?></textarea>
</div>

<div id="image4" class="tabcontent" > 
<img class="HEROES" src="<?php echo get_option('upload_image4'); ?>">
<br>
   <input id="upload_image_button4" type="button" value="Upload" /><input id="upload_image4" type="text" name="upload_image4" value="<?php echo get_option('upload_image4'); ?>" />
<h3> Content </h3>
<textarea style="width:100%;" name="upload_image_content4" id="upload_image_content4"  /><?php echo get_option('upload_image_content4'); ?></textarea>
</div>


</div>


 <div class="tabcontents" style="float:right;width:30%;" >
<h2>Settings</h2>
<ul class="tabs"> <li><a href="#" rel="view2">Slideshow Settings</a></li> <li><a href="#" rel="view3">How To:</a></li><li onclick="pop()"><a>Preview</a></li> <li><a><input type="submit" name="Submit" value="<?php _e('Save') ?>" /></a></li></ul>

<div id="view2" class="tabcontent">

<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>


<h3>Layout</h3> <select name="simple_option" id="simple_option">
        <option style="background-image:url(/wp-content/plugins/simple-slideshow-builder/images/bottom.png);background-repeat:no-repeat;background-position:center left;height:25px;text-align:right;" name="default" value="/wp-content/plugins/simple-slideshow-builder/css/default.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/default.css") { echo ' selected'; } ?>>Bottom</option>
        <option style="background-image:url(/wp-content/plugins/simple-slideshow-builder/images/left.png);background-repeat:no-repeat;background-position:center left;height:25px;text-align:right;" name="dots-left" value="/wp-content/plugins/simple-slideshow-builder/css/dots-left.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/dots-left.css") { echo ' selected'; } ?>>Left</option>
        <option style="background-image:url(/wp-content/plugins/simple-slideshow-builder/images/top.png);background-repeat:no-repeat;background-position:center left;height:25px;text-align:right;" name="nav-top" value="/wp-content/plugins/simple-slideshow-builder/css/nav-top.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/nav-top.css") { echo ' selected'; } ?>>Top</option>
        <option style="background-image:url(/wp-content/plugins/simple-slideshow-builder/images/right.png);background-repeat:no-repeat;background-position:center left;height:25px;text-align:right;" name="dots-right" value="/wp-content/plugins/simple-slideshow-builder/css/dots-right.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/dots-right.css") { echo ' selected'; } ?>>Right</option>
        </select>




            <h3>Height</h3> <input type="text" name="height" id="height" size="3" value="<?php echo get_option('height'); ?>" />	

<h3>Width</h3> <input type="text" name="width" id="width" size="3" value="<?php echo get_option('width'); ?>" />	

<h3>Animation:</h3><select name="animate" id="animate">
       <option name="none" value="none"<?php if(get_option('content_animate') == "none") { echo ' selected'; } ?>>None</option>
        <option name="Slide" value="slide"<?php if(get_option('animate') == "slide") { echo ' selected'; } ?>>Slide In Left</option>
       <option name="slideUp" value="slideUp"<?php if(get_option('animate') == "slideUp") { echo ' selected'; } ?>>Slide In Up</option>
       <option name="bouncedown" value="bounceDown"<?php if(get_option('animate') == "bounceDown") { echo ' selected'; } ?>>Bounce In Down</option>
       <option name="bounceleft" value="bounceLeft"<?php if(get_option('animate') == "bounceLeft") { echo ' selected'; } ?>>Bounce In Left</option>
       <option name="bounceright" value="bounceRight"<?php if(get_option('animate') == "bounceRight") { echo ' selected'; } ?>>Bounce In Right</option>
        </select>
<h3>Animation Transition</h3> <input type="text" size="2" name="slide_delay" id="slide_delay" value="<?php echo get_option('slide_delay'); ?>" /> Seconds





            <h3>Font Size</h3> <input type="text" name="font-size" id="font-size" size="3" value="<?php echo get_option('font-size'); ?>" />px


<h3>Background Color</h3>
<script src="/wp-content/plugins/Simple-Slideshow-Builder/js/jscolor.js"></script> 

<input class="color {onImmediateChange:'updateInfo(this);}" type="text" id="color" name="color" value="<?php echo get_option('color'); ?>"/>
<br>

 </div> <div id="view3" class="tabcontent"> <h3> Place in posts and/or pages :) </h3><textarea>[simplepic]</textarea>

<h3>Place in your template files</h3><textarea>&lt;?php echo do_shortcode('[simplepic]'); ?&gt; </textarea></div> </div>



<style>

#doodle-Box {
position:absolute;
width:100px;
height:100px;
}

#doodle {
background-color:purple;
height:50px;
width:50px;
position:;
top:0px;
left:0px;
   animation: <?php echo get_option('animate'); ?> <?php echo get_option('slide_delay'); ?>s  infinite;
}


.slider {
    height: <?php echo get_option('height'); ?>px;
    width: <?php echo get_option('width'); ?>px;
}
.simple_slide_slides {
    height: <?php echo get_option('height'); ?>px;
    width: <?php echo get_option('width'); ?>px;
}

    .simple_slide_slides label:before {  
        background-color: #<?php echo get_option('color'); ?>;  
    }  


.simple_slider_content {
    width: <?php echo get_option('width'); ?>px;
    background-color:#<?php echo get_option('color'); ?>;
    font-size:<?php echo get_option('font-size'); ?>px;
}


.simple_slider {
    height: <?php echo get_option('height'); ?>px;
    width: <?php echo get_option('width'); ?>px;
    border: solid 2px #<?php echo get_option('color'); ?>;
    background-color:#<?php echo get_option('color'); ?>;
}

.simple_slider img {
    height: <?php echo get_option('height'); ?>px;
    width: <?php echo get_option('width'); ?>px;
}

.simple_slide_slides input:checked ~ .simple_slider{
    animation: <?php echo get_option('animate'); ?> <?php echo get_option('slide_delay'); ?>s;
}

    .Simple_Slider_Button {
        cursor:pointer;
        
        background-color:#<?php echo get_option('color'); ?>;
        
        -moz-border-radius:8px;
        -webkit-border-radius:8px;
        border-radius:8px;
border:solid 0px #ffffff;
        
        display:inline-block;
        color:#ffffff;
        font-family:arial;
        font-size:18px;
        font-weight:bold;
        padding:13px 32px;
        text-decoration:none;
        
        text-shadow:0px 1px 0px #<?php echo get_option('color'); ?>;
        
    }




    .Simple_Slider_Button:active {
        position:relative;
        top:1px;
    }


@keyframes none
{

}

@keyframes slide
{
0% {margin-left:100%;}
25% {margin-left:0%;}
100%{margin-left:0%;}
}


@-o-keyframes slide
{
0% {margin-left:100%;}
25% {margin-left:0%;}
100%{margin-left:0%;}
}


@-moz-keyframes slide
{
0% {margin-left:100%;}
25% {margin-left:0%;}
100%{margin-left:0%;}
}


@-webkit-keyframes slide
{
0% {margin-left:100%;}
25% {margin-left:0%;}
100%{margin-left:0%;}
}


@keyframes slideUp
{
0% {margin-top:100%;}
25% {margin-top:0%;}
100%{margin-top:0%;}
}


@-o-keyframes slideUp
{
0% {margin-top:100%;}
25% {margin-top:0%;}
100%{margin-top:0%;}
}


@-moz-keyframes slideUp
{
0% {margin-top:100%;}
25% {margin-top:0%;}
100%{margin-top:0%;}
}


@-webkit-keyframes slideUp
{
0% {margin-top:100%;}
25% {margin-top:0%;}
100%{margin-top:0%;}
}


@keyframes fade 
{
0% {opacity: 1.0;}
90% {opacity:1.0;}
100% {opacity: 0.0;}
}

@-o-keyframes fade 
{
0% {opacity: 1.0;}
90% {opacity:1.0;}
100% {opacity: 0.0;}
}

@-moz-keyframes fade 
{
0% {opacity: 1.0;}
90% {opacity:1.0;}
100% {opacity: 0.0;}
}

@-webkit-keyframes fade 
{
0% {opacity: 1.0;}
90% {opacity:1.0;}
100% {opacity: 0.0;}
}


@keyframes bounceDown
{
0% {margin-top:-100%;}
10% {margin-top:0%;}
20% {margin-top:-5%;}
30% {margin-top:0%;}
100% {margin-top:0%;}
}

@-o-keyframes bounceDown
{
0% {margin-top:-100%;}
10% {margin-top:0%;}
20% {margin-top:-5%;}
30% {margin-top:0%;}
100% {margin-top:0%;}
}

@-moz-keyframes bounceDown
{
0% {margin-top:-100%;}
10% {margin-top:0%;}
20% {margin-top:-5%;}
30% {margin-top:0%;}
100% {margin-top:0%;}
}

@-webkit-keyframes bounceDown
{
0% {margin-top:-100%;}
10% {margin-top:0%;}
20% {margin-top:-5%;}
30% {margin-top:0%;}
100% {margin-top:0%;}
}


@keyframes bounceLeft
{
0% {margin-left:-100%;}
10%{margin-left:0%;}
20%{margin-left:-10%;}
30%{margin-left:0%}
100%{margin-left:0%;}
}

@-o-keyframes bounceLeft
{
0% {margin-left:-100%;}
10%{margin-left:0%;}
20%{margin-left:-10%;}
30%{margin-left:0%}
100%{margin-left:0%;}
}

@-moz-keyframes bounceLeft
{
0% {margin-left:-100%;}
10%{margin-left:0%;}
20%{margin-left:-10%;}
30%{margin-left:0%}
100%{margin-left:0%;}
}

@-webkit-keyframes bounceLeft
{
0% {margin-left:-100%;}
10%{margin-left:0%;}
20%{margin-left:-10%;}
30%{margin-left:0%}
100%{margin-left:0%;}
}


@keyframes bounceRight
{
0% {margin-left:100%;}
10%{margin-left:0%;}
20%{margin-left:10%;}
30%{margin-left:0%;}
100%{margin-left:0%;}
}


@-o-keyframes bounceRight
{
0% {margin-left:100%;}
10%{margin-left:0%;}
20%{margin-left:10%;}
30%{margin-left:0%;}
100%{margin-left:0%;}
}


@-moz-keyframes bounceRight
{
0% {margin-left:100%;}
10%{margin-left:0%;}
20%{margin-left:10%;}
30%{margin-left:0%;}
100%{margin-left:0%;}
}


@-webkit-keyframes bounceRight
{
0% {margin-left:100%;}
10%{margin-left:0%;}
20%{margin-left:10%;}
30%{margin-left:0%;}
100%{margin-left:0%;}
}
</style>
<center>


	</form>
</center>

<link rel="stylesheet" type="text/css" href="<?php echo get_option('simple_option'); ?>">
 
<?php } 



add_shortcode('simplepic', 'MP_dynmap_shortcode');
function MP_dynmap_shortcode() {
               ?>




<div style="display:none;visibility:hidden;height:0px;width:0px;overflow:none;">
<select name="simple_option" id="simple_option">
        <option name="default" value="/wp-content/plugins/simple-slideshow-builder/css/default.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/default.css") { echo ' selected'; } ?>>Default</option>
        <option name="dots-left" value="/wp-content/plugins/simple-slideshow-builder/css/dots-left.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/dots-left.css") { echo ' selected'; } ?>>Nav Left</option>
        <option name="nav-top" value="/wp-content/plugins/simple-slideshow-builder/css/nav-top.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/nav-top.css") { echo ' selected'; } ?>>Nav Top</option>
        <option name="dots-right" value="/wp-content/plugins/simple-slideshow-builder/css/dots-right.css"<?php if(get_option('simple_option') == "/wp-content/plugins/simple-slideshow-builder/css/dots-right.css") { echo ' selected'; } ?>>Nav Right</option>
        </select>
<img src="<?php echo get_option('upload_image'); ?>"><input id="upload_image" type="text" name="upload_image" value="<?php echo get_option('upload_image'); ?>" /><input id="upload_image_link" type="text" name="upload_image_link" value="<?php echo get_option('upload_image_link'); ?>" /><input type="text" name="upload_image_content" id="upload_image_content"  value="<?php echo get_option('upload_image_content'); ?>" /><img src="<?php echo get_option('upload_image2'); ?>"><input id="upload_image2" type="text" name="upload_image2" value="<?php echo get_option('upload_image2'); ?>" /><input id="upload_image_button2" class="Simple_Slider_Button" type="button" value="Upload Image" /><input id="upload_image_link2" type="text" name="upload_image_link2" value="<?php echo get_option('upload_image_link2'); ?>" /><input type="text" name="upload_image_content2" id="upload_image_content2"  value="<?php echo get_option('upload_image_content2'); ?>" /><img src="<?php echo get_option('upload_image3'); ?>"><input id="upload_image3" type="text" name="upload_image3" value="<?php echo get_option('upload_image3'); ?>" /><input id="upload_image_button3" class="Simple_Slider_Button" type="button" value="Upload Image" /><input id="upload_image_link3" type="text" name="upload_image_link3" value="<?php echo get_option('upload_image_link3'); ?>" /><input type="text" name="upload_image_content3" id="upload_image_content3"  value="<?php echo get_option('upload_image_content3'); ?>" /><img src="<?php echo get_option('upload_image4'); ?>"><input id="upload_image4" type="text" name="upload_image4" value="<?php echo get_option('upload_image4'); ?>" /><input id="upload_image_link4" type="text" name="upload_image_link4" value="<?php echo get_option('upload_image_link4'); ?>" /><input type="text" name="upload_image_content4" id="upload_image_content4" value="<?php echo get_option('upload_image_content4'); ?>" /><input type="text" name="slide_delay" id="slide_delay" value="<?php echo get_option('slide_delay'); ?>" /><input type="text" name="height" id="height" value="<?php echo get_option('height'); ?>" /><input type="text" name="width" id="width" value="<?php echo get_option('width'); ?>" /><select name="animate" id="animate">
       <option name="none" value="none"<?php if(get_option('content_animate') == "none") { echo ' selected'; } ?>>None</option>
        <option name="Slide" value="slide"<?php if(get_option('animate') == "slide") { echo ' selected'; } ?>>Slide</option>
        <option name="fade" value="fade"<?php if(get_option('animate') == "fade") { echo ' selected'; } ?>>Fade</option>
       <option name="slideUp" value="slideUp"<?php if(get_option('animate') == "slideUp") { echo ' selected'; } ?>>Slide Up</option>
        </select><select name="content_animate" id="content_animate">
        <option name="none" value="none"<?php if(get_option('content_animate') == "none") { echo ' selected'; } ?>>None</option>
        <option name="Slide" value="slide"<?php if(get_option('content_animate') == "slide") { echo ' selected'; } ?>>Slide</option>
        <option name="fade" value="fade"<?php if(get_option('content_animate') == "fade") { echo ' selected'; } ?>>Fade</option>
        </select><input  type="text" id="color" name="color" value="<?php echo get_option('color'); ?>"/>
<input type="text" name="font-size" id="font-size" size="18" value="<?php echo get_option('font-size'); ?>" />
</div>


<style>
.slider
{
height:<?php echo get_option('height');?>px;
width:<?php echo get_option('width');?>px
}

.simple_slide_slides
{
height:<?php echo get_option('height');?>px;
width:<?php echo get_option('width');?>px
}

.simple_slide_slides label:before
{
background-color:#<?php echo get_option('color');?>}

.simple_slider_content
{
width:<?php echo get_option('width');?>px;
background-color:#<?php echo get_option('color');?>;
font-size:<?php echo get_option('font-size');?>px
}

.simple_slider
{
height:<?php echo get_option('height');?>px;
width:<?php echo get_option('width');?>px;
border:solid 2px #<?php echo get_option('color');?>;
background-color:#<?php echo get_option('color');?>;
}

.simple_slider img
{
height:<?php echo get_option('height');?>px;
width:<?php echo get_option('width');?>px;
}

.simple_slide_slides input:checked ~ .simple_slider
{
animation:<?php echo get_option('animate');?> <?php echo get_option('slide_delay');?>s;

}

.Simple_Slider_Button
{
cursor:pointer;background-color:#<?php echo get_option('color');?>;
-moz-border-radius:8px;
-webkit-border-radius:8px;
border-radius:8px;border:solid 0 #fff;
display:inline-block;
color:#fff;
font-family:arial;
font-size:18px;
font-weight:bold;
padding:13px 32px;
text-decoration:none;
text-shadow:0 1px 0 #<?php echo get_option('color');?>

}

.Simple_Slider_Button:active
{
position:relative;
top:1px
}

@keyframes slide
{
0%{margin-right:100%}
25%{margin-right:0}
100%{margin-right:0}
}

@-o-keyframes slide
{
0%{margin-right:100%}
25%{margin-right:0}
100%{margin-right:0}
}

@-moz-keyframes slide
{
0%{margin-right:100%}
25%{margin-right:0}
100%{margin-right:0}
}

@-webkit-keyframes slide
{
0%{margin-right:100%}
25%{margin-right:0}
100%{margin-right:0}
}

@keyframes slideUp
{
0%{margin-top:100%}
25%{margin-top:0}
100%{margin-top:0}
}

@-o-keyframes slideUp
{
0%{margin-top:100%}
25%{margin-top:0}
100%{margin-top:0}
}

@-moz-keyframes slideUp{
0%{margin-top:100%}
25%{margin-top:0}
100%{margin-top:0}
}
@-webkit-keyframes slideUp{
0%{margin-top:100%}
25%{margin-top:0}
100%{margin-top:0}
}
@keyframes fade{
0%{opacity:1.0}
90%{opacity:1.0}
100%{opacity:.0}
}

@-o-keyframes fade{
0%{opacity:1.0}
90%{opacity:1.0}
100%{opacity:.0}
}

@-moz-keyframes fade{
0%{opacity:1.0}
90%{opacity:1.0}
100%{opacity:.0}
}

@-webkit-keyframes fade{
0%{opacity:1.0}
90%{opacity:1.0}
100%{opacity:.0}
}

@keyframes bounceDown{
0%{margin-top:-100%}
10%{margin-top:0}
20%{margin-top:-5%}
30%{margin-top:0}
100%{margin-top:0}
}

@-o-keyframes bounceDown{
0%{margin-top:-100%}
10%{margin-top:0}
20%{margin-top:-5%}
30%{margin-top:0}
100%{margin-top:0}
}

@-moz-keyframes bounceDown{
0%{margin-top:-100%}
10%{margin-top:0}
20%{margin-top:-5%}
30%{margin-top:0}
100%{margin-top:0}
}

@-webkit-keyframes bounceDown
{
0%{margin-top:-100%}
10%{margin-top:0}
20%{margin-top:-5%}
30%{margin-top:0}
100%{margin-top:0}
}

@keyframes bounceLeft
{
0%{margin-left:-100%}
10%{margin-left:0}
20%{margin-left:-10%}
30%{margin-left:0}
100%{margin-left:0}
}

@-p-keyframes bounceLeft
{
0%{margin-left:-100%}
10%{margin-left:0}
20%{margin-left:-10%}
30%{margin-left:0}
100%{margin-left:0}
}

@-moz-keyframes bounceLeft
{
0%{margin-left:-100%}
10%{margin-left:0}
20%{margin-left:-10%}
30%{margin-left:0}
100%{margin-left:0}
}

@-webkit-keyframes bounceLeft
{
0%{margin-left:-100%}
10%{margin-left:0}
20%{margin-left:-10%}
30%{margin-left:0}
100%{margin-left:0}
}

@keyframes bounceRight
{
0%{margin-left:100%}
10%{margin-left:0}
20%{margin-left:10%}
30%{margin-left:0}
100%{margin-left:0}
}

@-o-keyframes bounceRight
{
0%{margin-left:100%}
10%{margin-left:0}
20%{margin-left:10%}
30%{margin-left:0}
100%{margin-left:0}
}

@-moz-keyframes bounceRight
{
0%{margin-left:100%}
10%{margin-left:0}
20%{margin-left:10%}
30%{margin-left:0}
100%{margin-left:0}
}

@-webkit-keyframes bounceRight
{
0%{margin-left:100%}
10%{margin-left:0}
20%{margin-left:10%}
30%{margin-left:0}
100%{margin-left:0}
}
</style>


<link rel="stylesheet" type="text/css" href="<?php echo get_option('simple_option'); ?>">

<div class="slider">
<center>
				<?php if (get_option('upload_image') != '') { ?>
     <div class="simple_slide_slides">

        <input type="radio" id="slide1" name="slide" checked>
 <label for="slide1" id="dot1" ></label> 
<div class="simple_slider">
 <img src="<?php echo get_option('upload_image'); ?>"<?php echo get_option('upload_image'); ?>"Panel 1">
   <?php if (get_option('upload_image_content') != '') { ?>
<div class="simple_slider_content"><?php echo get_option('upload_image_content'); ?></div>  <? } else { }?></div>

    </div>
                <? } else { }?>
<?php if (get_option('upload_image2') != '') { ?>

    <div class="simple_slide_slides">
        <input type="radio" id="slide2" name="slide" >
 <label for="slide2" id="dot2" ></label> 
        <div class="simple_slider">
         <img src="<?php echo get_option('upload_image2'); ?>"Panel 2">
  <?php if (get_option('upload_image_content2') != '') { ?>

<div class="simple_slider_content"><?php echo get_option('upload_image_content2'); ?></div> <? } else { }?>
</div>

    </div>

    <? } else { }?>
<?php if (get_option('upload_image3') != '') { ?>

    <div class="simple_slide_slides">

        <input type="radio" id="slide3" name="slide" >
 <label for="slide3" id="dot3" ></label> 
        <div class="simple_slider">
         <img src="<?php echo get_option('upload_image3'); ?>"Panel 3">
<?php if (get_option('upload_image_content3') != '') { ?>
<div class="simple_slider_content"><?php echo get_option('upload_image_content3'); ?></div><? } else { }?></div>

    </div>

    <? } else { }?>
<?php if (get_option('upload_image4') != '') { ?>

    <div class="simple_slide_slides">
 
        <input type="radio" id="slide4" name="slide" >
 <label for="slide4" id="dot4" ></label> 
<div class="simple_slider">
        <img src="<?php echo get_option('upload_image4'); ?>"Panel 4">
<?php if (get_option('upload_image_content4') != '') { ?>
<div class="simple_slider_content"><?php echo get_option('upload_image_content4'); ?></div><? } else { }?></div>
<center>
    </div>

 <? } else { }?>
</div>​



<?php

}

?>