<?php

/*
Plugin Name: Royal Copyright Text
Plugin URI: http://wordpress.org/plugins/royal-copyright-text
Description: This plugin add copyright text after selected content in clipboard. So when visitor copy & past content form your website automatically add this page permalink & copyright notice.
Version: 1.2
Author: Mehdi Akram
Author URI: http://shamokaldarpon.com
Last updated: 16/07/2014
*/

	
function royal_copyright_plugin_script() {
	?>
<script type="text/javascript">
function addLink() {
var body_element = document.getElementsByTagName('body')[0];
var selection;
selection = window.getSelection();
var pagelink = "<br /><br /> Source: <a href='"+document.location.href+"'>"+document.location.href+"</a><br />Copyright &copy; <?php bloginfo('name');?>"; // change this if you want
var copytext = selection + pagelink;
var newdiv = document.createElement('div');
newdiv.style.position='absolute';
newdiv.style.left='-99999px';
body_element.appendChild(newdiv);
newdiv.innerHTML = copytext;
selection.selectAllChildren(newdiv);
window.setTimeout(function() {
body_element.removeChild(newdiv);
},0);
}
document.oncopy = addLink;
</script>
	<?php

}
add_action('init','royal_copyright_plugin_script');

?>